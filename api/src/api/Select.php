<?php
	declare(strict_types = 1);

	namespace src\api {
		use PDOStatement;
		use src\database\DBAccess as Database;

		class Select {
			private static $sql = "SELECT * FROM :tbl WHERE TRUE";

			/** ## データベース */
			protected $db;

			/**
			 * ## Select constructor.
			 * 初期化関数
			 */
			public function __construct() {
				$this->db = Database::getInstance()->connect();
			}

			public function query(string $tbl): PDOStatement {
				$query = $this->db->prepare(self::$sql);
				$query->bindValue(':tbl', $tbl);
				return $query;
			}
		}
	}
