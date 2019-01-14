<?php
	declare(strict_types = 1);

	require_once('Select.php');
	require_once('Format.php');

	$query = new Select('purchases1 p1 LEFT JOIN purchases2 p2 ON p1.answer_num = p2.answer_num LEFT JOIN purchases3 p3 ON p1.answer_num = p3.answer_num');
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
		echo $result;
	} else {
		http_response_code(400);
		exit(400);
	}

