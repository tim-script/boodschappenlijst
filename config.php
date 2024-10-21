<?php

$secrets = require "secrets.php";

return [
	"database" => [
		"host"		=> "localhost",
		"database"	=> "groceries",
		"user"		=> "script",
		"password"	=> $secrets["database_password"],
	],
];
