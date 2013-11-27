<?php
	if (@mysql_connect($mysql_server, $mysql_username, $mysql_password)) {
		if (@mysql_select_db($mysql_database)) {
			mysql_query("SET NAMES 'utf8'");
		} else {
			$errors_config = 'wrong_mysql_select_db';
		}
	} else {
		$errors_config = 'wrong_mysql_connect';
	}
	
	if (isset($errors_config))
	{
		$_SESSION = array();
		session_destroy();
		header('Content-Type: text/plain; charset=utf-8');
		echo 'Something went wrong with MySQL connection ! Please check your ./include/config.php file.' . "\n";
		echo 'NB: if you want to re-install PhpRestDoc, just delete everything inside ./include/config.php file.' . "\n";
		exit();
	}
?>