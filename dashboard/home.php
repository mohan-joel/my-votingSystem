<?php  
require "../actions/functions.php";
notLoggedIn('login.php');
require "navbar.php";

?>
<html>
    <head>
        <title>Voting System in PHP</title>
        <meta charset="UTF-8">
        <meta name="description" content="Free Web tutorials">
        <meta name="keywords" content="HTML, CSS, JavaScript">
        <meta name="author" content="John Doe">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../assets/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/style.css">
        <link rel="stylesheet" type="text/css" href="../assets/all.min.css">
    </head>
<body class="bg-secondary bg-gradient text-dark">
    <div class="container">
    	<button type="submit" class="btn" onclick="openPopup()">Number of votes</button>
			    	<div class="popup" id="popup">
			    		<img src="assets/images/download.jpeg" alt="img">
			    		<h4><?=$_SESSION['user']['username']?></h4>
			    		<p>You have got <?=$_SESSION['user']['votes']?> votes.</p>
			    		<button type="button" onclick="closePopup()">OK</button>
			    	</div>
    	

    	<script>
    		let popup = document.getElementById("popup");
    		function openPopup()
    		{
    			popup.classList.add("open-popup");
    		}

    		function closePopup()
    		{
    			popup.classList.remove("open-popup");
    		}
    	</script>
    
    <script src="assets/action.min.js"></script>
    <script src="../assets/bootstrap.min.js"></script>
    </div>
</body>
</html>