<?php
	header('Content-Type: text/plain; charset=utf-8');
	
	if (count($_POST) == 0)
	{
		header('Location: ../');
		exit();
	}
	
	// Test mysql_connect
	if (!@mysql_connect($_POST['mysql_server'], $_POST['mysql_username'], $_POST['mysql_password']))
	{
		echo 'mysql_connect';
		exit();
	}
	
	// Test mysql_select_db
	if (!@mysql_select_db($_POST['mysql_database']))
	{
		echo 'mysql_select_db';
		exit();
	}
	
	// Test if include directory is writable
	if (!@fopen("../include/config.php", "w"))
	{
		echo 'writable';
		exit();
	}
	
	// Tests are passed !
	echo 'true';
?>
