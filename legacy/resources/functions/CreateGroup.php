<?php	
	session_start();
	if (isset($_SESSION['UserName'])) {
	
	Include "../config.php";

	$MysqlConnection = mysqli_connect($MysqlServerIp, $MysqlUsername, $MysqlPassword, $MysqlDatabase);
	
	
	$_POST['groupname'] = stripslashes($_POST['groupname']);
	$_POST['grouppass'] = stripslashes($_POST['grouppass']);
	$_POST['grouppass2'] = stripslashes($_POST['grouppass2']);
	
	$_POST['groupname'] = $MysqlConnection->real_escape_string($_POST['groupname']);
	$_POST['grouppass'] = $MysqlConnection->real_escape_string($_POST['grouppass']);
	$_POST['grouppass2'] = $MysqlConnection->real_escape_string($_POST['grouppass2']);
	
	if (isset($_POST['reg']) && isSet($_POST['groupname']) && isSet($_POST['grouppass']) && $_POST['groupname'] != '' && $_POST['grouppass'] != '' && $_POST['grouppass'] == $_POST['grouppass2']) {
		$SALT = "ripemd128";
		$GroupPassword = $_POST['grouppass'];
		$GroupName = $_POST['groupname'];
		$HashedPassword = hash($SALT,$GroupPassword);
		
		$GroupCreator = $_SESSION['UserName'];
		
		$SqlResult = mysqli_query($MysqlConnection,"SELECT * FROM erep_user WHERE user_name='$GroupCreator' ");
			while($row = mysqli_fetch_array($SqlResult)) {
			   $CreatorID= $row['id'];
			}
		
		$SqlResult2 = mysqli_query($MysqlConnection, "SELECT * FROM erep_all_groups WHERE `name`='$GroupName'");
		if ($SqlResult2 && mysqli_num_rows($SqlResult2) > 0) {
			header('location:./resources/404pages/409.php?group=taken');
		}
		
		else {
			$SqlResult3 = mysqli_query($MysqlConnection, "INSERT INTO erep_all_groups (group_creator_id,group_level,group_password,id,name,points) VALUES ('$CreatorID', '1','$HashedPassword','$GroupName','0')");
					$SqlResult4= mysqli_query($MysqlConnection,"SELECT * FROM erep_all_groups WHERE name='$GroupName' ");
						while($row = mysqli_fetch_array($SqlResult4)) {
						   $CreatedGroupID = $row['id'];
						}
		}
	}
	}