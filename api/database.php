<?php
	declare(strict_types = 1);

	include_once "src/query.php";
	include_once "src/Parser.php";
	include_once "src/setter.php";
	$parser = new DBParser($_GET);
?><?= $parser->result ?>
