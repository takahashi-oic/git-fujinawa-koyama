<?php
	declare(strict_types = 1);

	$url = parse_url(getenv('DATABASE_URL'));
	$db = new PDO("pgsql:" . sprintf('host=%s;port=%s;user=%s;password=%s;dbname=%s', $url["host"], $url["port"], $url["user"], $url["pass"], ltrim($url["path"], "/")));

	$db->
	for($idx = 0; $idx < 10; $idx++) {
		$rand = rand(1, 100);
		$db->query("INSERT INTO age(age) VALUES (${rand})");
	}
