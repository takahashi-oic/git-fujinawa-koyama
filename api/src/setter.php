<?php
	require_once "ContentType.php";
	include_once "Parser.php";

	ini_set('display_errors', 0);

	switch(strtolower($_GET['format'])) {
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

	if($_SERVER['REQUEST_URI'] != $_SERVER['PHP_SELF'])
		header("Content-Type: {$content}; charset=utf-8");
?>
