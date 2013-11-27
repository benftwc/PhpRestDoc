<?php
	// Content
	if (isset($_SESSION['user_id'])) $contents = array("documentation", "administration");
	else $contents = array("documentation");
	if (!isset($_GET['c']) || !in_array($_GET['c'], $contents)) $_GET['c'] = $contents[0];
?>