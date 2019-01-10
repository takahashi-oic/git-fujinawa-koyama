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
		protected $select;
		// endregion field

		// region function
		/**
		 * Parser constructor.
		 */
		public function __construct() {
			try {
				$this->db = new Select;
				if(key_exists('format', $_GET)) switch(strtolower($_GET['format'])) {
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
						$this->error(400);
				}
				else $this->error(400);
			} catch(PDOException $e) {
				error_log($e->getMessage());
				$this->result = 400;
				$this->error($this->result);
			}
		}

		/**
		 * ## 異常終了関数
		 * @param int $code HTTPレスポンスコード
		 * @see http_response_code()
		 */
		protected function error(int $code) {
			http_response_code($code);
			exit($code);
		}

		/**
		 * ## timestamp検索用関数
		 * @return String LIKE timestamp
		 */
		protected function timeFormat(): String {
			if(key_exists('year', $_GET)) $year = $_GET['year'];
			else $year = '____';

			$month = '__';
			if(array_key_exists('month', $_GET)) switch(strlen($_GET['month'])) {
				case 1:
					$month = '0' . $_GET['month'];
					break;
				case 2:
					$month = $_GET['month'];
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
			$opt = 0;
			$opt += JSON_NUMERIC_CHECK;
			// $opt += JSON_PRETTY_PRINT;
			$opt += JSON_UNESCAPED_UNICODE;
			return json_encode($json, $opt);
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
		public function __construct() {
			try {
				parent::__construct();
				$this->select = $this->db->query($where = $this->timeFormat());
			} catch(Exception $e) {
				echo 'データベースにエラーが発生しました';
			}
		}

		protected function toCSV(): string {
			$result = '';
			$length = $this->select->columnCount();

			while($col = $this->select->fetch(PDO::FETCH_ASSOC)) {
				$cnt = 0;
				foreach($col as $value) {
					$result .= strval($value);
					if($cnt++ < $length - 1) $result .= ',';
					else $result .= "\n";
				}
			}

			return $result;
		}

		protected function toJson(): string {
			$result = array(
				'msg' => null, 'result' => array()
			);

			$idx = 0;
			while($col = $this->select->fetch(PDO::FETCH_ASSOC)) {
				$result['result'] += array($idx => $col);
				$idx++;
			}

			return $this->jsonFormat($result);
		}

		protected function toXml(): String {
			$header = '<?xml version="1.0" encoding="UTF-8" ?>';
			$root = new SimpleXMLElement($header . '<api></api>');

			$msg = $root->addChild('msg');
			while($col = $this->select->fetch(PDO::FETCH_ASSOC)) {
				$result = $root->addChild('result');
				foreach($col as $key => $value) $result->addChild($key, $value);
			}

			return $this->xmlFormat($root);
		}
	}

	abstract class NonDBParser
		extends Parser {
		protected $id;
		protected $select;

		function __construct(string $column) {
			parent::__construct();
			if(key_exists('id', $_GET)) try {
				$where = "{$column} =";
				$this->id = $where . str_replace(',', " OR {$where} ", $_GET['id']);
				$this->select = $this->db->query($this->id . ' AND ' . $this->timeFormat());
			} catch(Exception $e) {
				http_response_code(400);
				exit(400);
			}
			else {
				http_response_code(400);
				exit(400);
			}
		}
	}

	/**
	 * ## アンケート結果解析クラス
	 * アンケートごとのデータを解析する
	 */
	class QuestionnaireParser
		extends NonDBParser {
		public function __construct() {
			parent::__construct('questionnaire_num');
		}

		protected function toCSV(): string {
			$result = '';

			$length = $this->select->columnCount();

			while($col = $this->select->fetch(PDO::FETCH_ASSOC)) {
				foreach($col as $value) {
					$result .= strval($value);
					if($value < $length - 1) $result .= ',';
					else $result .= "\n";
				}
			}

			return $result;
		}

		protected function toJson(): string {
			$result = array(
				'msg' => null, 'result' => array()
			);

			$idx = 0;
			while($col = $this->select->fetch(PDO::FETCH_ASSOC)) {
				$result['result'] += array($idx => $col);
				$idx++;
			}

			return $this->jsonFormat($result);
		}

		protected function toXml(): String {
			$header = '<?xml version="1.0" encoding="UTF-8"?>';
			$root = new SimpleXMLElement($header . '<api></api>');
			$api = $root->addChild('msg');

			while($col = $this->select->fetch(PDO::FETCH_ASSOC)) {
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
		extends NonDBParser {
		public function __construct() {
			parent::__construct('item_num');
		}

		protected function toCSV(): string {
			$result = '';

			$length = $this->select->columnCount();

			while($col = $this->select->fetch(PDO::FETCH_ASSOC)) {
				foreach($col as $value) {
					$result .= strval($value);
					if($value < $length - 1) $result .= ',';
					else $result .= "\n";
				}
			}

			return $result;
		}

		protected function toJson(): string {
			$result = array(
				'msg' => null, 'result' => array()
			);

			$idx = 0;
			while($col = $this->select->fetch(PDO::FETCH_ASSOC)) {
				$result['result'] += array($idx => $col);
				$idx++;
			}

			return $this->jsonFormat($result);
		}

		protected function toXml(): String {
			$header = '<?xml version="1.0" encoding="UTF-8"?>';
			$root = new SimpleXMLElement($header . '<api></api>');
			$api = $root->addChild('msg');

			while($col = $this->select->fetch(PDO::FETCH_ASSOC)) {
				$result = $api->addChild('result');
				foreach($col as $key => $value) $result->addChild($key, $value);
			}

			return $this->xmlFormat($root);
		}
	}
