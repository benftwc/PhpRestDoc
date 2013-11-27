<?php
	header('Content-Type: text/plain; charset=utf-8');
	
	if (count($_POST) == 0)
	{
		header('Location: ../');
		exit();
	}
	
	/* =====================================
		Write ./include/config.php
	===================================== */
	
	$key_session = uniqid();
	
	$file_source = '<?php' . "\n";
	$file_source .= '	$mysql_server = "' . $_POST['mysql_server'] . '";' . "\n";
	$file_source .= '	$mysql_username = "' . $_POST['mysql_username'] . '";' . "\n";
	$file_source .= '	$mysql_password = "' . str_replace('"','\"', $_POST['mysql_password']) . '";' . "\n";
	$file_source .= '	$mysql_database = "' . $_POST['mysql_database'] . '";' . "\n";
	$file_source .= '	$mysql_prefix = "' . $_POST['mysql_prefix'] . '";' . "\n";
	$file_source .= '	$key_session = "' . $key_session . '";' . "\n";
	$file_source .= '?>';
	
	$handle = fopen('../include/config.php', 'w');
	fwrite($handle, $file_source);
	fclose($handle);
	
	/* =====================================
		Create MySQL tables
	===================================== */
	
	// Get the entire MySQL query
	$file_name = '../include/phprestdoc.sql';
	$handle = fopen($file_name, 'r');
	$query = fread($handle, filesize($file_name));
	fclose($handle);
	
	// Adapt MySQL database and table prefix
	$query = str_replace('`phprestdoc`.`', '`' . $_POST['mysql_database'] . '`.`' . $_POST['mysql_prefix'], $query);
	$query = str_replace('phprestdoc', $_POST['mysql_database'], $query);
	
	/* =====================================
		Insert data in MySQL tables
	===================================== */
	
	$query .= "\n";
	
	// MySQL table : method
	$query .= "INSERT INTO " . $_POST['mysql_prefix'] . "method (method_name) VALUES ('DELETE');" . "\n";
	$query .= "INSERT INTO " . $_POST['mysql_prefix'] . "method (method_name) VALUES ('GET');" . "\n";
	$query .= "INSERT INTO " . $_POST['mysql_prefix'] . "method (method_name) VALUES ('POST');" . "\n";
	$query .= "INSERT INTO " . $_POST['mysql_prefix'] . "method (method_name) VALUES ('PUT');" . "\n";
	
	// MySQL table : parameter_type
	$query .= "INSERT INTO " . $_POST['mysql_prefix'] . "parameter_type (parameter_type_name) VALUES ('query');" . "\n";
	$query .= "INSERT INTO " . $_POST['mysql_prefix'] . "parameter_type (parameter_type_name) VALUES ('path');" . "\n";
	
	// MySQL table : variable_type
	$query .= "INSERT INTO " . $_POST['mysql_prefix'] . "variable_type (variable_type_name) VALUES ('array');" . "\n";
	$query .= "INSERT INTO " . $_POST['mysql_prefix'] . "variable_type (variable_type_name) VALUES ('integer');" . "\n";
	$query .= "INSERT INTO " . $_POST['mysql_prefix'] . "variable_type (variable_type_name) VALUES ('object');" . "\n";
	$query .= "INSERT INTO " . $_POST['mysql_prefix'] . "variable_type (variable_type_name) VALUES ('string');" . "\n";
	
	// MySQL table : user
	$query .= "INSERT INTO " . $_POST['mysql_prefix'] . "user (user_name, user_email, user_password) VALUES ('" . addslashes($_POST['user_name']) . "', '" . $_POST['user_email'] . "', '" . sha1($_POST['user_password']) . "');";
	
	// MySQLi connection, execution and close
	$mysqli = new mysqli($_POST['mysql_server'], $_POST['mysql_username'], $_POST['mysql_password'], $_POST['mysql_database']);
	$mysqli->set_charset("utf8");
	mysqli_multi_query($mysqli, $query);
	mysqli_close($mysqli);
	
	require_once '../include/session.php';
	$_SESSION['user_id'] = 1;
?>
