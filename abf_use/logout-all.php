<?php

require_once("../abfi_all_inc/Classes/session_func.php"); ?>
<?php require_once("../abfi_all_inc/Classes/functions.php"); ?>

<?php
	// v1: simple logout
	//session_start();
	$_SESSION["admin_id"] = null;
	$_SESSION["username"] = null;
	$_SESSION["status"] = null;
	$_SESSION["state"] = null;
	$_SESSION["token"] = null;
	//redirect_to("../admin_login.php");
	
$url = "https://abfi.in/admin_login.php";
echo "<script>window.location.href='$url';</script>";


?>

<?php
	// v2: destroy session
	// assumes nothing else in session to keep
	// session_start();
	// $_SESSION = array();
	 //if (isset($_COOKIE[session_name()])) {
	 // setcookie(session_name(), '', time()-42000, '/');
	//}
	//session_destroy(); 
	// redirect_to("teacher.php");
?>
