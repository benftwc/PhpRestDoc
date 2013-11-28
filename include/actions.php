<?php
	/* ====================================================
		USER CONNECTION
	==================================================== */
	
	if (isset($_POST['action']) && $_POST['action'] == "user_connect")
	{
		$query_result = mysql_query("SELECT * FROM " . $mysql_prefix . "user WHERE user_email = '" . $_POST['user_email'] . "'");
		if (mysql_num_rows($query_result) == 1)
		{
			$query_value = mysql_fetch_array($query_result);
			
			if (hash('sha512', $_POST['user_password'] . $key_password) == $query_value['user_password'])
			{
				$_SESSION['user_id'] = $query_value['user_id'];
				$_SESSION['user_name'] = $query_value['user_name'];
			}
			else
			{
				$error_user_connection = 'wrong_user_password';
			}
		}
		else
		{
			$error_user_connection = 'wrong_user_email';
		}
	}
	
	/* ====================================================
		USER DISCONNECTION
	==================================================== */
	
	if (isset($_GET['action']) && $_GET['action'] == "user_disconnect") {
		
		$_SESSION = array();
		session_destroy();
		header('Location: ' . $base_url);
		
	}
?>