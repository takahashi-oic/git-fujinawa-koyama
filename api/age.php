<?php
	declare(strict_types = 1);

	require_once('Select.php');
	require_once('Format.php');

	$query = new Select('questionnaire_view', 'answer_num, ans_day, age');
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

