<?php
	session_start();
	
	if (isset($_SESSION['user_id']))
	{
		if (!isset($_SESSION['initiated']))
		{
			session_regenerate_id();
			$_SESSION['initiated'] = true;
		}
		
		if (isset($_SESSION['fingerprint']))
		{
			if ($_SESSION['fingerprint'] != hash("sha512", $_SESSION['user_id'] . $_SERVER['HTTP_USER_AGENT'] . $key_session))
			{
				$_SESSION = array();
				session_destroy();
			}
		}
		else
		{
			$_SESSION['fingerprint'] = hash("sha512", $_SESSION['user_id'] . $_SERVER['HTTP_USER_AGENT'] . $key_session);
		}
	}
?>