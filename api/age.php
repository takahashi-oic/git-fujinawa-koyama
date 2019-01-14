<?php
	declare(strict_types = 1);

	require_once('AutoLoader.php');

	$query = new Select('age');
	$data = $query->query();

	if($data == null) echo "null";

	if(key_exists('format', $_GET)) {
		$fmt = new Format();

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

	echo $result;
