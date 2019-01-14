<?php
	declare(strict_types = 1);

	require_once('AutoLoader.php');

	try {
		$query = new src\api\Select('age');
		$data = $query->query();
	} catch(Exception $e) {
		echo $e->getMessage();
	}

	$result = null;

	//	if(key_exists('format', $_GET)) {
	//		$fmt = new src\api\Format();
	//
	//		switch(strtolower($_GET['format'])) {
	//			case 'csv':
	//				$result = $fmt->toCsv($data);
	//				break;
	//
	//			case 'json':
	//				$result = $fmt->toJson($data);
	//				break;
	//
	//			case 'xml':
	//				$result = $fmt->toXml($data);
	//				break;
	//		}
	//	}
