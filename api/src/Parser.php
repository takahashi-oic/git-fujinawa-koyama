<?php
	// region header
	namespace api;
	use PDO;
	use SimpleXMLElement;

	include "DatabaseAccessor.php";
	// endregion header

	abstract class Parser {
		/**
		 * ## CSV変換関数
		 * @return string 変換されたDB
		 */
		abstract public function toCSV(): string;

		/**
		 * ## JSON変換関数
		 * @return string 変換されたDB
		 */
		abstract public function toJson(): string;

		/**
		 * ## XML変換関数
		 * @return string 変換されたDB
		 */
		abstract public function toXml(): String;
	}

	class DBParser
		extends Parser {
		public function toCSV(): string {
			$result = "";

			$db = new DatabaseAccessor();
			$select = $db->select("*", "questionnaire_result");

			$length = $select->columnCount();

			while($col = $select->fetch(PDO::FETCH_ASSOC)) {
				foreach($col as $value) {
					$result .= strval($value);
					if($value < $length - 1)
						$result .= ',';
					else $result .= "\n";
				}
			}

			return $result;
		}

		public function toJson(): string {
			$result = array(
				'msg' => null,
				'result' => array()
			);

			$db = new DatabaseAccessor();
			$select = $db->select("*", "questionnaire_result");

			$idx = 0;
			while($col = $select->fetch(PDO::FETCH_ASSOC)) {
				$result['result'] += array($idx => $col);
				$idx++;
			}

			return json_encode($result, JSON_UNESCAPED_UNICODE);
		}

		public function toXml(): String {
			$header = '<?xml version="1.0" encoding="UTF-8"?>';
			$root = new SimpleXMLElement($header . '<api></api>');


			$db = new DatabaseAccessor();
			$select = $db->select("*", "questionnaire_result");

			$api = $root->addChild('msg');
			while($col = $select->fetch(PDO::FETCH_ASSOC)) {
				$result = $api->addChild('result');
				foreach($col as $key => $value) {
					$result->addChild($key, $value);
				}
			}

			return $root->asXML();
		}
	}

	class QuestionnaireParser
		extends Parser {
		public function toCSV(): string {
			return "";
		}

		public function toJson(): string {
			return "";
		}

		public function toXml(): string {
			return "";
		}
	}
?>
