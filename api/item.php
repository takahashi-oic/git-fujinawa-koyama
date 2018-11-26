<?php
	use api\ItemParser;

	include_once "src/Parser.php";
	$parser = new ItemParser($_GET);
?><?= $parser->result; ?>
