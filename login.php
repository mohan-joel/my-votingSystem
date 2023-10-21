<?php  
require "actions/functions.php";
isLoggedIn();
  if(isset($_POST['login_btn']))
  {
    $email = addslashes($_POST['email']);
    $password = addslashes($_POST['password']);
    $standard = addslashes($_POST['standard']);

    $query = "select * from users where email='$email' and password='$password' and standard='$standard' limit 1";
    $result = mysqli_query($con, $query);
    $num_rows = mysqli_num_rows($result);

    if($num_rows > 0)
    {
        $sql = "select username,photo,votes,id from users where standard='group'";
        $resultGroup = mysqli_query($con,$sql);
        $group_num_rows = mysqli_num_rows($resultGroup);
        if($group_num_rows > 0)
        {
          $group = mysqli_fetch_all($resultGroup,MYSQLI_ASSOC);
          $_SESSION['groups'] = $group;
        }
        $row = mysqli_fetch_array($result);
        $_SESSION['id'] = $row['id'];
        $_SESSION['status'] = $row['status'];
        $_SESSION['user'] = $row;

        redirect('dashboard/dashboard.php');
    }
    else
    {
      redirect('login.php');
    }



  }

?>
<?php  require "includes/header.php";?>
<?php  require "includes/navbar.php";?>
<form method="post">
  <div class="container-fluid">
     <div class="p-4 mx-auto shadow rounded" style="margin-top:100px; width:100%; max-width:340px;">
     <h2 class="fs-6 text-center">Voting System in PHP</h2>
          <?php if(!empty($_SESSION['msg'])): ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>Success:</strong> <?=$_SESSION['msg']?>
                  <?php session_unset(); ?>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif;?>
          <div class="rounded-circle text-center">
              <img class="rounded-circle border border-primary" style="width: 80px;" alt="avatar1" src="assets/images/logo.png" />
          </div>
          <h3 class="text-center">Login</h3>

		      <input class="form-control my-2" type="email" name="email" placeholder="Enter Your Email" >
          
          <input class="form-control my-2" type="password" name="password" placeholder="Enter Your Password" >
       
           <select class="my-2 form-control" name="standard">
                <option  value="">--Select a Standard--</option>
                <option  value="group">Group</option>
                <option  value="voter">Voter</option>
            </select>

          <button type="submit" name="login_btn" class="btn btn-primary text-right">Login</button>
          <p class="float-end">Not Registered yet?<a href="signup.php">Register</a></p>          
     </div>

  </div>
</form>

<?php  require "includes/footer.php";?>