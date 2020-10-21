	<?php 
	if(isset($_SESSION['myusername']) == TRUE) {
	$salt = "ripemd128";
	$con = mysqli_connect('127.0.0.1', 'root', '', 'erep');
	$myusername = $_SESSION['myusername'];
	$result = mysqli_query($con,"SELECT * FROM user WHERE username='$myusername' ");
	   while($row = mysqli_fetch_array($result)) {
	   $ID = $row['id'];
		   if (empty($row['group1']) == FALSE) {
				   $group1 = $row['group1'];
	
		   if (empty($row['group2']) == FALSE) {
				   $group2 = $row['group2'];

			if (empty($row['group3']) == FALSE) {
				   $group3 = $row['group3'];

			if (empty($row['group4']) == FALSE) {
				   $group4 = $row['group4'];

			if (empty($row['group5']) == FALSE) {
				   $group5 = $row['group5'];

			if (empty($row['group6']) == FALSE) {
				   $group6 = $row['group6'];

			if (empty($row['group7']) == FALSE) {
				   $group7 = $row['group7'];

			if (empty($row['group8']) == FALSE) {
				   $group8 = $row['group8'];

			if (empty($row['group9']) == FALSE) {
				   $group9 = $row['group9'];

				   $group10 = $row['group10'];

		}

		$I = 0;
		$result2 = mysqli_query($con,"SELECT * FROM groups WHERE owner_id='$ID' ");
	   while($row = mysqli_fetch_array($result2)) {
			   $I++;
			   $OwnerGroupID[$I] = $row['id'];
			   $OwnedGroupName[$I] = $row['name'];
			}

		
	if (!empty($group1)) {
	$q = mysqli_query($con,"SELECT * FROM groups WHERE id='$group1' ");
	 while($row = mysqli_fetch_array($q)) {
		$group11 = $row['name'];
	 }
	echo 'Group 1) '.$group11.' <a href="../../E-REP/resources/functions/lgroup.php?group='.$group1.'"><img style="border:0;" src="./img/x.png" alt="Leave group"></a></br>'; if(isset($OwnedGroupName[1]) & $OwnedGroupName[1] == $group11) {echo 'You are the owner of this group, if you leave group will be disbanded!';}}
	
	elseif (!empty($group2)) { 
		$q = mysqli_query($con,"SELECT * FROM groups WHERE id='$group2' ");
	 while($row = mysqli_fetch_array($q)) {
		$group22 = $row['name'];
	 }
	echo 'Group 2) '.$group22.' <a href="../../E-REP/resources/functions/lgroup.php?group='.$group2.'"><img style="border:0;" src="./img/x.png" alt="Leave group"></a></br>';}
	
	elseif (!empty($group3)) { 
		$q = mysqli_query($con,"SELECT * FROM groups WHERE id='$group3' ");
	 while($row = mysqli_fetch_array($q)) {
		$group33 = $row['name'];
	 }
	echo 'Group 3) '.$group33.' <a href="../../E-REP/resources/functions/lgroup.php?group='.$group3.'"><img style="border:0;" src="./img/x.png" alt="Leave group"></a></br>';}
	
	elseif (!empty($group4)) { 
		$q = mysqli_query($con,"SELECT * FROM groups WHERE id='$group4' ");
	 while($row = mysqli_fetch_array($q)) {
		$group44 = $row['name'];
	 }
	echo 'Group 4) '.$group44.' <a href="../../E-REP/resources/functions/lgroup.php?group='.$group4.'"><img style="border:0;" src="./img/x.png" alt="Leave group"></a></br>';}
	
	elseif (!empty($group5)) { 
		$q = mysqli_query($con,"SELECT * FROM groups WHERE id='$group5' ");
	 while($row = mysqli_fetch_array($q)) {
		$group55 = $row['name'];
	 }
	echo 'Group 5) '.$group55.' <a href="../../E-REP/resources/functions/lgroup.php?group='.$group5.'"><img style="border:0;" src="./img/x.png" alt="Leave group"></a></br>';}
	
	elseif (!empty($group6)) {
	$q = mysqli_query($con,"SELECT * FROM groups WHERE id='$group6' ");
	 while($row = mysqli_fetch_array($q)) {
		$group66 = $row['name'];
	 }
	echo 'Group 6) '.$group66.' <a href="../../E-REP/resources/functions/lgroup.php?group='.$group6.'"><img style="border:0;" src="./img/x.png" alt="Leave group"></a></br>';}
	
	elseif (!empty($group7)) { 
		$q = mysqli_query($con,"SELECT * FROM groups WHERE id='$group7' ");
	 while($row = mysqli_fetch_array($q)) {
		$group77 = $row['name'];
	 }
	echo 'Group 7) '.$group77.' <a href="../../E-REP/resources/functions/lgroup.php?group='.$group7.'"><img style="border:0;" src="./img/x.png" alt="Leave group"></a></br>';}
	
	elseif (!empty($group8)) {
		$q = mysqli_query($con,"SELECT * FROM groups WHERE id='$group8' ");
	 while($row = mysqli_fetch_array($q)) {
		$group88 = $row['name'];
	 }
	echo 'Group 8) '.$group88.' <a href="../../E-REP/resources/functions/lgroup.php?group='.$group8.'"><img style="border:0;" src="./img/x.png" alt="Leave group"></a></br>';}
	
	elseif (!empty($group9)) { 
		$q = mysqli_query($con,"SELECT * FROM groups WHERE id='$group9' ");
	 while($row = mysqli_fetch_array($q)) {
		$group99 = $row['name'];
	 }
	echo 'Group 9) '.$group99.' <a href="../../E-REP/resources/functions/lgroup.php?group='.$group9.'"><img style="border:0;" src="./img/x.png" alt="Leave group"></a></br>';}

	elseif (!empty($group10)) { 
		$q = mysqli_query($con,"SELECT * FROM groups WHERE id='$group10' ");
	 while($row = mysqli_fetch_array($q)) {
		$group1010 = $row['name'];
	 }
	 echo 'Group 10) '.$group1010.' <a href="../../E-REP/resources/functions/lgroup.php?group='.$group10.'"><img style="border:0;" src="./img/x.png" alt="Leave group"></a></br>';}

	
	elseif (isset($_SESSION['myusername']) == FALSE)  {header('../../listgroups.php');}
	else {echo "Please login";}
	}
	?>