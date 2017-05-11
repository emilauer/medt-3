<?php 
session_start();
$user = "root";
$pwd = "root";
$_SESSION['check'] = false;
if (!isset($_SESSION['session_user'])) {
	header("Location: http://localhost/medt/ue12/index.php");
} else if (($_SESSION['session_user'] == $user) && ($_SESSION['session_pwd'] == $pwd)) {
	$_SESSION['check'] = true;
} else {
	$_SESSION['check'] = false;
	header("Location: http://localhost/medt/ue12/index.php?check=false");
}
?>