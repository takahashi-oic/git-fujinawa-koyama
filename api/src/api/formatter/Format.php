<?php
	declare(strict_types = 1);

	namespace src\api\formatter {
		use PDOStatement;

		/**
		 * ## Trait Format
		 * データベースの表示形式を変更する
		 */
		trait Format {
			/** @var array データベース内容 */
			protected $data = array('msg' => null, 'result' => array());

			/**
			 * ## 形式変換関数
			 * @param PDOStatement $database SQL実行結果
			 * @return string 変換結果
			 */
			abstract function convert(PDOStatement $database): string;
		}
	}
