<?php  
require "../actions/functions.php";
notLoggedIn('login.php');
require "header.php";
require "navbar.php";

?>
<body class="bg-secondary bg-gradient text-dark">
    <div class="container my-5">
    	<a href="#" class="btn btn-secondary text-light px-3">Back</a>
    		<div class="row my-5">
    			<div class="col-md-7">

    				<?php 

	    					if(isset($_SESSION['groups']))
	    				{
	    					$group = $_SESSION['groups'];
	    					for($i=0; $i<count($group);$i++){
	    						?>
	    						<!-- groups -->
			    				<div class="row">
			    					<div class="col-md-4">
			    						<img src="../uploads/images/<?php echo  $group[$i]['photo']; ?>" alt="group-pic"  style="height: 100px; width: 100px; object-fit: cover; border-radius: 50%;">
			    					</div>
			    					<div class="col-md-8">
			    						<strong class="text-light h6">Group name:<font style="color: orange"><?php echo $group[$i]['username']; ?></font></strong><br><hr>
			    						<?php if($_SESSION['user']['standard'] == 'voter'): ?>
			    						<strong class="text-light h6">Votes:<font style="color: orange"><?php echo $group[$i]['votes']; ?></font></strong><br><hr>
			    					<?php endif;?>
			    					</div>
			    				</div>
			    					<hr style="color: red; size: 5px;">

			    					<form method="post" action="../actions/voting.php">
			    						<input type="hidden" name="groupVotes" value="<?=$group[$i]['votes']?>">
			    						<input type="hidden" name="groupId" value="<?=$group[$i]['id']?>">


			    						<?php 

			    							if($_SESSION['status'] == 1){
			    								?>

			    								 <button class="btn btn-success my-2 text-white px-3">voted</button><p>You can't vote. You have already voted  </p>
			    								 <?php

			    							}else{
			    								?>

			    								<button class="btn btn-primary my-2 text-white px-3" type="submit" name="vote">vote</button><p>You can vote <?=$group[$i]['username']?></p>
			    								<?php
			    							}

			    						?>
			    					</form>
			    					<hr>
			    					<?php
	    					}
	    				}else{
	    					?>
	    					<div class="container">
	    						<p>No groups are added.</p>
	    					</div>
	    					<?php
	    				}
    				?>
    				
    			</div>
    			<div class="col-md-5">
    				<!-- user's profile -->
    				<img src="../uploads/images/<?=$_SESSION['user']['photo']?>" alt="users-pic" style="height: 150px; width: 150px; object-fit: cover; border-radius: 20%;">
    				<br>
    				<br>
    				<strong class="text-light h6 d-flex">Name: <h6 style="color: orange;"><?=$_SESSION['user']['username']?></h6></strong><hr style="width: 200px;">
    				<strong class="text-light h6">Mobile:<h6 style="color: orange;"><?=$_SESSION['user']['mobile']?></h6></strong><hr style="width: 200px;">
    				<strong class="text-light h6">Address:<h6 style="color: orange;"><?=$_SESSION['user']['address']?></h6></strong><hr style="width: 200px;">
    				<strong class="text-light h6">Gender:<h6 style="color: orange;"><?=$_SESSION['user']['gender']?></h6></strong><hr style="width: 200px;">
    				<strong class="text-light h6">Standard:<h6 style="color: orange;"><?=$_SESSION['user']['standard']?></h6></strong><hr style="width: 200px;">
    				<strong class="text-light h6">Status:</strong><?php
    				if($_SESSION['status'] == 1)
    				{
    					echo "<h6 style='color:orange;'>Already Voted</h6>";
    				}
    				else
    				{
    					echo "<h6 style='color:orange;'>Yet to vote</h6>";
    				}
    				?><br><hr style="width: 200px;">
    			</div>
    		</div>


<?php  require "footer.php";?>