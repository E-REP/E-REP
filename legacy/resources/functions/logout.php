<?php
session_start();
if (isset($_SESSION['LoggedIn']) == FALSE) {
header("location:../../index.php");
}
else {
session_destroy();
session_unset();
header("location:../../index.php");
}
?>