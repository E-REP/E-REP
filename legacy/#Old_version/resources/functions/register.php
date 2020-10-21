<?php
	session_start();
	$salt = "ripemd128";
	$con = mysqli_connect('127.0.0.1', 'root', '', 'erep');
	$_POST['regname'] = stripslashes($_POST['regname']);
	$_POST['regpass1'] = stripslashes($_POST['regpass1']);
	$_POST['regpass2'] = stripslashes($_POST['regpass2']);
	$_POST['email'] = stripslashes($_POST['email']);
	$_POST['regname'] = $con->real_escape_string($_POST['regname']);
	$_POST['regpass1'] = $con->real_escape_string($_POST['regpass1']);
	$_POST['regpass2'] = $con->real_escape_string($_POST['regpass2']);
	$_POST['email'] = $con->real_escape_string($_POST['email']);
	if (isSet($_POST['reg']) && isSet($_POST['regname']) && isSet($_POST['regpass1']) && $_POST['regname'] != '' && $_POST['regpass1'] != '' && $_POST['regpass1'] == $_POST['regpass2']) {
		$regpass1 = $_POST['regpass1'];
		$regpass1MD5 = hash($salt,$_POST['regpass1']);
		$regname = $_POST['regname'];
		$email = $_POST['email'];
		$q = mysqli_query($con, "SELECT * FROM user WHERE `username`='$regname'");
		if (mysqli_num_rows($q) > 0) {
			echo 'That username is already taken.';
		}else{
			$qq = mysqli_query($con, "INSERT INTO user (username,password,email) VALUES ('$regname', '$regpass1MD5', '$email')");
			if ($qq) {
				header("location:../../index.php");
			}else
				echo 'Failed to register.';
		}
	}
	else { echo 'Fill out the form you dumb fuck!';}
?>