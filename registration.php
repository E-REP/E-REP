<!DOCTYPE html>
<html>
<?php include 'header.php'; ?>
<body>
<?php include 'navigation.php'; ?>
<div class="registration-form">
	<form ACTION="./resources/function/register.php" METHOD="post">
		<p>Username:</p><input name="regname" type="text" size="20"></input>
		<p>E-mail:</p><input name="email" type="text" size="20"></input>
		<p>Password:</p><input name="regpass1" type="password" size="20"></input>
		<p>Repeat Password:</p><input name="regpass2" type="password" size="20"></input>
		<input type="submit" />
	</form>
</div>
<?php include 'footer.php'; ?>
</body>
</html>