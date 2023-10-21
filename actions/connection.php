<?php 
	session_start();
	$con = mysqli_connect('localhost','root','','votingsystem_db');

	if(!$con){
		die(mysqli_error($con));
	}


?>