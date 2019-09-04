<?php
	require_once('config.php');
	session_start();
	session_unset();
	header('Location: '.BASEURL.'index.php');exit;


?>