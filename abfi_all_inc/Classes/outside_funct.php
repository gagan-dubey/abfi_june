<?php 
class outside_func extends db_functions
{
	 public function password_encrypt($password) {
        $hash_format = "$2y$10$";   // Tells PHP to use Blowfish with a "cost" of 10
        $salt_length = 22; 					// Blowfish salts should be 22-characters or more
        $salt = $this->generate_salt($salt_length);
        $format_and_salt = $hash_format . $salt;
        $hash = crypt($password, $format_and_salt);
        return $hash;
    }

    private function generate_salt($length) {
        // Not 100% unique, not 100% random, but good enough for a salt
        // MD5 returns 32 characters
        $unique_random_string = md5(uniqid(mt_rand(), true));

        // Valid characters for a salt are [a-zA-Z0-9./]
        $base64_string = base64_encode($unique_random_string);

        // But not '+' which is valid in base64 encoding
        $modified_base64_string = str_replace('+', '.', $base64_string);

        // Truncate string to the correct length
        $salt = substr($modified_base64_string, 0, $length);

        return $salt;
    }


    private function random_password( $length = 8 )
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
        $password = substr( str_shuffle( $chars ), 0, $length );
        return $password;
    }
	
	public function cert_verify($cid)
	{
		$sql = "SELECT a.ply_name as player, a.cert_id as certificate, b.father_name as father,b.dob as dob, 
		c.event_name from cert_dets as a INNER JOIN abfi_ply_reg as b ON a.ply_id=b.ply_reg_id 
		INNER JOIN abfi_tour_create as c on a.eve_id = c.sec_event_id WHERE a.cert_id ='$cid'";
		$result = $this->extract($sql);
		return $result;
	}
	
	public function cert_verify_offc($cid)
	{
		$sql = "SELECT a.off_name as official, a.cert_id as certificate, b.father_name as father,b.dob as dob, 
		c.event_name from cert_dets_off as a INNER JOIN abfi_ply_offc as b ON a.off_id=b.offc_reg_id 
		INNER JOIN abfi_tour_create as c on a.eve_id = c.sec_event_id WHERE a.cert_id ='$cid'";
		$result = $this->extract($sql);
		return $result;
	}
	
	public function pass_reset_link_gen($username,$email,$state)
	{
		$dstate = $this->state_code_dcrypt($state);
		$sql = "select email from abfi_ply_offc where email='$email' and login_state='$dstate'";
		$result = $this->extract($sql);
		$data = mysqli_num_rows($result);
		if($data >= 1)
		{
			$nsql= "select id, abfi_token, abfi_username, abfi_state from abfi_login where abfi_username='$username' and abfi_state='$dstate' and abfi_status='3'";
			$nresult = $this->extract($nsql);
			$ndata = mysqli_fetch_assoc($nresult);
			$ntkn = $ndata['abfi_token'];
			$nuid = $this->state_code_ecrypt($ndata['id']);
			$nusername = $this->state_code_ecrypt($ndata['abfi_username']);
			$nustate = $this->state_code_ecrypt($ndata['abfi_state']);
			$nlink = "http://abfi.in/abf_use/repass?tnk=$ntkn&id=$nuid&n=$nusername&st=$nustate";
			$message  = "<html><body>";
   
$message .= "<table width='100%' bgcolor='#e0e0e0' cellpadding='0' cellspacing='0' border='0'>";
   
$message .= "<tr><td>";
   
$message .= "<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:650px; background-color:#fff; font-family:Verdana, Geneva, sans-serif;'>";
    
$message .= "<thead>
  <tr height='80'>
  <th colspan='4' style='background-color:#66BB6A; border-bottom:solid 1px #bdbdbd; font-family:Verdana, Geneva, sans-serif; color:#333; font-size:34px;' >Password Reset</th>
  </tr>
             </thead>";
    
$message .= "<tbody>
            

       <tr>
       <td colspan='4' style='padding:15px;'>
       <p style='font-size:20px;'>Dear User,</p>
       <hr />
       <p style='font-size:20px;'> We have received a passowrd change request for your account. Kindly use below link to change your password. 
	   </p>
	   <hr>
     <center><p><a href='$nlink'>Click Here To Change Your Password</a></p></center>
	 <hr>
	 <p>Thank-You</p>
	<p style='font-size:18px;'>
	 <b style='color:#66BB6A'> ABFI</b>
	  </p>
     
       </td>
       </tr>
      
       <tr height='80'>
       <td colspan='4' align='left' style='background-color:#66BB6A; border-top:solid #00a2d1 2px; font-size:24px; '>
       <center><p style='font-size:15px; margin-left:10px; font-family:Verdana, Geneva, sans-serif;'>&copy; All Rights Reserved 2018<br /><a href='www.abfi.in'>ABFI</a></p></center>
       </td>
       </tr>
      
              </tbody>";
    
$message .= "</table>";
   
$message .= "</td></tr>";
$message .= "</table>";
   
$message .= "</body></html>";

$mail = new PHPMailer;
$name = "ABFI-Support";


$mail->isSMTP();                                      
$mail->Host = 'localhost';  
$mail->SMTPAuth = true;                               
$mail->Username = 'info@abfi.in';                 
$mail->Password = 'Connect@98820#';                           
$mail->SMTPSecure = 'ssl';                            
$mail->Port = 465;                                    

$mail->setFrom('info@abfi.in', $name);
$mail->addAddress($email);     
$mail->isHTML(true);                       

$mail->Subject = 'Reset Password';
$mail->Body    = $message;
$mail->AltBody = $message;

if(!$mail->send()) {
    //echo "Could not send this message right now please try again later..!!!";
} 
else {
    return "ABF_SUCCESS";
}
			
		}
	}
	
	public function check_empty_pass($pass,$cpass)
	{
		if(empty($pass) || empty($cpass))
		{
			echo "<script>alert('One of the required field(s) is/are empty...';</script>";
			return 0;
		}
		else 
		{
			return 1;
		}
	}
	
	public function pass_equality($pass,$cpass)
	{
		if($pass == $cpass)
		{
			return 21;
		}
		
		else
		{
			return 22;
		}
	}
	
	public function update_pass($pass,$cpass,$uid)
	{
		$check = $this->pass_equality($pass,$cpass);
		$new_pass = $this->password_encrypt($pass);
		
		if($check == 21)
		{
			$sql = "update abfi_login set abfi_passw='$new_pass' where id='$uid'";
			$pass_update = $this->extract($sql);
			return $pass_update;
		}
	}
	
	public function update_token($uid)
	{
		$token = md5(uniqid(rand(), true));
		$sql = "update abfi_login set abfi_token='$token' where id ='$uid'";
		$new_token = $this->extract($sql);
		return $new_token;
	}
	
	public function get_token($uid)
	{
		$sql = "select abfi_token from abfi_login where id='$uid'";
		$get_fine_token = $this->extract($sql);
		$row = mysqli_fetch_assoc($get_fine_token); 
		$abfi_token = $row["abfi_token"];
		return $abfi_token;
	}
	
	public function check_token($token,$uid)
	{
		if (empty($token))
		{
			header("refresh:0;url=404/404");
		}
		else
		{
			$abfi_token = $this->get_token($uid);
			if($abfi_token != $token)
			{
				header("refresh:0;url=404/404");
			}
			
		}
	}
}

?>	