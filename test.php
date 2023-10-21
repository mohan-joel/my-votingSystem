<?php
require "actions/functions.php";
$sql = "select username,votes,id from users where standard='group'";
$data = mysqli_query($con, $sql);
$fetched = mysqli_fetch_assoc($data);
echo "<pre>";
print_r($fetched['username']);


?>



