<?php
	declare(strict_types = 1);

	$url = parse_url(getenv('DATABASE_URL'));
	$db = new PDO("pgsql:" . sprintf('host=%s;port=%s;user=%s;password=%s;dbname=%s', $url["host"], $url["port"], $url["user"], $url["pass"], ltrim($url["path"], "/")));

	for($idx = 0; $idx < 100; $idx++) $db->query("INSERT INTO test(date) VALUES " . rand(0, 100));
