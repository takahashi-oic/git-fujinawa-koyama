<?php
	use api\DBParser;

	include_once "src/Parser.php";
	$parser = new DBParser($_GET);
?><?= $parser->result; ?>
