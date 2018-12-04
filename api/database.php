<?php
	use api\DBParser;

	include_once "src/Query.php";
	include_once "src/Parser.php";
	include_once "src/setter.php";
	$parser = new DBParser($_GET);
?><?= $parser->result ?>
