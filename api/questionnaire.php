<?php
	declare(strict_types = 1);
	use api\QuestionnaireParser;

	include_once "src/query.php";
	include_once "src/Parser.php";
	include_once "src/setter.php";
	$parser = new QuestionnaireParser($_GET);
?><?= $parser->result; ?>
