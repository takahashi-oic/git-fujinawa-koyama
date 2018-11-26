<?php
	include_once "src\Parser.php";
	$dao = new api\DBParser();
?><?= $dao->toXml() ?>
