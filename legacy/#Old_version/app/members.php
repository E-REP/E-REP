<!DOCTYPE html>
<html>
<?php include 'header.php'; ?>
<body>
<div id="container">
	<div class="content">
<?php

	$con=mysqli_connect("127.0.0.1","root","","erep");
	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }

	$sql="SELECT id, username FROM user ORDER BY id";

	if ($result=mysqli_query($con,$sql))
	  {
	  // Fetch one and one row
	  $number = 1;
	  while ($row = mysqli_fetch_array($result)) {
		echo $number . ' ' . '<a href="http://localhost/E-REP/app/profile.php?username=' . $row['username'] . '">' . $row['username'] . '</a>' .'<br />';
		$number++;
		}
	  // Free result set
	  mysqli_free_result($result);
	}

	mysqli_close($con);
?>
	</div>
	<div class="content">
		<h2>Search for a user below:</h2><br />
		<br />
		<form id="userProfile" action="profile.php" method="GET">
			<table>
				<tr>
					<td>Username:</td>
					<td><input type="text" id="username" name="username" /></td>
				</tr>
				<tr>
					<td><input type="submit" id="submit" value="View Profile" /></td>
				</tr>
				</table>
		</form>
	</div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>