<?php
	declare(strict_types = 1);

	spl_autoload_register(function($name) {
		include(__DIR__ . DIRECTORY_SEPARATOR . "${name}.php");
	});
