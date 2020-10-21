<!DOCTYPE html>
<html>
<?php
include 'header.php'; ?>
<body>
<div id="container">
	<div class="content">
	<form name="form1" method="post" action="./resources/functions/checklogin.php">
	
	<p>Username:</p>

	<input name="myusername" type="text" id="myusername"></td>

	<p>Password: </p>

	<input name="mypassword" type="password" id="mypassword"></td>
		</br>
		</br>
	<button id="reg" type="submit" name="Submit" value="Login">Login</button>
	</form>
	</div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
