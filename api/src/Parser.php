<?php
	// region header
	namespace api;
	use PDO;
	use PDOException;
	use SimpleXMLElement;

	include_once "DatabaseAccessor.php";
	require_once "DatabaseAccessor.php";
	// endregion header

	abstract class Parser {
		public $result;
		protected $query;

		protected $db;

		protected function timeFormat(): String {
			if(array_key_exists('year', $this->query))
				$year = $this->query['year'];
			else $year = '____';

			$month = '__';
			if(array_key_exists('month', $this->query))
				switch(strlen($this->query['month'])) {
					case 1:
						$month = '0' . $this->query['month'];
						break;
					case 2:
						$month = $this->query['month'];
						break;
				}

			return "ans_time LIKE '{$year}-{$month}%'";
		}

		function __construct(array $query) {
			try {
				$this->db = new DatabaseAccessor();
				$this->query = $query;
				if(array_key_exists('format', $query))
					$format = strtolower($query['format']);
				else $format = null;

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
						$this->result = "ERROR";
				}
			} catch(PDOException $E) {
				$this->result = "[{$E->getCode()}] - <pre>{$E->getTrace()}</pre>";

			}
		}

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

			$select = $this->db->select('*', 'questionnaire_result', "{$this->timeFormat()}");

			$length = $select->columnCount();

			while($col = $select->fetch(PDO::FETCH_ASSOC)) {
				$cnt = 0;
				foreach($col as $value) {
					$result .= strval($value);
					if($cnt++ < $length - 1)
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

			$select = $this->db->select('*', 'questionnaire_result', "{$this->timeFormat()}");

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

			$select = $this->db->select('*', 'questionnaire_result', "{$this->timeFormat()}");

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
			if(array_key_exists('id', $this->query))
				$id = $this->query['id'];
			else return 'ERROR';

			$result = '';

			$select = $this->db->select('*', 'questionnaire_result', "questionnaire_num = {$id} AND {$this->timeFormat()}");

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

			if(array_key_exists('id', $this->query))
				$id = $this->query['id'];
			else return 'ERROR';

			$select = $this->db->select('*', 'questionnaire_result', "questionnaire_num = {$id} AND {$this->timeFormat()}");

			$idx = 0;
			while($col = $select->fetch(PDO::FETCH_ASSOC)) {
				$result['result'] += array($idx => $col);
				$idx++;
			}

			return json_encode($result, JSON_UNESCAPED_UNICODE);
		}

		public function toXml(): String {
			if(array_key_exists('id', $this->query))
				$id = $this->query['id'];
			else return 'ERROR';

			$select = $this->db->select('*', 'questionnaire_result', "questionnaire_num = {$id} AND {$this->timeFormat()}");

			$header = '<?xml version="1.0" encoding="UTF-8"?>';
			$root = new SimpleXMLElement($header . '<api></api>');
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

	class ItemParser
		extends Parser {
		public function toCSV(): string {
			if(array_key_exists('id', $this->query))
				$id = $this->query['id'];
			else return 'ERROR';

			$result = '';

			$select = $this->db->select('*', 'questionnaire_result', "item_num = {$id} AND {$this->timeFormat()}");

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

			if(array_key_exists('id', $this->query))
				$id = $this->query['id'];
			else return 'ERROR';

			$select = $this->db->select('*', 'questionnaire_result', "item_num = {$id} AND {$this->timeFormat()}");

			$idx = 0;
			while($col = $select->fetch(PDO::FETCH_ASSOC)) {
				$result['result'] += array($idx => $col);
				$idx++;
			}

			return json_encode($result, JSON_UNESCAPED_UNICODE);
		}

		public function toXml(): String {
			if(array_key_exists('id', $this->query))
				$id = $this->query['id'];
			else return 'ERROR';

			$select = $this->db->select('*', 'questionnaire_result', "item_num = {$id} AND {$this->timeFormat()}");

			$header = '<?xml version="1.0" encoding="UTF-8"?>';
			$root = new SimpleXMLElement($header . '<api></api>');
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
?>
