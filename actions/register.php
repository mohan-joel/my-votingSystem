<?php 
    
  require "functions.php";
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
    $folder = "../uploads/images/".$filename;
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