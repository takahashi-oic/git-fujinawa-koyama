<?php
	declare(strict_types = 1);

	/**
	 * ## Class Question
	 * @package database
	 */
	class Question {
		/** ## SQLQuery */
		private static $sql = "SELECT * FROM item WHERE question_num = :num";
		private $db;

		public function __construct() {
			$url = parse_url(getenv('DATABASE_URL'));
			$this->db = new PDO("pgsql:" . sprintf('host=%s;port=%s;user=%s;password=%s;dbname=%s', $url["host"], $url["port"], $url["user"], $url["pass"], ltrim($url["path"], "/")));
		}

		/**
		 * ## SQL実行関数
		 * @param int $num question_num
		 * @return \PDOStatement SQL実行状態
		 */
		public function query(int $num) {
			$query = $this->db->prepare(self::$sql);
			$query->bindValue(':num', $num, PDO::PARAM_INT);

			$query->execute();
			return $query;
		}
	}

	/**
	 * ## Trait Format
	 * データベースの表示形式を変更する
	 */
	class Format {
		/** @var array データベース内容 */
		protected $data = array('msg' => null, 'result' => array());

		/**
		 * ## データ形成変更関数
		 * @param \PDOStatement $database 表示データベース
		 * @return string データベース内容(CSV)
		 */
		public function toCsv(PDOStatement $database): string {
			$result = '';
			$length = $database->columnCount();

			while($col = $database->fetch(PDO::FETCH_ASSOC)) {
				$cnt = 0;
				foreach($col as $value) {
					$result .= strval($value);
					if($cnt++ < $length - 1) $result .= ',';
					else $result .= "\n";
				}
			}

			return $result;
		}

		/**
		 * ## データ形成変更関数
		 * @param \PDOStatement $database 表示データベース
		 * @return string データベース内容(CSV)
		 */
		public function toJson(PDOStatement $database): string {
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

		/**
		 * ## データ形成変更関数
		 * @param \PDOStatement $database 表示データベース
		 * @return string データベース内容(CSV)
		 */
		public function toXml(PDOStatement $database): string {
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


	/*
	$query = new Question();
	$data = $query->query(1);

	$result = function() {
		http_response_code(401);
		exit(401);
	};

	if(key_exists('format', $_GET)) {
		$fmt = new Format();

		switch(strtolower($_GET['format'])) {
			case 'csv':
				$result = $fmt->toCsv($data);
				break;

			case 'json':
				$result = $fmt->toJson($data);
				break;

			case 'xml':
				$result = $fmt->toXml($data);
				break;
		}
	}
	*/
?><?= // $result
	"test" ?>
