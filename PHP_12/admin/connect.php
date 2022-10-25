<?php
	require_once 'libs/Database.php';
	$params		= array(
			'server' 	=> 'localhost',
			'username'	=> 'root',
			'password'	=> '',
			'database'	=> 'php17_sql',
			'table'		=> 'rss',
	);
	
	$database = new Database($params);