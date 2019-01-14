<?php
	declare(strict_types = 1);

	$query = new Select('airport');
	$data = $query->query();

	$fmt = new Format();
	if(key_exists('format', $_GET)) switch(strtolower($_GET['format'])) {
		case 'csv':
			$result = $fmt->toCsv($data);
			break;

		case 'json':
			$result = $fmt->toJson($data);
			break;

		case 'xml':
			$result = $fmt->toXml($data);
			break;
	} else {
		http_response_code(400);
		exit(400);
	}

	echo $result;