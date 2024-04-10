<?php
	session_start();

	if (isset($_SESSION['username']) && $_SERVER['REQUEST_URI'] == '/login') {
		header('Location: /');
		exit();
	} elseif (!isset($_SESSION['username']) && $_SERVER['REQUEST_URI'] != '/login') {
		header('Location: /login');
		exit();
	}
?>