<?php
	declare(strict_types = 1);

	require_once('Select.php');
	require_once('Format.php');

	$query = new Select('SELECT t.answer_num, t.tourism1, t2.tourism2, t3.tourism2, t4.tourism2, t5.tourism2 FROM tourism1 AS t LEFT JOIN tourism2 AS t2 ON t.answer_num = t2.answer_num LEFT JOIN tourism2 AS t3 ON t.answer_num = t3.answer_num LEFT JOIN tourism2 AS t4 ON t.answer_num = t4.answer_num LEFT JOIN tourism2 AS t5 ON t.answer_num = t5.answer_num WHERE TRUE;');
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

