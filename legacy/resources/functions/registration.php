<?php 
session_unset();
session_destroy();
session_start();
$_SESSION['RegistrationInProgress'] = True;

Include "../config.php";

$MysqlConnection = mysqli_connect("$MysqlServerIp", "$MysqlUsername", "$MysqlPassword", "$MysqlDatabase");

$RegisteredName = $_POST['RegisteredName'];
$Email = $_POST['Email'];
$Email2  = $_POST['Email2'];
$RegisteredPassword = $_POST['RegisteredPassword'];
$RegisteredPassword2 = $_POST['RegisteredPassword2'];

$RegisteredName = stripslashes($RegisteredName);
$Email = stripslashes($Email);
$Email2 = stripslashes($Email2);
$RegisteredPassword = stripslashes($RegisteredPassword);
$RegisteredPassword2 = stripslashes($RegisteredPassword2);

$RegisteredName = $MysqlConnection->real_escape_string($RegisteredName);
$Email =$MysqlConnection->real_escape_string($Email);
$Email2 =$MysqlConnection->real_escape_string($Email2);
$RegisteredPassword =$MysqlConnection->real_escape_string($RegisteredPassword);
$RegisteredPassword2 =$MysqlConnection->real_escape_string($RegisteredPassword2);

if ($RegisteredPassword != $RegisteredPassword2) {
	$_SESSION['PasswordMissmatch'] = True;
	header('Location: ../../index.php');
}
if ($Email != $Email2) {
	$_SESSION['EmailMissmatch'] = True;
	header('Location: ../../index.php');
}
if (filter_var($Email, FILTER_VALIDATE_EMAIL) == False) {
    	$_SESSION['FalseEmail'] = True;
		header('Location: ../../index.php');
}

$UniqueUsernameCheck = mysqli_query($MysqlConnection, "SELECT * FROM user WHERE `user_name`='$RegisteredName'");
if (mysqli_num_rows($UniqueUsernameCheck) > 0) {
		$_SESSION['UsernameTaken'] = True;
		header('Location: ../../index.php');
}
		
		
$SALT = "ripemd128";

if ($RegisteredPassword == $RegisteredPassword) {$HashedPassword = hash($SALT, $RegisteredPassword);}

if (isset($RegisteredName) & isset($Email) & isset($HashedPassword)) {
	$CreateUser = mysqli_query($MysqlConnection, "INSERT INTO erep_user (user_name,user_password,user_email,user_level,user_points) VALUES ('$RegisteredName', '$HashedPassword', '$Email','1','100')");
	
	if ($CreateUser) {
				$_SESSION['RegistrationComplete'] = True;
				header("location:../../index.php");
			}
	else
				echo 'Something has went wrong please go back and try again!';
	}
	
?>