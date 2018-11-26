<?php
	use api\QuestionnaireParser;

	include_once "src/Parser.php";
	$parser = new QuestionnaireParser($_GET);
?><?= $parser->result; ?>
