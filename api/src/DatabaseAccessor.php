<?php
	namespace api;
	use PDO;
	use PDOException;
	use PDOStatement;

	/**
	 * ## Result Table Manager
	 * @see PDO
	 */
	class DatabaseAccessor {
		// region field
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
		public function __construct(string $host = '192.168.201.106', string $db = 'questionnaire_db', string $charset = 'utf8', string $user = 'user', string $pass = '') {
			$this->host = $host;
			$this->db = $db;
			$this->charset = $charset;
			$this->dsn = "mysql:host={$host};
			dbname={$db};charset={$charset}";

			$this->user = $user;
			$this->pass = $pass;
		}

		/**
		 * ## SELECT実行関数
		 * @param string $select 選択列
		 * @param string $from 使用テーブル
		 * @param string $where 条件文
		 * @return PDOStatement
		 */
		public function select(string $select, string $from, string $where = "TRUE"): PDOStatement {
			try {
				$pdo = new PDO($this->dsn, $this->user);

				$sql = "SELECT {$select} FROM {$from} WHERE {$where}";

				$result = $pdo->query($sql);
				if($result instanceof PDOStatement)
					return $result;
				else return null;
			} catch(PDOException $ex) {
				exit($ex->getMessage());
			}
		}
		// endregion function
	}
?>
