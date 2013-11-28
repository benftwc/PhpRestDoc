<?php
	// Url of PhpRestDoc
	$base_url = strtok($_SERVER["REQUEST_URI"], '?');
	
	// Menu
	if (isset($_SESSION['user_id'])) $menus = array("documentation", "administration");
	else $menus = array("documentation");
	if (!isset($_GET['menu']) || !in_array($_GET['menu'], $menus)) $_GET['menu'] = $menus[0];
?>