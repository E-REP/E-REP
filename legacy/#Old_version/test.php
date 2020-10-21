<?php 
session_start();
if(isset($_SESSION['myusername']) == TRUE) {
echo 'Session is set';
}
else {
echo 'No session';
}

?>