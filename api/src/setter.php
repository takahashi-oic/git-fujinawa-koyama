<?php
	// region header
	declare(strict_types = 1);
	ini_set("ERROR_DISPLAY", "Off");
	include_once "ContentType.php";
	include_once "Parser.php";
	// endregion header

	if(key_exists('format', $_GET)) switch(strtolower($_GET['format'])) {
		case 'json':
			$content = ContentType::JSON;
			break;
		case 'csv':
			$content = ContentType::CSV;
			break;
		case 'xml':
			$content = ContentType::XML;
			break;

		default:
			$content = 'text/plain';
	}
	else $content = 'text/plain';

	/*
	 * Content-Typeの制御
	 * 直接リダイレクトされた場合は変更
	 */
	if($_SERVER['REQUEST_URI'] != $_SERVER['PHP_SELF']) header("Content-Type: {$content}; charset=utf-8");
