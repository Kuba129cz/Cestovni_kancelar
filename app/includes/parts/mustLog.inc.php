<?php
	if(session_status() == PHP_SESSION_NONE){
		// session has not started
		session_start();
	}

	if (isset($_SESSION['username']) && $_SERVER['REQUEST_URI'] == '/login') {
		header('Location: /');
		exit();
	} elseif (!isset($_SESSION['username']) && $_SERVER['REQUEST_URI'] != '/login') {
		header('Location: /login');
		exit();
	}
?>