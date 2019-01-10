<?php
	declare(strict_types = 1);

	include_once('AutoLoader.php');

	$query = new src\api\Question();
	$result = $query->query(1);

	$fmt = new src\api\formatter\JsonFormat();

	if(key_exists('format', $_GET)) switch(strtolower($_GET['format'])) {
		case 'json':
			$fmt = new src\api\formatter\JsonFormat();
			break;

		case 'xml':
			$fmt = new src\api\formatter\XmlFormat();
			break;

		default:
			http_err(403);
			return;
	}
	echo $fmt->convert($result);
