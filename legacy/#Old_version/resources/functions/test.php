<?php
	$salt = "ripemd128";
	$con = mysqli_connect('127.0.0.1', 'root', '', 'erep');
	$myusername = "krikus62";
	$I = 0;
$result2 = mysqli_query($con,"SELECT * FROM groups WHERE owner_id='21' ");
	   while($row = mysqli_fetch_array($result2)) {
	   $I++;
	   $OwnerGroupID[$I] = $row['id'];
	   $OwnedGroupName[$I] = $row['name'];

			}
	   		echo $OwnedGroupName[1];

		?>