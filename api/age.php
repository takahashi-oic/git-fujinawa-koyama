<?php
	declare(strict_types = 1);

	class Select {
		private static $sql = "SELECT * FROM :tbl WHERE TRUE";

		/** ## データベース */
		protected $db;

		/**
		 * ## Select constructor.
		 * 初期化関数
		 * @throws \Exception
		 */
		public function __construct() {
			// $this->db = Database::getInstance()->connect();
			try {
				$url = parse_url(getenv('DATABASE_URL'));
				$this->db = new PDO("pgsql:" . sprintf('host=%s;port=%s;user=%s;password=%s;dbname=%s', $url["host"], $url["port"], $url["user"], $url["pass"], ltrim($url["path"], "/")));
			} catch(Exception $e) {
				echo $e->getMessage();
			}
		}

		public function query(string $tbl): PDOStatement {
			$query = $this->db->query(str_replace(':tbl', $tbl, self::$sql));
			return $query;
		}
	}

	try {
		$query = new Select();
	} catch(Exception $e) {
		echo $e->getMessage();
	}
	/*
	$data = $query->query('age');

	$result = function() {
		http_response_code(401);
		exit(401);
	};

	if(key_exists('format', $_GET)) {
		$fmt = new src\api\Format();

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
?><?= $result ?>
