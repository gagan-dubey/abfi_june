<?php 

require_once('../abfi_all_inc/Classes/include_all_min.php'); ?>
<?php
	/**
		* Created by PhpStorm.
		* User: Atul
		* Date: 7/13/2017
		* Time: 5:25 PM
	*/
	
	if (isset($_POST['submit'])) {
		// Process the form
		$_SESSION['last_time'] = time();
		
		
        // Attempt Login
		
        $username = $_POST["username"];
        $password = $_POST["password"];
		
		$login = new loginclass();
		
		$found_admin = $login->attempt_login($username, $password);
		
		if ($found_admin) {
			// Success
			// Mark user as logged in
			$_SESSION["admin_id"] = $found_admin["id"];
			$_SESSION["username"] = $found_admin["abfi_username"];
			$_SESSION["status"] = $found_admin["abfi_status"];
			$_SESSION["state"] = $found_admin["abfi_state"];
			$_SESSION["token"] = $found_admin["abfi_token"];
			$save_token = $_SESSION["token"];
			// echo "this is admin" . $_SESSION["username"];
			if($_SESSION["status"] == 0)
			{
				header( "refresh:0;url=change_pass?tnk=$save_token" );
			}
            
			elseif($_SESSION["status"] == 1)
			{
				redirect_to("add_official_one?tnk=$save_token");
			}
			
			elseif($_SESSION["status"] == 2)
			{
				redirect_to("add_official_two?tnk=$save_token");
			}
			
			elseif($_SESSION["status"] == 3) 
			{
				redirect_to("index.php");
			}
			
			else
			{
				redirect_to("logout-all.php");
			}
			
		}
		
		else {
			
			echo "<script> alert('Wrong Username/Password')</script>";
			//redirect_to("../admin_login.php");
			header( "refresh:0;url=../admin_login.php" );
			
			// redirect_to("jn_teachers_ece/wrong_combo.php");
		}
		
	}
	
	else {
		
		echo"wrong combo";
		// This is probably a GET request
		
	} // end: if (isset($_POST['submit']))
	
	
	
?>



