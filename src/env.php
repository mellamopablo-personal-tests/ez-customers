<?php

use Dotenv\Dotenv;

$dotenv = new Dotenv(__DIR__ . "/..");
$dotenv->load();
$dotenv->required(
	[
		"DB_HOST",
		"DB_PORT",
		"DB_NAME",
		"DB_USERNAME",
		"DB_PASSWORD"
	]
);
