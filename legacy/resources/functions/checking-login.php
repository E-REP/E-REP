<?php
session_unset();
session_destroy();
session_start();
$_SESSION['LoginInProgress'] = True;

Include "../config.php";

$MysqlConnection = mysqli_connect($MysqlServerIp, $MysqlUsername, $MysqlPassword, $MysqlDatabase);

$Username = $_POST['Username'];
$Password = $_POST['Password'];

$Username = stripslashes($Username);
$Password = stripslashes($Password);

$Username = $MysqlConnection->real_escape_string($Username);
$Password = $MysqlConnection->real_escape_string($Password);

$SALT = "ripemd128";
$HashedPassword = hash($SALT,$Password);

$query = "SELECT * FROM erep_user WHERE user_name='$Username'";
$result = mysqli_query($MysqlConnection,$query);

   while($row = mysqli_fetch_array($result)) {
	   $UsernameOnServer = $row['user_name'];
	   $PasswordOnServer = $row['user_password'];
	   $UserID = $row['id'];
  }
	
  if ($Username == $UsernameOnServer & $HashedPassword == $PasswordOnServer) {
		session_unset();
		session_destroy();
		session_start();
		$_SESSION['LoggedIn'] = True;
		$_SESSION['UserName'] = $Username;
		header('Location: ../../index.php');
	}
	else {
		session_unset();
		session_destroy();
		session_start();
		$_SESSION['FailedLogin'] = True;
		header('Location: ../../index.php');
	}
?>
