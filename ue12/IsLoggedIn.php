<?php 
session_start();
$session_check = false;
if (!isset($_SESSION['session_user'])) {
	header("Location: http://localhost/medt/ue12/index.php");
}
else {
	$session_check = true;
}
?>