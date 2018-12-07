<?php
	declare(strict_types = 1);

	if(key_exists('format', $_GET)) {
		switch(strtolower($_GET['format'])) {
			case 'json':
			case 'xml':
			case 'csv':
				break;

			default:
				http_response_code(400);
				return;
		}
	}
	else {
		http_response_code(400);
		return;
	}

	if(key_exists('id', $_GET)) {
		if(!is_numeric($_GET['id'])) {
			http_response_code(400);
			return;
		}
	}

	if(key_exists('year', $_GET)) {
		if(!is_numeric($_GET['year'])) {
			http_response_code(400);
			return;
		}
	}

	if(key_exists('month', $_GET)) {
		if(!is_numeric($_GET['month'])) {
			http_response_code(400);
			return;
		}
	}