<?php 
    
  require "actions/functions.php";
  if(isset($_POST['register_btn'])){
    $username = addslashes($_POST['username']);
    $email = addslashes($_POST['email']);
    $mobile = addslashes($_POST['mobile']);
    $address = addslashes($_POST['address']);
    $gender = addslashes($_POST['gender']);
    $standard = addslashes($_POST['standard']);
    $password = addslashes($_POST['password']);
    $c_password = addslashes($_POST['c_password']);
    $image = addslashes($_FILES['image']['name']);
    $filename = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder = "uploads/images/".$filename;
    move_uploaded_file($tempname, $folder);
    if(confirmPassword($password,$c_password))
    {
        $query = "insert into users (username,email,mobile,address,gender,password,photo,standard,status,votes) values ('$username','$email','$mobile','$address','$gender','$password','$image','$standard',0,0)";
        $result = mysqli_query($con,$query);
        if($result)
        {
            redirect('login.php','Registered Successfully!!!');
        }
        else
        {
          redirect('signup.php','Registration Unsuccess!!!');
        }
    }
    else
    {
      redirect('signup.php','Password and Confirm Password do not match');
    }
  }

?>
<?php  require "includes/header.php";?>
<?php  require "includes/navbar.php";?>
<div class="container-fluid">
    <form accept="actions/register.php" method="post" enctype="multipart/form-data">
       <div class="p-4 mx-auto shadow rounded" style="margin-top:50px; width:100%; max-width:340px;">
            <h2 class="fs-6 text-center">Voting System in PHP</h2>
            <div class="rounded-circle text-center">
                <img class="rounded-circle border border-danger" style="width: 80px;" alt="avatar1" src="assets/images/logo.png" />
            </div>

           <?php if(!empty($_SESSION['msg'])): ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>Error:</strong> <?=$_SESSION['msg']?>
                  <?php session_unset(); ?>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif;?>
            <h3 class="text-center">Register</h3>
      
         	<input type="text" class="my-2 form-control" type="text" name="username" placeholder="Enter Full Name">

            <input type="email" class="my-2 form-control"  name="email" placeholder="Enter Email">

            <input type="text" class="my-2 form-control"  name="mobile" placeholder="Enter Mobile No">

            <input type="text" class="my-2 form-control"  name="address" placeholder="Enter Address">

            <select class="my-2 form-control" name="gender">
                <option value="">--Select a Gender--</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>

            <select class="my-2 form-control" name="standard">
                <option  value="">--Select a Standard--</option>
                <option  value="group">Group</option>
                <option  value="voter">Voter</option>
            </select>
      
            <input type="password" class="my-2 form-control"  name="password" placeholder="Enter Password" >

            <input type="password" class="my-2 form-control"  name="c_password" placeholder="Please Retype  Password" >
            
            <input type="file" name="image" class="form-control my-2">
           
           <div class="container">
                <button type="submit" name="register_btn" class="btn btn-primary">Register</button>
                
           </div><br>
           <p class="float-end">Already Registered?<a href="login.php">Login</a></p> 
       </div>
    </form>
</div>

<?php  require "includes/footer.php";?>