<!DOCTYPE html>
<html>
<?php include 'header.php'; ?>
<body>
<div id="container">
	<div id="profile-info">
		<p id="avatar">Image</p>
		<h2><?php echo $_SESSION['myusername']; ?> - Reputation</h2>
		<p>Name</p>
		<p>Age</p>
		<p>Location</p>
		<p>Website</p>
		<p>Bio</p>
	</div>
	<div id="reputation">
		<div class="rep-message">
			<p>This is a message from a user who gave reputation</p>
		</div>
		<div class="rep-message">
			<p>Another user, more reputation</p>
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>