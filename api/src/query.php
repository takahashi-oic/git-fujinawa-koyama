<?php
	declare(strict_types = 1);
	function http_err(int $code) {
		http_response_code($code);
		exit($code);
	}

	if(key_exists('format', $_GET)) switch(strtolower($_GET['format'])) {
		case 'json':
		case 'xml':
		case 'csv':
			break;

		default:
			http_err(400);
	}
	else http_response_code(400);

	/**
	 * ## URLクエリ制御関数
	 * @param mixed $key 検索値
	 */
	function num_checker($key) {
		if(key_exists($key, $_GET)) if(preg_match("/^[0-9].*(,( |　)+[0-9].*)$/", $key)) http_err(400);
	}

	num_checker('id');
	num_checker('year');
	num_checker('month');
