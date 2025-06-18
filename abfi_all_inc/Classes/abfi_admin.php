<?php
class abfi_admin extends db_functions
{
	public function check_empty_event($one,$two,$three,$four,$five,$six)
	{
		if(empty($one) || empty($two) || empty($three) || empty($four) || empty($five) || empty($six))
		{
			echo "<script>alert('One or more required field(s) is/are empty..');</script>";
			return 0;
		}

		else
		{
			return 1;
		}

	}

	public function create_event($one,$two,$three,$four,$five,$six)
	{
		$random = rand(10,100);
		$sec_id = "ABFI-EVE-" . "$random";
		$sql = "insert into abfi_tour_create (sec_event_id,event_name,event_organizer,event_dates,event_venue,event_type,event_level) values ('$sec_id','$one','$two','$three','$four','$five','$six')";
		$insert_data = $this->extract($sql);
		return $insert_data;
	}

	public function count_all_ply()
	{
		 $sql = "SELECT count(abfi_ply_reg.id) as total_play, abfi_ply_reg.login_state as pstate, abfi_ply_reg.status as status, abfi_ply_reg.gender as gender,
		 abfi_states.state_name as state from  abfi_ply_reg inner join
		 abfi_states on abfi_ply_reg.login_state = abfi_states.state_code where status in('0','2') group by gender, pstate order by gender desc, state ASC";
		 $all_ply = $this->extract($sql);
		 return $all_ply;
	}


	public function get_all_players()
	{   $sql = "select * from abfi_ply_reg where status='0'";
		$player_data = $this->extract($sql);
		return $player_data;
	}

	public function get_all_officials()
	{   $sql = "select * from abfi_ply_offc where status='2'";
		$offc_data = $this->extract($sql);
		return $offc_data;
	}

	public function get_all_tourn()
	{   $sql = "select * from abfi_tour_create";
		$tourn_data = $this->extract($sql);
		return $tourn_data;
	}

	public function get_all_tourn_int_eve()
	{   $sql = "select * from abfi_tour_create where event_type='IN'";
		$tourn_data = $this->extract($sql);
		return $tourn_data;
	}

	public function get_all_roster()
	{   $sql = "select distinct a.roster_id from abfi_roster_create as a inner join abfi_roster_create_off as b on a.roster_id = b.roster_id where a.status not in ('0')";
		$roster_data = $this->extract($sql);
		return $roster_data;
	}

	public function get_all_roster_int()
	{   $sql = "select distinct a.roster_id from int_roster_ply as a inner join int_roster_offc as b on a.roster_id = b.roster_id where a.status in ('0')";
		$roster_data = $this->extract($sql);
		return $roster_data;
	}

	public function get_all_roster_int_eve()
	{   $sql = "select distinct a.roster_id from intn_eve_ply_roster as a inner join intn_eve_off_roster as b on a.roster_id = b.roster_id where a.status in ('0')";
		$roster_data = $this->extract($sql);
		return $roster_data;
	}

