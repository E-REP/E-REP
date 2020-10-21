<?php
	session_start();
	if (isset($_SESSION['myusername'])) {
	$salt = "ripemd128";
	$con = mysqli_connect('127.0.0.1', 'root', '', 'erep');
	$_POST['groupname'] = stripslashes($_POST['groupname']);
	$_POST['grouppass'] = stripslashes($_POST['grouppass']);
	$_POST['grouppass2'] = stripslashes($_POST['grouppass2']);
	
	$_POST['groupname'] = $con->real_escape_string($_POST['groupname']);
	$_POST['grouppass'] = $con->real_escape_string($_POST['grouppass']);
	$_POST['grouppass2'] = $con->real_escape_string($_POST['grouppass2']);
	
	if (isSet($_POST['reg']) && isSet($_POST['groupname']) && isSet($_POST['grouppass']) && $_POST['groupname'] != '' && $_POST['grouppass'] != '' && $_POST['grouppass'] == $_POST['grouppass2']) {
		$regpass1 = $_POST['grouppass'];
		$regpass1MD5 = hash($salt,$_POST['grouppass']);
		$regname = $_POST['groupname'];
		$myusername = $_SESSION['myusername'];
		$result = mysqli_query($con,"SELECT * FROM user WHERE username='$myusername' ");
			while($row = mysqli_fetch_array($result)) {
			   $myid = $row['id'];
			}

		$q = mysqli_query($con, "SELECT * FROM groups WHERE `name`='$regname'");
		if ($q && mysqli_num_rows($q) > 0) {
			echo 'That group name is already taken.';
		}else{
			$qq = mysqli_query($con, "INSERT INTO groups (name,group_password,owner_id) VALUES ('$regname', '$regpass1MD5','$myid')");
					$result2 = mysqli_query($con,"SELECT * FROM groups WHERE name='$regname' ");
						while($row = mysqli_fetch_array($result2)) {
						   $mygid = $row['id'];
						}
			$qq2 = mysqli_query($con, "UPDATE user SET `group1`='$mygid' WHERE `username`='$myusername'");
			if ($qq && $qq2) {
				echo 'Registered successfully!';
			}else
				echo 'Failed to register.';
		}
	}
	else { echo 'Fill out the form you dumb fuck!';}
	}
?>