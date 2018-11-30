<?php
	use api\QuestionnaireParser;

	require_once "src/ContentType.php";
	include_once "src/Parser.php";

	switch($_GET['format']) {
		case 'json':
			$content = ContentType::JSON;
			break;
		case 'csv':
			$content = ContentType::CSV;
			break;
		case 'xml':
			$content = ContentType::XML;
			break;
	}

	if($_SERVER['REQUEST_URI'] != $_SERVER['PHP_SELF'])
		header("Content-Type: {$content}; charset=utf-8");

	$parser = new QuestionnaireParser($_GET);
?>
<?= $parser->result; ?>
