<?php
	declare(strict_types = 1);

	/*
	include_once('AutoLoader.php');

	$query = new src\api\Question();
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
?><?= $result */ ?>
