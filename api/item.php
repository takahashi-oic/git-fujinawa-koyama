<?php
	declare(strict_types = 1);
	use api\ItemParser;

	include_once "src/query.php";
	include_once "src/Parser.php";
	include_once "src/setter.php";
	$parser = new ItemParser($_GET);
?><?= $parser->result; ?>
