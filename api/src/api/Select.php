<?php
	declare(strict_types = 1);

	namespace src\api {
		use PDO;
		use PDOStatement;

		class Select {
			private static $sql = "SELECT * FROM :tbl WHERE TRUE";

			/** ## データベース */
			protected $db;

			/**
			 * ## Select constructor.
			 * 初期化関数
			 */
			public function __construct() {
				// $this->db = Database::getInstance()->connect();
				$url = parse_url(getenv('DATABASE_URL'));
				$this->db = new PDO("pgsql:" . sprintf('host=%s;port=%s;user=%s;password=%s;dbname=%s', $url["host"], $url["port"], $url["user"], $url["pass"], ltrim($url["path"], "/")));
				if(!$this->db instanceof PDO) {
					http_response_code(400);
					die(400);
				}
			}

			public function query(string $tbl): PDOStatement {
				$query = $this->db->prepare(self::$sql);
				$query->bindValue(':tbl', $tbl);
				return $query;
			}
		}
	}
