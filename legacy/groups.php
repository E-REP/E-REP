<?php include "./template/header.php"?>
<div id="container">
	<div class="registration-form">
		<form ACTION="./resources/functions/CreateGroup.php" METHOD="post">
			<p>Group name:</p><input name="groupname" type="text" size="20"></input>
			<p>Password:</p><input name="grouppass" type="password" size="20"></input>
			<p>Repeat password:</p><input name="grouppass2" type="password" size="20"></input>
			<input type='submit' value='Create' name='reg' />
		</form>
		<br/>
		<form ACTION="./resources/functions/JoinGroup.php" METHOD="post">
			<p>Group name:</p><input name="groupname" type="text" size="20"></input>
			<p>Password:</p><input name="grouppass" type="password" size="20"></input>
			<input type='submit' value='Join group' name='join' />
		</form>
	</div>
	<div id='GroupInfo'>
	<p>More info about your groups can be found on your profile</p>
	</div>
</div>

