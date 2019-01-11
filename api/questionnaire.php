<?php
	declare(strict_types = 1);

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

	$query = new Question();
	$data = $query->query(1);

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
