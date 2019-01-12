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
			 * @throws \Exception
			 */
			public function __construct() {
				// $this->db = Database::getInstance()->connect();
				$url = parse_url(getenv('DATABASE_URL'));
				if($url instanceof PDO) $this->db = new PDO("pgsql:" . sprintf('host=%s;port=%s;user=%s;password=%s;dbname=%s', $url["host"], $url["port"], $url["user"], $url["pass"], ltrim($url["path"], "/")));
				else throw new \Exception("env is false");
			}

			public function query(string $tbl): PDOStatement {
				$query = $this->db->prepare(self::$sql);
				$query->bindValue(':tbl', $tbl);
				return $query;
			}
		}
	}
