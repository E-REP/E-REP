<!DOCTYPE html>
<html>
<?php include 'header.php'; ?>
<body>
<div id="container">
	<div class="registration-form">
		<form ACTION="./resources/functions/cgroup.php" METHOD="post">
			<p>Group name:</p><input name="groupname" type="text" size="20"></input>
			<p>Password:</p><input name="grouppass" type="password" size="20"></input>
			<p>Repeat password:</p><input name="grouppass2" type="password" size="20"></input>
			<input type='submit' value='Create' name='reg' />
		</form>
		<br/>
		<form ACTION="./resources/functions/jgroup.php" METHOD="post">
			<p>Group name:</p><input name="groupname" type="text" size="20"></input>
			<p>Password:</p><input name="grouppass" type="password" size="20"></input>
			<input type='submit' value='Join group' name='join' />
		</form>
	</div>
	<div id='groups'>
	<p>Your current groups! Remember that you may only join 10 groups.</p>
	<?php include './resources/functions/listgroups.php'?>
	</div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
