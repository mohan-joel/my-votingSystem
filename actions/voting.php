<?php
	
	require "functions.php";

	if(isset($_POST['vote'])){
		$votes = $_POST['groupVotes'];
		$totalvotes = $votes+1;


		$gid = $_POST['groupId'];
		$uid = $_SESSION['id'];
		

		$updateVoteQuery = "update users set votes ='$totalvotes' where id ='$gid'";
		$updateVotes = mysqli_query($con, $updateVoteQuery);

		$updateStatusQuery = "update users set status = 1 where id ='$uid'";
		$updateStatus = mysqli_query($con, $updateStatusQuery);

		if($updateVotes and $updateStatus){
				$getGroupQuery = "select username,photo,votes,id from users where standard='group'";
				$getGroup = mysqli_query($con, $getGroupQuery);
				$groups = mysqli_fetch_all($getGroup, MYSQLI_ASSOC);
				$_SESSION['groups'] = $groups;
				$_SESSION['status'] = 1;
				redirect('dashboard/dashboard.php');
		}else{
			redirect('dashboard/dashboard.php');
		}
	}


?>