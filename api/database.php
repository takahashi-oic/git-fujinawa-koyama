<?php
	declare(strict_types = 1);

	require_once('AutoLoader.php');

	$query = new api\Question();
	$result = $query->query(1);

	while($column = $result->fetch()) echo $column;
