<?php
session_start();
if (isset($_SESSION['myusername']) == FALSE) {
header("location:../../index.php");
}
else {
session_destroy();
header("location:../../index.php");
}