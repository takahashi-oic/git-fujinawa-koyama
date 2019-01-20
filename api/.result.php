<?php
	declare(strict_types = 1);

	require_once('Select.php');
	require_once('Format.php');

	/**
	 * ## 結果取得関数
	 * @param string $tbl 検索テーブル
	 * @param string $col 表示行
	 * @return string SQL実行結果
	 */
	function result(string $tbl, string $col) {
		$query = new Select($tbl, $col);
		$data = $query->query();

		$fmt = new Format();
		if(key_exists('format', $_GET)) {
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

				default:
					http_response_code(400);
					exit(400);
			}
			return $result;
		} else {
			http_response_code(400);
			exit(400);
		}
	}