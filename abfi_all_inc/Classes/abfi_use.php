<?php 

class abfi_use extends db_functions
{
	
	public function check_feilds($img_name,$a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p,$q,$r,$one,$two){
	if(empty($a) || empty($b) || empty($c) || empty($d) || empty($e) || empty($f) || empty($g) || empty($h) || empty($i) || empty($j) || empty($k) || empty($l) || empty($m) || empty($n) || empty($o) || empty($p) || empty($q) || empty($r))
	{
		echo "<script> alert('One of the required field is empty..'); </script>";
		return 0;
	}
	
	else 
	{
		if ($o === '204')
		{
			if(empty($one))
			{
				echo "<script> alert('Kindly specify your position as other official..'); </script>";
				return 1;
			}
		}
		
		if($r === 'Married' || $r === 'widow/Widower')
		{
			if(empty($two))
				
				{
					echo "<script> alert('Kindly enter your marriage date..'); </script>";
					return 2;
				}
		}
		
		return 3;
	}
	
}
	
	public function check_official($state)
	
	{
		$sql = "SELECT * from abfi_ply_offc where login_state='$state'";
		$check = $this->extract($sql);
		return $check;
	}
	
	public function insert_official($off_id,$sec_id,$a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$one,$o,$p,$q,$r,$s,$t,$two,$user_img,$u)
	{
		$sql = "INSERT INTO abfi_ply_offc (offc_reg_id, offc_sec_reg_id, full_name, father_name, dob, gender, blood_group, height, weight, address, pin_code, district, state, login_state, position, designation, other_pos, adhar_card, passport_num, contact, emergency_contct, email, marital_status, mrg_date,user_img,status)
		VALUES ('$off_id', '$sec_id', '$a', '$b', '$c', '$d', '$e', '$f', '$g', '$h', '$i', '$j', '$k', '$l', '$m', '$n', '$one', '$o', '$p', '$q', '$r', '$s', '$t', '$two', '$user_img', '$u')";
	    
		$insert_data = $this->extract($sql);
		return $insert_data;
	
	}
	
	public function insert_image($name,$size,$temp)
	{
        $file_name = $name;
		$maxsize = 200 * 1024;
		$file_size = $size;
		$file_tmp = $temp;
        $fpart2 = pathinfo($file_name, PATHINFO_EXTENSION);
		$allowedextns = array('jpeg','JPEG','png','PNG','jpg','JPG');
		$desired_dir="off_reg_imgs";
		
		if($file_size < $maxsize)
			{
			
		if(!in_array($fpart2 , $allowedextns))
		{
			
			echo "<script>alert('Kindly Upload a JPEG/JPG or PNG file to proceed further..!!')</script>";
			return 1;
			
		}
		
		else 
		{
			//echo "<script>alert('You are good to go')</script>";
			
			 if(is_dir($desired_dir)==false){
                mkdir("$desired_dir", 0700);		// Create directory if it does not exist
            }
			
			if(is_dir("$desired_dir/".$file_name)==false){
                move_uploaded_file($file_tmp,"$desired_dir/".$file_name);
            }
			
			 return 4;	
		   
			 
        } 
           }   else 
			  {
				  echo "<script>alert('File size can not be greater than 200KB')</script>";
				  return 0;
				  //header('refresh:0;url=index');
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
		$coded_pass = new login_func();
		$new_pass = $coded_pass->password_encrypt($pass);
		
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
			header("refresh:0;url=logout-all");
		}
		else
		{
			$abfi_token = $this->get_token($uid);
			if($abfi_token != $token)
			{
				header("refresh:0;url=logout-all");
			}
			
		}
	}
	
	public function get_all_players($state)
	{   $sql = "select * from abfi_ply_reg where status='0' and state='$state'"; 
		$player_data = $this->extract($sql);
		return $player_data;
	}
	
	public function get_all_officials($state)
	{   $sql = "select * from abfi_ply_offc where status='2' and login_state='$state'"; 
		$offc_data = $this->extract($sql);
		return $offc_data;
	}
	
	public function get_all_tourn()
	{   $sql = "select * from abfi_tour_create"; 
		$tourn_data = $this->extract($sql);
		return $tourn_data;
	}
	
	public function get_all_roster($state)
	{   $sql = "select distinct a.roster_id from abfi_roster_create as a inner join abfi_roster_create_off as b on a.roster_id = b.roster_id where a.state='$state'"; 
		$roster_data = $this->extract($sql);
		return $roster_data;
	}
	
