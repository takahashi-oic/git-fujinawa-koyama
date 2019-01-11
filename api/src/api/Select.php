<?php
	declare(strict_types = 1);

	namespace src\api {
		use src\database\DBAccess as Database;

		abstract class Select {
			/** ## データベース */
			protected $db;

			/**
			 * ## Select constructor.
			 * 初期化関数
			 */
			public function __construct() {
				$this->db = Database::getInstance()->connect();
			}
		}
	}
