<?php

include "../config.php";

// Connect to server and select databse.
$con = mysqli_connect('127.0.0.1', 'root', '', 'erep');


$salt = "ripemd128";
// username and password sent from form 
$myusername=$_POST['myusername']; 
$mypassword=$_POST['mypassword']; 

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = $con->real_escape_string($myusername);
$mypassword = $con->real_escape_string($mypassword);
$mypassword = hash($salt,$mypassword);


$result = mysqli_query($con,"SELECT * FROM user WHERE username='$myusername' ");
   while($row = mysqli_fetch_array($result)) {
	   $username2 = $row['username'];
	   $password2 = $row['password'];
	   $userID = $row['id'];
  }

  
// If result matched $myusername and $mypassword, table row must be 1 row
if($myusername == $username2 && $mypassword == $password2){

	// Register $myusername, $mypassword and redirect to file "login_success.php"
	session_start();
	$_SESSION['myusername'] = $myusername;
	$_SESSION['mypassword'] = $mypassword;
	$_SESSION['myID'] = $userID;
	if(isset($_SESSION['myusername'])){
	header("location:../../index.php");

	}
}
else {
	echo "Wrong Username or Password";
	echo $mypassword;
}

?>