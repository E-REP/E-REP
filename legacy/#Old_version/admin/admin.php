<?php
	session_start();
	if (isset($_SESSION['myusername'] && $_SESSIOn['VIP'] == 2)) {
	
	$salt = "ripemd128";
	$con = mysqli_connect('127.0.0.1', 'root', '', 'erep');
	
	
	}
	else { header ('../index.php');}
	?>