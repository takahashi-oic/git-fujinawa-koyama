<?php
	declare(strict_types = 1);

	namespace src\database {
		use Exception;
		use PDO;

		class DBAccess {
			/** ## このクラスのインスタンス */
			private static $instance;
			/** ## データベース */
			private $db;

			/**
			 * ## DBAccess constructor.
			 * @see \PDO
			 */
			private function __construct() {
				$url = parse_url(getenv('DATABASE_URL'));
				$this->db = new PDO("pgsql:" . sprintf('host=%s;port=%s;user=%s;password=%s;dbname=%s', $url["host"], $url["port"], $url["user"], $url["pass"], ltrim($url["path"], "/")));
			}

			/**
			 * ## インスタンス取得関数
			 * このクラスのインスタンスを取得する<br>
			 * もしインスタンスが存在しなかった場合は生成を行う
			 * @return \src\database\DBAccess
			 */
			public static function getInstance() {
				if(!self::$instance) self::$instance = new DBAccess();
				return self::$instance;
			}

			/**
			 * ## インスタンス複製関数
			 * @deprecated This class is Singleton
			 * @throws \Exception 実行した場合
			 */
			final function __clone() { throw new Exception('Clone is not allowed against' . get_class($this)); }

			/**
			 * ## {@link db データベース}取得関数
			 * @return PDO DB接続状態
			 */
			public function connect(): PDO { return $this->db; }
		}
	}
