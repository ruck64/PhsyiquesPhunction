<?php

	'mysql' => [
		'driver' => 'mysql',
		'host' => env('DB_HOST', 'us-cdbr-iron-east-05.cleardb.net'),
		'database' => env('DB_DATABASE', 'heroku_3e6dc0754d58604'),
		'username' => env('DB_USERNAME', 'bb2501c58a8034'),
		'password' => env('DB_PASSWORD', 'b8fa5f57'),
		'charset' => 'utf8',
		'collation' => 'utf8_unicode_ci',
		'prefix' => '',
		'strict' => false,
	],
	
?>