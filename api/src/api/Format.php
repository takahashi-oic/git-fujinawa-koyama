<?php
	declare(strict_types = 1);

	namespace src\api {
		use DOMDocument;
		use PDOStatement;
		use SimpleXMLElement;

		/**
		 * ## Trait Format
		 * データベースの表示形式を変更する
		 */
		class Format {
			/** @var array データベース内容 */
			protected $data = array('msg' => null, 'result' => array());

			function toJson(PDOStatement $database): string {
				$idx = 0;
				while($col = $database->fetch()) {
					$this->data['result'] += array($idx => $col);
					$idx++;
				}

				/** ## JSONの形式 */
				$opt = 0;
				$opt += JSON_NUMERIC_CHECK;
				$opt += JSON_UNESCAPED_UNICODE;
				return json_encode($this->data, $opt);
			}

			function toXml(PDOStatement $database): string {
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
