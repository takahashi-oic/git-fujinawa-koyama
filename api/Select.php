<?php
	declare(strict_types = 1);

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
			$url = parse_url(getenv('DATABASE_URL'));
			$this->db = new PDO("pgsql:" . sprintf('host=%s;port=%s;user=%s;password=%s;dbname=%s', $url["host"], $url["port"], $url["user"], $url["pass"], ltrim($url["path"], "/")));
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$this->sql = "SELECT ${column} FROM ${tbl} WHERE ";
		}

		public function query(string $where = 'TRUE'): PDOStatement {
			$query = $this->db->query($this->sql . $where);
			return $query;
		}
	}
