<?php
	declare(strict_types = 1);

	require_once "src/query.php";
	require_once "src/Parser.php";
	require_once "src/setter.php";
	$parser = new ItemParser($_GET);
?><?= $parser->result; ?>
