<?php
	declare(strict_types = 1);

	/**
	 * ## Result Table Manager
	 * @see PDO
	 */
	abstract class DBAccess {
		// region field
		protected $pdo = null;
		/** ## アクセス先IP */
		private $host;
		/** ## アクセス先DB */
		private $db;
		/** ## 文字コード */
		private $charset;
		/** ## リクエストURL */
		private $dsn;
		/** ## DBログインユーザー */
		private $user = "root";
		/** ## DBログインパスワード */
		private $pass = "";
		// endregion field

		// region function

		/**
		 * ## Result constructor.
		 * @param string $host アクセス先IP
		 * @param string $db アクセス先DB
		 * @param string $charset 文字コード
		 * @param string $user DBアクセスユーザー
		 * @param string $pass DBアクセスパスワード
		 */
		public function __construct(string $host = '192.168.201.177', string $db = 'questionnaire_db', string $charset = 'utf8', string $user = 'testdb', string $pass = '') {
			$this->host = $host;
			$this->db = $db;
			$this->charset = $charset;
			$this->dsn = "mysql:host={$host};dbname={$db};charset={$charset}";

			$this->user = $user;
			$this->pass = $pass;

			$this->pdo = new PDO($this->dsn, $this->user);
		}
		// endregion function
	}

	/**
	 * ## Class Select
	 * @package src\Database
	 */
	class Select
		extends DBAccess {
		protected $stmt = "SELECT * FROM questionnaire_result WHERE TRUE";

		/**
		 * ## SELECT実行関数
		 * @param string $where 条件文
		 * @return PDOStatement SQL実行結果
		 */
		public function query(string $where = 'TRUE'): PDOStatement {
			$this->stmt = "SELECT * FROM questionnaire_result WHERE {$where}";
			$result = $this->pdo->query($this->stmt);

			if($result instanceof PDOStatement) return $result;
			else return null;
		}
	}
