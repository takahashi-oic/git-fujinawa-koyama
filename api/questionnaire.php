<?php
	declare(strict_types = 1);

	include_once('AutoLoader.php');

	$query = new src\api\Question();
	$result = $query->query(1);

	$fmt = new src\api\formatter\JsonFormat();
	echo $fmt->convert($result);
