<?php
	declare(strict_types = 1);

	namespace src\api\formatter {
		use DOMDocument;
		use PDOStatement;
		use SimpleXMLElement;

		class XmlFormat {
			use Format;

			public function convert(PDOStatement $database): string {
				$header = '<?xml version="1.0" encoding="UTF-8" ?>';
				$root = new SimpleXMLElement($header . '<api></api>');

				$msg = $root->addChild('msg');
				while($col = $database->fetch(PDO::FETCH_ASSOC)) {
					$result = $root->addChild('result');
					foreach($col as $key => $value) $result->addChild($key, $value);
				}

				$dom = new DOMDocument('1.0');
				$dom->loadXML($root->asXML());
				$dom->formatOutput = true;
				return $dom->saveXML();

			}
		}
	}
