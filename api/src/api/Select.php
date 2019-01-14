<?php
	declare(strict_types = 1);

	namespace src\api {
		use PDOStatement;
		use src\database\DBAccess as Database;

		class Select {
			/** ## データベース */
			protected $db;

			/** ## SQL発行文 */
			private $sql;

			/**
			 * ## Select constructor.
			 * 初期化関数
			 * @param string $tbl テーブル
			 * @param string $column 行
			 */
			public function __construct(string $tbl, string $column = '*') {
				$this->db = Database::getInstance()->connect();
				$this->sql = "SELECT ${column} FROM ${tbl} WHERE ";
			}

			public function query(string $where = 'TRUE'): PDOStatement {
				$query = $this->db->query($this->sql . $where);
				return $query;
			}
		}
	}
