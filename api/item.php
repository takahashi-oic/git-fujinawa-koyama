<?php
	use api\ItemParser;

	include_once "src/Query.php";
	include_once "src/Parser.php";
	include_once "src/setter.php";
	$parser = new ItemParser($_GET);
?><?= $parser->result; ?>
