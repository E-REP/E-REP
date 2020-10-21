<?php include "./template/header.php"?>

<div id="login-container" style="display:none;" >
	<div class="content">
	<form name="form1" method="post" action="./resources/functions/checking-login.php">
	<p>
	Username:
	<input name="Username" type="text" id="myusername">
	Password:
	<input name="Password" type="password" id="mypassword"> 
	<button id="reg" type="submit" name="Submit" value="Login">Login</button>
	<div id="Close-Login">X</div>
	</p>
	</form>
	</div>
</div>

<div id="registration-container" style="display:none;">
	<div class="registration-form">
		<form ACTION="./resources/functions/registration.php" METHOD="post">
			<p>Username:</p><input name="RegisteredName" type="text" size="20"></input>
			<p>E-mail:</p><input name="Email" type="text" size="20"></input>
			<p>Confirm Your Email:</p><input name="Email2" type="text" size="20"></input>
			<p>Password:</p><input name="RegisteredPassword" type="password" size="20"></input>
			<p>Repeat Password:</p><input name="RegisteredPassword2" type="password" size="20"></input>
			<input type='submit' value='Register' name='reg' />
		</form>
		<div id="Close-Registration">X</div>
	</div>
</div>

<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['FailedLogin'])) {session_destroy(); echo 'Your password or username was incorrect, please try again!';} 
if (isset($_SESSION['RegistrationInProgress'])== True & isset($_SESSION['RegistrationComplete'])) {session_destroy(); echo 'You have succesfully registered, you may login now!';} 
if (isset($_SESSION['RegistrationInProgress'])== True & isset($_SESSION['PasswordMissmatch'])) { if ($_SESSION['PasswordMissmatch']==True) { echo '<div id="PasswordError">Your password did not match</div>';}}
if (isset($_SESSION['RegistrationInProgress'])== True & isset($_SESSION['EmailMissmatch'])) { if ($_SESSION['EmailMissmatch']==True) { echo '<div id="EmailError">Your Email address did not match</div>';}}
if (isset($_SESSION['RegistrationInProgress'])== True & isset($_SESSION['FalseEmail'])) { if ($_SESSION['FalseEmail']==True) { echo '<div id="FalseEmail">Please enter valid E-Mail address!</div>';}}
if (isset($_SESSION['RegistrationInProgress'])== True & isset($_SESSION['UsernameTaken'])) { if ($_SESSION['UsernameTaken']==True) { echo '<div id="UsernameTaken">Username already taken please choose a new one!</div>';}}
?>