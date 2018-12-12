<?php
	declare(strict_types = 1);
	function http_err(int $code) {
		http_response_code($code);
		exit($code);
	}

	if(key_exists('format', $_GET)) switch(strtolower($_GET['format'])) {
		case 'json':
		case 'xml':
		case 'csv':
			break;

		default:
			http_err(400);
	} else http_response_code(400);

	if(key_exists('id', $_GET)) if(!is_int($_GET['id'])) http_err(400);
	if(key_exists('year', $_GET)) if(!is_int($_GET['year'])) http_err(400);
	if(key_exists('month', $_GET)) if(!is_int($_GET['month'])) http_err(400);
