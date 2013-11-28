<?php
	header('Content-Type: text/html; charset=utf-8');
	
	require_once 'include/config.php';
	require_once 'include/session.php';
	require_once 'include/mysql.php';
	require_once 'include/functions.php';
	require_once 'include/variables.php';
	
	if (isset($errors_config))
	{
		$_SESSION = array();
		session_destroy();
	}
	
	// Securing $_GET and $_POST
	if (count($_GET) != 0) for ($i=0; $i<count($_GET); $i++) { $_GET[key($_GET)] = clean_request_variable(current($_GET)); next($_GET); }
	if (count($_POST) != 0) for ($i=0; $i<count($_POST); $i++) { $_POST[key($_POST)] = clean_request_variable(current($_POST)); next($_POST); }
	
	require_once 'include/actions.php';
?>