	public function get_player_dets($state,$gender)
	{   $sql = "select * from abfi_ply_reg where login_state = '$state' and gender='$gender' and status in ('0','2')";
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

	public function single_player_dets($secid)
	{   $sql = "select * from abfi_ply_reg where ply_sec_reg_id = '$secid'";
		$single_ply = $this->extract($sql);
		return $single_ply;
	}


	public function delete_player($delid)
	{   $sql = "update abfi_ply_reg set status = '1' where ply_sec_reg_id = '$delid'";
		$del_ply = $this->extract($sql);
		return $del_ply;
	}

	public function block_player($delid)
	{   $sql = "update abfi_ply_reg set status = '2' where ply_sec_reg_id = '$delid'";
		$del_ply = $this->extract($sql);
		return $del_ply;
	}

	public function unblock_player($delid)
	{   $sql = "update abfi_ply_reg set status = '0' where ply_sec_reg_id = '$delid'";
		$del_ply = $this->extract($sql);
		return $del_ply;
	}

	public function count_all_off()
	{
		 $sql = "SELECT count(abfi_ply_offc.id) as total_offc, abfi_ply_offc.login_state as ostate, abfi_ply_offc.gender as gender,
		 abfi_states.state_name as state from  abfi_ply_offc inner join
		 abfi_states on abfi_ply_offc.login_state = abfi_states.state_code where abfi_ply_offc.status in('2') group by ostate order by ostate ASC";

		 $all_offc = $this->extract($sql);
		 return $all_offc;

	}

	public function get_offc_dets($state)
	{   $sql = "select * from abfi_ply_offc where login_state = '$state' and status in ('2')";
		$offc_dets = $this->extract($sql);
		return $offc_dets;
	}

	public function single_offc_dets($secid)
	{   $sql = "select * from abfi_ply_offc where offc_sec_reg_id = '$secid'";
		$single_offc = $this->extract($sql);
		return $single_offc;
	}

	public function get_state_roster($event)
	{
		$sql = "SELECT DISTINCT abfi_roster_create.event_id AS event, COUNT( DISTINCT abfi_roster_create.player_reg_id ) AS players, abfi_roster_create.gender AS gender, abfi_roster_create.state AS state, abfi_roster_create.status AS
				status, abfi_roster_create.roster_id as roster, COUNT( DISTINCT abfi_roster_create_off.off_reg_id ) AS officials, abfi_tour_create.event_name as event_name
				FROM abfi_roster_create
				INNER JOIN abfi_roster_create_off ON abfi_roster_create.roster_id = abfi_roster_create_off.roster_id INNER JOIN abfi_tour_create ON abfi_roster_create.event_id = abfi_tour_create.sec_event_id where abfi_roster_create.event_id = '$event' and abfi_roster_create.status not in('0') group by state,event,gender order by abfi_roster_create.state desc";
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

	public function update_player($secid,$fullname,$father,$dob,$blood,$height,$weight,$address,$district,$postalcode,$position,$aadhar,$passport,$contact,$emecontact,$email)
	{
		$sql = "update abfi_ply_reg set full_name='$fullname',father_name='$father',dob='$dob',blood_group='$blood',height='$height',weight='$weight',address='$address',district='$district',pin_code='$postalcode',position='$position',adhar_card='$aadhar',passport_num='$passport',contact='$contact',emergency_contct='$emecontact',email='$email' where ply_sec_reg_id='$secid'";
		$data_updtae = $this->extract($sql);
		return $data_updtae;
	}

		public function check_empty_update($fullname,$father,$dob,$blood,$height,$weight,$address,$district,$postalcode,$position,$aadhar,$passport,$contact,$emecontact,$email)
	{
		if(empty($fullname) || empty($father) || empty($dob) || empty($blood) || empty($height) || empty($weight) || empty($address) || empty($district) || empty($postalcode) || empty($position) || empty($aadhar) || empty($passport) || empty($contact) || empty($emecontact) || empty($email))
		{
			return 0;
		}

		else
		{
			return 1;
		}
	}

	public function update_official($secid,$fullname,$father,$dob,$blood,$height,$weight,$address,$district,$postalcode,$aadhar,$passport,$contact,$emecontact,$email)
	{
		$sql = "update abfi_ply_offc set full_name='$fullname',father_name='$father',dob='$dob',blood_group='$blood',height='$height',weight='$weight',address='$address',district='$district',pin_code='$postalcode',adhar_card='$aadhar',passport_num='$passport',contact='$contact',emergency_contct='$emecontact',email='$email' where offc_sec_reg_id='$secid'";
		$data_updtae = $this->extract($sql);
		return $data_updtae;
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

public function create_fevent($one,$two,$three,$four)
	{
		$random = rand(10,100);
		$sec_id = "ABFI-FEVE-" . "$random";
		$sql = "insert into abfi_forth_event (sec_eve_id,event_name,event_date,event_venue,event_org) values ('$sec_id','$one','$two','$three','$four')";
		$insert_data = $this->extract($sql);
		return $insert_data;
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

	public function get_roster_by_event()
	{
		$sql = "SELECT DISTINCT a.event_id as eid, count(DISTINCT a.roster_id) as roster_num, b.event_name as event, b.event_status as status, b.event_type as type, b.event_level as level FROM abfi_roster_create as a INNER JOIN abfi_tour_create as b on a.event_id=b.sec_event_id group by a.event_id";
		$get_roster_event = $this->extract($sql);
		return $get_roster_event;

	}

	public function get_roster_by_event_intn()
	{
		$sql = "SELECT DISTINCT a.event_id as eid, count(DISTINCT a.roster_id) as roster_num, b.event_name as event, b.event_status as status, b.event_type as type, b.event_level as level FROM intn_eve_ply_roster as a INNER JOIN abfi_tour_create as b on a.event_id=b.sec_event_id group by a.event_id";
		$get_roster_event = $this->extract($sql);
		return $get_roster_event;

	}

	public function get_int_roster_by_event()
	{
		$sql = "SELECT DISTINCT a.event_id as eid, count(DISTINCT a.roster_id) as roster_num, b.event_name as event, b.event_status as status, b.event_type as type, b.event_level as level FROM int_roster_ply as a INNER JOIN abfi_tour_create as b on a.event_id=b.sec_event_id group by a.event_id";
		$get_roster_event = $this->extract($sql);
		return $get_roster_event;

	}

	public function export_all_ply()
	{
		$sql = "SELECT a.ply_reg_id as id, a.full_name as name, a.dob as dob, a.father_name as father, a.gender as gender,
		a.blood_group as bg, a.height as height, a.weight as weight, a.address as address, a.pin_code as pin, a.district as district,a.login_state as lstate,
		a.position as position, a.adhar_card as aadhar, a.passport_num as pass, a.contact as contact, a.emergency_contct as econtact,
		a.email as email, b.state_name as state, b.state_abb as code from abfi_ply_reg as a INNER JOIN abfi_states as b on a.login_state = b.state_code where a.status in ('0') order by a.login_state ASC";
		$export_ply = $this->extract($sql);
		return $export_ply;
	}

	public function export_all_offc()
	{
		$sql = "SELECT a.offc_reg_id as id, a.full_name as name, a.dob as dob, a.father_name as father, a.gender as gender,
		a.blood_group as bg, a.height as height, a.weight as weight, a.address as address, a.pin_code as pin, a.district as district,a.login_state as lstate,
		a.position as position, a.designation as designation, a.adhar_card as aadhar, a.passport_num as pass, a.contact as contact, a.emergency_contct as econtact,
		a.email as email, b.state_name as state, b.state_abb as code, c.abfi_offc_type as otype from abfi_ply_offc as a INNER JOIN abfi_states as b ON a.login_state = b.state_code INNER JOIN abfi_offical_code as c ON a.position = c.abfi_offc_code where a.status in ('2') order by a.login_state ASC";
		$export_ply = $this->extract($sql);
		return $export_ply;
	}

	public function get_pending_rosters()
	{
		$sql = "SELECT COUNT( DISTINCT roster_id ) as pending FROM  `abfi_roster_create` WHERE STATUS IN ('1')";
		$pending = $this->extract($sql);
		$row = $pending->fetch_assoc();
		return $row["pending"];
	}

	public function get_pen_roster()
	{
		$sql = "SELECT DISTINCT abfi_roster_create.event_id AS event, COUNT( DISTINCT abfi_roster_create.player_reg_id ) AS players, abfi_roster_create.gender AS gender, abfi_roster_create.state AS state, abfi_roster_create.status AS
				status, abfi_roster_create.roster_id as roster, COUNT( DISTINCT abfi_roster_create_off.off_reg_id ) AS officials, abfi_tour_create.event_name as event_name
				FROM abfi_roster_create
				INNER JOIN abfi_roster_create_off ON abfi_roster_create.roster_id = abfi_roster_create_off.roster_id INNER JOIN abfi_tour_create ON abfi_roster_create.event_id = abfi_tour_create.sec_event_id where abfi_roster_create.status in('1') group by state,event,gender order by abfi_roster_create.state desc";
		$get_roster = $this->extract($sql);
		return $get_roster;
	}

public function get_cer($event,$gender)
	{
		$sql = "SELECT a.player_reg_id as pid, a.event_id as eid, a.state, a.gender, b.ply_reg_id, b.full_name AS name, b.dob AS dob, b.login_state, b.ply_img as image,
				c.event_name AS event, c.event_venue AS venue, c.event_dates AS dates, c.event_organizer as organizer, d.state_name AS state
				FROM abfi_roster_create AS a
				INNER JOIN abfi_ply_reg AS b ON a.player_reg_id = b.ply_reg_id
				INNER JOIN abfi_tour_create AS c ON a.event_id = c.sec_event_id
				INNER JOIN abfi_states AS d ON a.state = d.state_code where a.event_id = '$event' and a.gender = '$gender' and c.event_status='2' and a.status='3' 
				ORDER BY a.state ASC, a.gender ASC, a.player_reg_id ASC";
		$result = $this->extract($sql);
		//and d.state_code not in(103,135)
		return $result;
	}

	public function check_cer($eid,$pid)
	{
		$sql = "SELECT ply_id, eve_id FROM cert_dets where eve_id='$eid' and ply_id ='$pid'";
		$result = $this->extract($sql);
		return $result;
	}

	public function get_cert_id($eid,$pid)
		{
			$sql = "SELECT cert_id,ply_id, eve_id FROM cert_dets where eve_id='$eid' and ply_id ='$pid'";
			$result = $this->extract($sql);
			return $result;
	}

	public function insert_cer($eid,$pid,$name,$count)
	{   $p="ABFIP".date("ym");
		$sql = "INSERT INTO cert_dets (ply_id, ply_name, eve_id, cert_id)
                 VALUES ('$pid', '$name', '$eid', '$p$count')";
		$result = $this->extract($sql);
	}

	public function get_cer_off($event)
	{
		$sql = "SELECT distinct a.off_reg_id as oid, a.event_id as eid, a.state, b.offc_reg_id, b.full_name AS name, b.dob AS dob, b.login_state, b.user_img as image,
				c.event_name AS event, c.event_venue AS venue, c.event_dates AS dates, c.event_organizer as organizer, d.state_name AS state
				FROM abfi_roster_create_off AS a
				INNER JOIN abfi_ply_offc AS b ON a.off_reg_id = b.offc_reg_id
				INNER JOIN abfi_tour_create AS c ON a.event_id = c.sec_event_id
				INNER JOIN abfi_states AS d ON a.state = d.state_code where a.event_id = '$event' and c.event_status='2' and a.status='3'
				ORDER BY a.state ASC, a.off_reg_id ASC";
		$result = $this->extract($sql);
		return $result;
	}

	public function check_cer_off($eid,$oid)
	{
		$sql = "SELECT off_id, eve_id FROM cert_dets_off where eve_id='$eid' and off_id ='$oid'";
		$result = $this->extract($sql);
		return $result;
	}
	
	public function get_cert_id_off($eid,$oid)
	{
		$sql = "SELECT cert_id,off_id, eve_id FROM cert_dets_off where eve_id='$eid' and off_id ='$oid'";
		$result = $this->extract($sql);
		return $result;
	}

	public function insert_cer_off($eid,$oid,$name,$count)
	{	$o="ABFIO".date("ym");
		$sql = "INSERT INTO cert_dets_off (off_id, off_name, eve_id, cert_id)
                 VALUES ('$oid', '$name', '$eid', '$o$count')";
		$result = $this->extract($sql);
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

	public function get_events_all_new()
	{
		$sql = "select * from abfi_tour_create where event_status in('1','2') and event_type='N'";
		$get_event = $this->extract($sql);
		return $get_event;
	}

	public function get_events_all_new_international()
	{
		$sql = "select * from abfi_tour_create where event_status in('1','2') and event_type='IN'";
		$get_event = $this->extract($sql);
		return $get_event;
	}

	public function get_all_country()
	{
		$sql = "select * from intn_country";
		$get_country = $this->extract($sql);
		return $get_country;
	}

	public function get_country_name($code)
	{
		$sql = "select country_name from intn_country where country_id = '$code'";
		$get_country = $this->extract($sql);
		while($row = $get_country->fetch_assoc()) {
        return $row["country_name"];
    }
	}

	public function check_international_player_id($id)
	{
		$sql = "select * from intn_eve_ply_roster where ply_id = '$id'";
		$get_id = $this->extract($sql);
		$row_count = mysqli_num_rows($get_id);
		return $row_count;
	}

	public function check_international_offc_id($id)
	{
		$sql = "select * from intn_eve_off_roster where off_id = '$id'";
		$get_id = $this->extract($sql);
		$row_count = mysqli_num_rows($get_id);
		return $row_count;
	}

	public function insert_player_in_bulk($playerName,$playerHeight,$playerWeight,$playerBloodg,$playerJersey,$playerdob,$playerPosition,$playerPassport,$playerAddress,$playerAssociation,$playerEmail,$playerImage,$country,$gender,$event,$roster_id)
	{	$gen_id = "PLY" . mt_rand(10,1000);
		$check_id = $this->check_international_player_id($gen_id);
		if($check_id > 0)
		{
			$gen_id = "PLY" . mt_rand(10,1000);
		}

		else
		{
			$gen_id = $gen_id;
		}

		$status = 0;
		$sql = "insert into intn_eve_ply_roster (ply_id, ply_country, ply_name, ply_height, ply_weight, ply_bloodg, ply_jersey, ply_dob, ply_position, ply_passport, ply_address, ply_association, ply_email, roster_id, status, event_id, gender, ply_img) values('".$gen_id."', '".$country."', '".$playerName."', '".$playerHeight."', '".$playerWeight."', '".$playerBloodg."', '".$playerJersey."', '".$playerdob."', '".$playerPosition."', '".$playerPassport."', '".$playerAddress."', '".$playerAssociation."', '".$playerEmail."', '".$roster_id."', '".$status."', '".$event."', '".$gender."', '".$playerImage."')";
		$bulkInsert = $this->extract($sql);
		if($bulkInsert)
		{
			return 1;
		}

		else
		{
			return 0;
		}
	}

	public function insert_offc_in_bulk($offcName,$offcHeight,$offcWeight,$offcBloodg,$offcdob,$offcPassport,$offcAddress,$offcPosition,$offcAssociation,$offcEmail,$offcImage,$country,$gender,$event,$roster_id)
	{	$gen_id = "OFFC" . mt_rand(10,1000);
		$check_id = $this->check_international_offc_id($gen_id);
		if($check_id > 0)
		{
			$gen_id = "OFFC" . mt_rand(10,1000);
		}

		else
		{
			$gen_id = $gen_id;
		}

		$status = 0;
		$sql = "insert into intn_eve_off_roster (off_id, off_country, off_name, off_height, off_weight, off_bloodg, off_dob, off_passport, off_address, off_position, off_association, off_email, roster_id, status, event_id, gender, off_img) values('".$gen_id."', '".$country."', '".$offcName."', '".$offcHeight."', '".$offcWeight."', '".$offcBloodg."', '".$offcdob."', '".$offcPassport."', '".$offcAddress."', '".$offcPosition."', '".$offcAssociation."', '".$offcEmail."', '".$roster_id."', '".$status."', '".$event."', '".$gender."', '".$offcImage."')";
		$bulkInsert = $this->extract($sql);
		if($bulkInsert)
		{
			return 1;
		}

		else
		{
			return 0;
		}
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

	public function get_international_roster_event($event)
	{
		$sql = "SELECT DISTINCT a.event_id AS event, COUNT( DISTINCT a.ply_id ) AS players, a.gender AS gender, a.ply_country AS country, a.status AS
				status, a.roster_id as roster, COUNT( DISTINCT b.off_id ) AS officials, c.event_name as event_name
				FROM intn_eve_ply_roster AS a
				INNER JOIN intn_eve_off_roster AS b ON a.roster_id = b.roster_id INNER JOIN abfi_tour_create as c ON a.event_id = c.sec_event_id where a.event_id = '$event' group by event,gender,country";
		$get_roster = $this->extract($sql);
		return $get_roster;
	}

	public function get_event_name($event)
	{
		$sql = "select event_name from abfi_tour_create where sec_event_id = '$event'";
		$event_data = $this->extract($sql);
		$row = $event_data->fetch_assoc();
		return $row["event_name"];
	}

	public function int_event_get_cer($event)
	{
		$sql = "SELECT a.ply_id as pid, a.event_id as eid, a.ply_country, a.gender, a.ply_name AS name, a.ply_dob AS dob, a.ply_img as image,
				c.event_name AS event, c.event_venue AS venue, c.event_dates AS dates, c.event_organizer as organizer, d.country_name AS country
				FROM  intn_eve_ply_roster AS a
				INNER JOIN abfi_tour_create AS c ON a.event_id = c.sec_event_id
				INNER JOIN  intn_country AS d ON a.ply_country = d.country_id where a.event_id = '$event' and c.event_status='2' and a.status='0'
				ORDER BY a.ply_country ASC, a.gender ASC, a.ply_id ASC";
		$result = $this->extract($sql);
		return $result;
	}

	public function int_event_get_cer_off($event)
	{
		$sql = "SELECT distinct a.off_id as oid, a.event_id as eid, a.off_country, a.off_name AS name, a.off_dob AS dob, a.off_img as image,
				c.event_name AS event, c.event_venue AS venue, c.event_dates AS dates, c.event_organizer as organizer, d.country_name AS country
				FROM intn_eve_off_roster AS a
				INNER JOIN abfi_tour_create AS c ON a.event_id = c.sec_event_id
				INNER JOIN intn_country AS d ON a.off_country = d.country_id where a.event_id = '$event' and c.event_status='2' and a.status='0'
				ORDER BY a.off_country ASC, a.off_id ASC";
		$result = $this->extract($sql);
		return $result;
	}

}





?>