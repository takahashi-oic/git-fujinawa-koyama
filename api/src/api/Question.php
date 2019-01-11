<?php
	declare(strict_types = 1);

	namespace src\api {
		use PDO;

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
	}
