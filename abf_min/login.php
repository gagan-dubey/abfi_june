<?php require_once('../abfi_all_inc/Classes/include_all_min.php'); ?>
<?php
	/**
		* Created by PhpStorm.
		* User: Atul
		* Date: 7/13/2017
		* Time: 5:25 PM
	*/
	if (isset($_POST['send'])) {
		// Process the form
		$_SESSION['last_time'] = time();
		
		
        // Attempt Login
		
        $username = $_POST["username"];
        $password = $_POST["password"];
		
		$login = new loginclass();
		
		$found_admin = $login->attempt_slogin($username, $password);
		
		if ($found_admin) {
			// Success
			// Mark user as logged in
			$_SESSION["admin_id"] = $found_admin["id"];
			$_SESSION["username"] = $found_admin["abf_uname"];
			// echo "this is admin" . $_SESSION["username"];
			header( "refresh:0;url=index.php" );
			
		}
		
		else {
			
			echo "<script> alert('Wrong Username/Password')</script>";
			//redirect_to("../admin_login.php");
			header( "refresh:0;url=sol_abfi_adm.php" );
			
			// redirect_to("jn_teachers_ece/wrong_combo.php");
		}
		
	}
	
	else {
		
		echo"wrong combo";
		// This is probably a GET request
		
	} // end: if (isset($_POST['submit']))
	
	
	
?>