	public function check_all_fields_ply($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p,$q,$r)
	{
		if(empty($a) || empty($b) || empty($c) || empty($d) || empty($e) || empty($f) || empty($g) || empty($h) || empty($i) || empty($j) || empty($k) || empty($l) || empty($m) || empty($n) || empty($o) || empty($p) || empty($q) || empty($r))
		{
			echo "<script> alert('One of the required field is empty..'); </script>";
			return 0;
		}
		
		else 
		{
			return 1;
		}
	}
	
	public function insert_player($off_id,$sec_id,$a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p,$q,$r,$user_img,$u)
	{
		$sql = "INSERT INTO abfi_ply_reg (ply_reg_id, ply_sec_reg_id, full_name, father_name, dob, gender, blood_group, height, weight, address, pin_code, district, state, login_state, position, adhar_card, passport_num, contact, emergency_contct, email, ply_img, status)
		VALUES ('$off_id', '$sec_id', '$a', '$b', '$c', '$d', '$e', '$f', '$g', '$h', '$i', '$j', '$k', '$l', '$m', '$n', '$o', '$p', '$q', '$r', '$user_img', '$u')";
	    
		$insert_data = $this->extract($sql);
		return $insert_data;
	
	}
	
	public function get_player_dets($state)
	{   $sql = "select * from abfi_ply_reg where state = '$state' and status='0'"; 
		$player_dets = $this->extract($sql);
		return $player_dets;
	}
	
	public function get_player_dets_gender($state,$gender)
	{   $sql = "select * from abfi_ply_reg where login_state='$state' and status='0' and gender='$gender'"; 
		$player_dets = $this->extract($sql);
		return $player_dets;
	}
	
	public function get_gender($gender)
	{  
	    if($gender === "M")
		{return "Male";} 
	    elseif($gender == "F")
	     {return "Female";}
	}
	
	public function delete_player($delid)
	{   $sql = "update abfi_ply_reg set status = '1' where ply_sec_reg_id = '$delid'"; 
		$del_ply = $this->extract($sql);
		return $del_ply;
	}
	
	public function single_player_dets($secid)
	{   $sql = "select * from abfi_ply_reg where ply_sec_reg_id = '$secid'"; 
		$single_ply = $this->extract($sql);
		return $single_ply;
	}
	
	public function get_events($eventid)
	{
		$sql = "select * from abfi_tour_create where sec_event_id ='$eventid' and event_status='1'";
		$get_event = $this->extract($sql);
		return $get_event;
	}
	
	public function get_events_all()
	{
		$sql = "select * from abfi_tour_create where event_status='0' and event_type='N'";
		$get_event = $this->extract($sql);
		return $get_event;
	}
	
	public function get_events_all_international()
	{
		$sql = "select * from abfi_tour_create where event_status='0' and event_type='IN'";
		$get_event = $this->extract($sql);
		return $get_event;
	}
	
	public function get_state_roster($state)
	{
		$sql = "SELECT DISTINCT abfi_roster_create.event_id AS event, COUNT( DISTINCT abfi_roster_create.player_reg_id ) AS players, abfi_roster_create.gender AS gender, abfi_roster_create.state AS state, abfi_roster_create.status AS 
				status, abfi_roster_create.roster_id as roster, COUNT( DISTINCT abfi_roster_create_off.off_reg_id ) AS officials, abfi_tour_create.event_name as event_name
				FROM abfi_roster_create
				INNER JOIN abfi_roster_create_off ON abfi_roster_create.roster_id = abfi_roster_create_off.roster_id INNER JOIN abfi_tour_create ON abfi_roster_create.event_id = abfi_tour_create.sec_event_id where abfi_roster_create.state='$state' group by event,gender";
		$get_roster = $this->extract($sql);
		return $get_roster;
	}
	
	public function get_roster_status($status)
	{
		if($status == 0)
		{
			return "Send for Approval";
		}
		
		if($status == 1)
		{
			return "Pending";
		}
		
		elseif($status == 2)
		{
			return "Rejected";
		}
		
		elseif($status == 3)
		{
			return "Approved";
		}
		
		else
		{
			return "Undefined";
		}
			
	}
	
	public function get_state_abb($state)
	{
		$sql = "select * from abfi_states where state_code='$state'";
		$get_state_abb = $this->extract($sql);
		$row = $get_state_abb->fetch_assoc();
		return $row["state_abb"];
	}
	
