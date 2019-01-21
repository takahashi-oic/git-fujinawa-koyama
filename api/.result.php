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
					if($_SERVER['PHP_SELF'] == $_SERVER['HTTP_REFERER']) header('Content-type: text/csv');
					break;

				case 'json':
					$result = $fmt->toJson($data);
					if($_SERVER['PHP_SELF'] == $_SERVER['HTTP_REFERER']) header('Content-type: application/json');
					break;

				case 'xml':
					$result = $fmt->toXml($data);
					if($_SERVER['PHP_SELF'] == $_SERVER['HTTP_REFERER']) header('Content-type: application/xml');
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

	function time_formatter() {
		$year = '__';
		if(key_exists('year', $_GET)) $year = $_GET['year'];

		$month = '__';
		if(key_exists('month', $_GET)) switch(strlen($_GET['month'])) {
			case 1:
				$month = 0 . $_GET['month'];
				break;

			case 2:
				$month = $_GET['month'];
				break;

			default:
				http_response_code(400);
				exit(400);
		}
		return "'ans_day' LIKE ${year}-${month}-__";
	}
