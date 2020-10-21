<?php
	session_start();
	if (isset($_SESSION['myusername'])) {
	$salt = "ripemd128";
	$myusername = $_SESSION['myusername'];
	$con = mysqli_connect('127.0.0.1', 'root', '', 'erep');
			$lgroup = $_GET['group'];
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
			
			$result2 = mysqli_query($con,"SELECT * FROM groups WHERE id='$lgroup' ");
			while($row = mysqli_fetch_array($result)) {
						$gowner = $row['owner_id'];
						}
			if ($gowner == $myid) {
				echo "You are the owner of this group and if you leave the group will be disbanded! </br> <a href='./groupdisband.php'>Leave anyway!</a>";
			}

		if (is_numeric($lgroup) && $group1 == $lgroup){ 
		$qq2 = mysqli_query($con, "UPDATE user SET `group1`='' WHERE `username`='$myusername'");
		echo 'You have left the group';
		}
		if (is_numeric($lgroup) && $group2 == $lgroup){ 
		$qq2 = mysqli_query($con, "UPDATE user SET `group1`='' WHERE `username`='$myusername'");
		echo 'You have left the group';
		}
		if (is_numeric($lgroup) && $group2 == $lgroup){ 
		$qq2 = mysqli_query($con, "UPDATE user SET `group2`='' WHERE `username`='$myusername'");
		echo 'You have left the group';
		}
		if (is_numeric($lgroup) && $group3 == $lgroup){ 
		$qq2 = mysqli_query($con, "UPDATE user SET `group3`='' WHERE `username`='$myusername'");
		echo 'You have left the group';
		}
		if (is_numeric($lgroup) && $group4== $lgroup){ 
		$qq2 = mysqli_query($con, "UPDATE user SET `group4`='' WHERE `username`='$myusername'");
		echo 'You have left the group';
		}
		if (is_numeric($lgroup) && $group5 == $lgroup){ 
		$qq2 = mysqli_query($con, "UPDATE user SET `group5`='' WHERE `username`='$myusername'");
		echo 'You have left the group';
		}
		if (is_numeric($lgroup) && $group6 == $lgroup){ 
		$qq2 = mysqli_query($con, "UPDATE user SET `group6`='' WHERE `username`='$myusername'");
		echo 'You have left the group';
		}
		if (is_numeric($lgroup) && $group7 == $lgroup){ 
		$qq2 = mysqli_query($con, "UPDATE user SET `group7`='' WHERE `username`='$myusername'");
		echo 'You have left the group';
		}
		if (is_numeric($lgroup) && $group8 == $lgroup){ 
		$qq2 = mysqli_query($con, "UPDATE user SET `group8`='' WHERE `username`='$myusername'");
		echo 'You have left the group';
		}
		if (is_numeric($lgroup) && $group9 == $lgroup){ 
		$qq2 = mysqli_query($con, "UPDATE user SET `group9`='' WHERE `username`='$myusername'");
		echo 'You have left the group';
		}
		if (is_numeric($lgroup) && $group10 == $lgroup){ 
		$qq2 = mysqli_query($con, "UPDATE user SET `group10`='' WHERE `username`='$myusername'");
		echo 'You have left the group';
		}
		}
?>