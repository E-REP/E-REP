<?php
	session_start();
	if (isset($_SESSION['myusername'])) {
	$salt = "ripemd128";
	$con = mysqli_connect('127.0.0.1', 'root', '', 'erep');
	$_POST['groupname'] = stripslashes($_POST['groupname']);
	$_POST['grouppass'] = stripslashes($_POST['grouppass']);
	
	$_POST['groupname'] = $con->real_escape_string($_POST['groupname']);
	$_POST['grouppass'] = $con->real_escape_string($_POST['grouppass']);
	
	if (isSet($_POST['join']) && isSet($_POST['groupname']) && isSet($_POST['grouppass']) && $_POST['groupname'] != '' && $_POST['grouppass'] != '') {
		$gpass1 = $_POST['grouppass'];
		$gpass1MD5 = hash($salt,$_POST['grouppass']);
		$gname = $_POST['groupname'];
		$myusername = $_SESSION['myusername'];
		$result = mysqli_query($con,"SELECT * FROM user WHERE username='$myusername' ");
			while($row = mysqli_fetch_array($result)) {
			   $myid = $row['id'];
						   $group1 = $row['group1'];
						   $group2 = $row['group2'];
						   $group3 = $row['group3'];
						   $group4 = $row['group4'];
						   $group5 = $row['group5'];
						   $group6 = $row['group6'];
						   $group7 = $row['group7'];
						   $group8 = $row['group8'];
						   $group9 = $row['group9'];
						   $group10 = $row['group10'];
			}

		$q = mysqli_query($con, "SELECT * FROM groups WHERE `name`='$gname'");
		if ($q && mysqli_num_rows($q) < 0) {
			echo 'Group name does not exist.';
		}else{
					$result2 = mysqli_query($con,"SELECT * FROM groups WHERE name='$gname' ");
						while($row = mysqli_fetch_array($result2)) {
						   $gid = $row['id'];

						}
		if (empty($group1) == TRUE && isset($gid)) {
			$qq2 = mysqli_query($con, "UPDATE user SET `group1`='$gid' WHERE `username`='$myusername'");
			unset($gid);
			if ($qq2) {
				echo 'Joined the group succesfully!';
			}
		}
		elseif (empty($group2) == TRUE && isset($gid)) {
			$qq2 = mysqli_query($con, "UPDATE user SET `group2`='$gid' WHERE `username`='$myusername'");
			unset($gid);
			if ($qq2) {
				echo 'Joined the group succesfully!';
			}
		}
		elseif (empty($group3) == TRUE && isset($gid)) {
			$qq2 = mysqli_query($con, "UPDATE user SET `group3`='$gid' WHERE `username`='$myusername'");
			unset($gid);
			if ($qq2) {
				echo 'Joined the group succesfully!';
			}
		}
		elseif (empty($group4) == TRUE && isset($gid)) {
			$qq2 = mysqli_query($con, "UPDATE user SET `group4`='$gid' WHERE `username`='$myusername'");
			unset($gid);
			if ($qq2) {
				echo 'Joined the group succesfully!';
			}
		}
		elseif (empty($group5) == TRUE && isset($gid)) {
			$qq2 = mysqli_query($con, "UPDATE user SET `group5`='$gid' WHERE `username`='$myusername'");
			unset($gid);
			if ($qq2) {
				echo 'Joined the group succesfully!';
			}
		}
		elseif (empty($group6) == TRUE && isset($gid)) {
			$qq2 = mysqli_query($con, "UPDATE user SET `group6`='$gid' WHERE `username`='$myusername'");
			unset($gid);
			if ($qq2) {
				echo 'Joined the group succesfully!';
			}
		}
		elseif (empty($group7) == TRUE && isset($gid)) {
			$qq2 = mysqli_query($con, "UPDATE user SET `group7`='$gid' WHERE `username`='$myusername'");
			unset($gid);
			if ($qq2) {
				echo 'Joined the group succesfully!';
			}
		}
		elseif (empty($group8) == TRUE && isset($gid)) {
			$qq2 = mysqli_query($con, "UPDATE user SET `group8`='$gid' WHERE `username`='$myusername'");
			unset($gid);
			if ($qq2) {
				echo 'Joined the group succesfully!';
			}
		}
		elseif (empty($group9) == TRUE && isset($gid)) {
			$qq2 = mysqli_query($con, "UPDATE user SET `group9`='$gid' WHERE `username`='$myusername'");
			unset($gid);
			if ($qq2) {
				echo 'Joined the group succesfully!';
			}
		}
		elseif (empty($group10) == TRUE && isset($gid)) {
			$qq2 = mysqli_query($con, "UPDATE user SET `group10`='$gid' WHERE `username`='$myusername'");
			unset($gid);
			if ($qq2) {
				echo 'Joined the group succesfully!';
			}
		}
			else {
				echo 'Failed to join the group.';
			}
			
		}
	}
	else { echo 'Fill out the form you dumb fuck!';}
	}
?>