	public function get_state_name($state)
	{
		$sql = "select * from abfi_states where state_code='$state'";
		$get_state_name = $this->extract($sql);
		$row = $get_state_name->fetch_assoc();
		return $row["state_name"];
	}
	
	public function get_offc_code($code)
	{
		$sql = "select * from abfi_offical_code where abfi_offc_code='$code'";
		$get_state_name = $this->extract($sql);
		$row = $get_state_name->fetch_assoc();
		return $row["abfi_offc_abb"];
	}
	
	public function get_offc_name($code)
	{
		$sql = "select * from abfi_offical_code where abfi_offc_code='$code'";
		$get_state_name = $this->extract($sql);
		$row = $get_state_name->fetch_assoc();
		return $row["abfi_offc_type"];
	}
	
	public function delete_official($delid)
	{   $sql = "update abfi_ply_offc set status = '4' where offc_sec_reg_id = '$delid'"; 
		$del_ply = $this->extract($sql);
		return $del_ply;
	}
	
	
	public function get_imp_officials($state)
	{   $sql = "select * from abfi_ply_offc where status='2' and position in ('201') and login_state='$state'"; 
		$offc_data = $this->extract($sql);
		return $offc_data;
	}
	
	public function get_event_name($event)
	{
		$sql = "select event_name from abfi_tour_create where sec_event_id = '$event'";
		$event_data = $this->extract($sql);
		$row = $event_data->fetch_assoc();
		return $row["event_name"];
	}
	
	public function get_int_roster_by_event()
	{
		$sql = "SELECT DISTINCT a.event_id as eid, count(DISTINCT a.roster_id) as roster_num, b.event_name as event, b.event_status as status, b.event_type as type, b.event_level as level FROM int_roster_ply as a INNER JOIN abfi_tour_create as b on a.event_id=b.sec_event_id group by a.event_id";
		$get_roster_event = $this->extract($sql);
		return $get_roster_event;
		
	}
	
	public function get_international_roster($event)
	{
		$sql = "SELECT DISTINCT a.event_id AS event, COUNT( DISTINCT a.player_reg_id ) AS players, a.gender AS gender, a.state AS state, a.status AS 
				status, a.roster_id as roster, COUNT( DISTINCT b.off_reg_id ) AS officials, c.event_name as event_name
				FROM int_roster_ply AS a
				INNER JOIN int_roster_offc AS b ON a.roster_id = b.roster_id INNER JOIN abfi_tour_create as c ON a.event_id = c.sec_event_id where a.event_id = '$event' group by event,gender";
		$get_roster = $this->extract($sql);
		return $get_roster;
	}
	
	public function get_player_dets_gender_all($gender)
	{
		$sql = "SELECT * from abfi_ply_reg where status = '0' and gender = '$gender'";
		$all_players = $this->extract($sql);
		return $all_players;
	}
	
	public function get_all_officials_india()
	{   $sql = "select * from abfi_ply_offc where status='2'"; 
		$offc_data = $this->extract($sql);
		return $offc_data;
	}
	
	public function get_event_level($event)
	{
		if($event == 'LL')
		{
			return "Little League";
		}
		
		elseif($event == 'SJ')
		{
			return "Sub Junior";
		}
		
		elseif($event == 'JL')
		{
			return "Junior";
		}
		
		elseif($event == 'SL')
		{
			return "Senior";
		}
		
		else
		{
			return "Default Level";
		}
	
	}
	
	public function get_event_status($status)
	{
		if($status == 0)
		{
			return "Open";
		}
		
		elseif($status == 1)
		{
			return "Registration Closed";
		}
		
		elseif($status == 2)
		{
			return "Event Closed";
		}
		
		else 
		{
			return "Unknown";
		}
	}
	
	public function get_event_type($event)
	{
		if($event == "N")
		{
			return "National";
		}
		
		elseif($event == "IN")
		{
			return "International";
		}
	}

	
	public function check_id_before_create($code,$pid,$gender)
{
	$sql = "SELECT * FROM abfi_ply_reg where ply_reg_id ='$pid'"; 
		$offc_data = $this->extract($sql);
		if (mysqli_num_rows($offc_data) == 1) {
		$ply_id_one = $code . "PLY" . rand(10,1000) . $gender;
		return $ply_id_one;
		   
    }
 else {
		
		return $pid;
}
	
}

public function get_all_country()
	{
		$sql = "select * from intn_country";
		$get_country = $this->extract($sql);
		return $get_country;
	}
	
}



?>