<?php

	require "connection.php";
	require "config.php";
	function redirect($slug)
	{
		$redirectTo = ROOT.$slug;
		header("location: $redirectTo");
		exit(0);
	}

	function confirmPassword($password,$cpassword)
	{
		if($password == $cpassword)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function go($link)
	{
		return ROOT.$link;
	}

	function isLoggedIn()
	{
		if(isset($_SESSION['user'])){
			$sendTo = ROOT."dashboard/dashboard.php";
			header("location: $sendTo");
		}
	}

	function notLoggedIn($path)
	{
		if(!isset($_SESSION['user'])){
			$sendTo = ROOT.$path;
			header("location: $sendTo");
		}
	}

	