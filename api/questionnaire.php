<?php
	declare(strict_types = 1);

	include_once('AutoLoader.php');

	$query = new src\api\Question();
	$database = $query->query(1);

	$result = function() {
		http_response_code(401);
		exit(401);
	};

	if(key_exists('format', $_GET)) {
		$fmt = new src\api\Format();

		switch(strtolower($_GET['format'])) {
			case 'json':
				$result = $fmt->toJson($database);
				break;

			case 'xml':
				$result = $fmt->toXml($database);
				break;
		}
	}
?><?= $result ?>
