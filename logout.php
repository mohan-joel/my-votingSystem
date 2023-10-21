<?php 
	require "actions/functions.php";
	session_destroy();
	session_unset();
	session_regenerate_id();
	redirect('login.php','You are logged out');
?>