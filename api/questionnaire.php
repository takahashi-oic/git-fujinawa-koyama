<?php
	declare(strict_types = 1);

	ini_set('display_errors', 1);

	include_once('AutoLoader.php');

	$query = new src\api\Question();
	$result = $query->query(1);

	if(key_exists('format', $_GET)) {
		switch(strtolower($_GET['format'])) {
			case 'json':
				$fmt = new src\api\formatter\JsonFormat();
				echo $fmt->convert($result);
				break;

			case 'xml':
				$fmt = new src\api\formatter\XmlFormat();
				echo $fmt->convert($result);
				break;

			default:
				http_err(403);
				return;
		}
	}
