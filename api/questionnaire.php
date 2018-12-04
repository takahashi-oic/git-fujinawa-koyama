<?php
	use api\QuestionnaireParser;

	include_once "src/Query.php";
	include_once "src/Parser.php";
	include_once "src/setter.php";
	$parser = new QuestionnaireParser($_GET);
?><?= $parser->result; ?>
