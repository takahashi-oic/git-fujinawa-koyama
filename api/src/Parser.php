<?php
	declare(strict_types = 1);
	include_once "DBAccess.php";

	/**
	 * ## 取得結果解析クラス
	 * @package api
	 */
	abstract class Parser {
		// region field
		/** ## 実行結果 */
		public $result;
		/** 指定フォーマット */
		protected $query;
		/** ## DB接続 */
		protected $db;
		// endregion field

		// region function
		/**
		 * Parser constructor.
		 * @param array $query 指定された表示形式
		 */
		public function __construct(array $query) {
			try {
				$this->db = new Select();
				$this->query = $query;
				if(key_exists('format', $query)) $format = strtolower($query['format']); else $format = null;

				switch($format) {
					case 'csv':
						$this->result = $this->toCSV();
						break;
					case 'json':
						$this->result = $this->toJson();
						break;
					case 'xml':
						$this->result = $this->toXml();
						break;

					default:
						return;
				}
			} catch(PDOException $e) {
				$this->result = '400';
				http_response_code(400);
			}
		}

		/**
		 * ## timestamp検索用関数
		 * @return String LIKE timestamp
		 */
		protected function timeFormat(): String {
			if(array_key_exists('year', $this->query)) $year = $this->query['year']; else $year = '____';

			$month = '__';
			if(array_key_exists('month', $this->query)) switch(strlen($this->query['month'])) {
				case 1:
					$month = '0' . $this->query['month'];
					break;
				case 2:
					$month = $this->query['month'];
					break;
			}

			return "ans_time LIKE '{$year}-{$month}%'";
		}

		/**
		 * ## JSON形式化関数
		 * @param array $json JSON形式にしたい配列
		 * @return string フォーマットされたJSON
		 */
		protected function jsonFormat($json): string {
			return json_encode($json, JSON_NUMERIC_CHECK | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
		}

		/**
		 * @param SimpleXMLElement $xml XML形式
		 * @return string フォーマットされたXML
		 */
		protected function xmlFormat(SimpleXMLElement $xml): string {
			$dom = new DOMDocument('1.0');
			$dom->loadXML($xml->asXML());
			$dom->formatOutput = true;
			return $dom->saveXML();
		}

		/**
		 * ## CSV変換関数
		 * @return string 変換されたDB
		 */
		abstract protected function toCSV(): string;

		/**
		 * ## JSON変換関数
		 * @return string 変換されたDB
		 */
		abstract protected function toJson(): string;

		/**
		 * ## XML変換関数
		 * @return string 変換されたDB
		 */
		abstract protected function toXml(): String;
		// endregion function
	}

	/**
	 * ## データベース解析クラス
	 * データベースの中にある全てのデータを解析する
	 */
	class DBParser
		extends Parser {
		protected function toCSV(): string {
			$result = '';
			$select = $this->db->query($where = "{$this->timeFormat()}");
			$length = $select->columnCount();

			while($col = $select->fetch(PDO::FETCH_ASSOC)) {
				$cnt = 0;
				foreach($col as $value) {
					$result .= strval($value);
					if($cnt++ < $length - 1) $result .= ','; else $result .= "\n";
				}
			}

			return $result;
		}

		protected function toJson(): string {
			$result = array(
				'msg' => null,
				'result' => array()
			);

			$select = $this->db->query($where = "{$this->timeFormat()}");

			$idx = 0;
			while($col = $select->fetch(PDO::FETCH_ASSOC)) {
				$result['result'] += array($idx => $col);
				$idx++;
			}

			return $this->jsonFormat($result);
		}

		protected function toXml(): String {
			$header = '<?xml version="1.0" encoding="UTF-8" ?>';
			$root = new SimpleXMLElement($header . '<api></api>');

			$select = $this->db->query($where = "{$this->timeFormat()}");

			$msg = $root->addChild('msg');
			while($col = $select->fetch(PDO::FETCH_ASSOC)) {
				$result = $root->addChild('result');
				foreach($col as $key => $value) $result->addChild($key, $value);
			}

			return $this->xmlFormat($root);
		}
	}

	/**
	 * ## アンケート結果解析クラス
	 * アンケートごとのデータを解析する
	 */
	class QuestionnaireParser
		extends Parser {
		protected function toCSV(): string {
			if(array_key_exists('id', $this->query)) $id = $this->query['id']; else return 'ERROR';

			$result = '';

			$select = $this->db->query($where = "questionnaire_num = {$id} AND {$this->timeFormat()}");

			$length = $select->columnCount();

			while($col = $select->fetch(PDO::FETCH_ASSOC)) {
				foreach($col as $value) {
					$result .= strval($value);
					if($value < $length - 1) $result .= ','; else $result .= "\n";
				}
			}

			return $result;
		}

		protected function toJson(): string {
			$result = array(
				'msg' => null,
				'result' => array()
			);

			if(array_key_exists('id', $this->query)) $id = $this->query['id']; else return 'ERROR';

			$select = $this->db->query($where = "questionnaire_num = {$id} AND {$this->timeFormat()}");

			$idx = 0;
			while($col = $select->fetch(PDO::FETCH_ASSOC)) {
				$result['result'] += array($idx => $col);
				$idx++;
			}

			return $this->jsonFormat($result);
		}

		protected function toXml(): String {
			if(array_key_exists('id', $this->query)) $id = $this->query['id']; else return 'ERROR';

			$select = $this->db->query($where = "questionnaire_num = {$id} AND {$this->timeFormat()}");

			$header = '<?xml version="1.0" encoding="UTF-8"?>';
			$root = new SimpleXMLElement($header . '<api></api>');
			$api = $root->addChild('msg');

			while($col = $select->fetch(PDO::FETCH_ASSOC)) {
				$result = $api->addChild('result');
				foreach($col as $key => $value) $result->addChild($key, $value);
			}

			return $this->xmlFormat($root);
		}
	}

	/**
	 * ## 項目結果解析クラス
	 * 項目ごとのデータを解析する
	 */
	class ItemParser
		extends Parser {
		protected function toCSV(): string {
			if(array_key_exists('id', $this->query)) $id = $this->query['id']; else return 'ERROR';

			$result = '';

			$select = $this->db->query($where = "item_num = {$id} AND {$this->timeFormat()}");

			$length = $select->columnCount();

			while($col = $select->fetch(PDO::FETCH_ASSOC)) {
				foreach($col as $value) {
					$result .= strval($value);
					if($value < $length - 1) $result .= ','; else $result .= "\n";
				}
			}

			return $result;
		}

		protected function toJson(): string {
			$result = array(
				'msg' => null,
				'result' => array()
			);

			if(array_key_exists('id', $this->query)) $id = $this->query['id']; else return 'ERROR';

			$select = $this->db->query($where = "item_num = {$id} AND {$this->timeFormat()}");

			$idx = 0;
			while($col = $select->fetch(PDO::FETCH_ASSOC)) {
				$result['result'] += array($idx => $col);
				$idx++;
			}

			return $this->jsonFormat($result);
		}

		protected function toXml(): String {
			if(array_key_exists('id', $this->query)) $id = $this->query['id']; else return 'ERROR';

			$select = $this->db->query($where = "item_num = {$id} AND {$this->timeFormat()}");

			$header = '<?xml version="1.0" encoding="UTF-8"?>';
			$root = new SimpleXMLElement($header . '<api></api>');
			$api = $root->addChild('msg');

			while($col = $select->fetch(PDO::FETCH_ASSOC)) {
				$result = $api->addChild('result');
				foreach($col as $key => $value) $result->addChild($key, $value);
			}

			return $this->xmlFormat($root);
		}
	}
