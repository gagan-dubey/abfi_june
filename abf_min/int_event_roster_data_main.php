<?php require_once('../abfi_all_inc/Classes/include_all_min.php'); ?>
<?php 
$form = new abfi_use();
?>
 <?php
 $sql101 = "DELETE intn_eve_ply_roster FROM intn_eve_ply_roster LEFT JOIN  intn_eve_off_roster
		ON intn_eve_ply_roster.roster_id =intn_eve_off_roster.roster_id WHERE intn_eve_off_roster.roster_id IS NULL";
		$result101 = $form->extract($sql101);
		if($result101)
		{
			
		}
		else
		{
			header("refresh:0;url=int_event_home");
		}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
   
<title>Home | ABFI Admin</title>
<?php include('adm_includes/header.php');?>
<style>
	#edu_one,#gender,#country
	{
      display:none;    	
	}
	
	</style>
 
</head>

<body>

    <div id="wrapper">

       <?php include('adm_includes/nav.php');?>

        <div id="page-wrapper">
 </br>	

<div class="row">
                            <div class="col-md-12">
		                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                           <b> Create International Roster</b>
                        </div>
                        <!-- /.panel-heading -->
						<form method="post" action="">
                        <div class="panel-body">
						<div class="col-md-6 col-sm-offset-3">
		                                   <div class="form-group">
                                             <select name="event" class="form-control" id="event" required>
											 <option disabled="" selected="">--Select Event--</option>
                                                
														<?php
                                                           $all_events = $form->get_events_all_international();
														if (mysqli_num_rows($all_events) > 0) {
														// output data of each row
														while($row = mysqli_fetch_assoc($all_events)) {
															$event_name = $row["sec_event_id"];
															$event_code = $row["event_name"];
															$event_level = $row["event_level"];
															echo"<option value='$event_name'> $event_code </option>";
														}
													} else {
														echo "0 results";
													}														   
														?>

                                            </select>
												<input type="hidden" name="level" value="<?php if(isset($event_level)){echo $event_level;} else{echo null;};?>">
                                          </div>
										   </div>
										   
										    <div class="col-md-6 col-sm-offset-3">
		                                   <div class="form-group">
                                             <select name="country" class="form-control" id="country" required>
											 <option disabled="" selected="">--Select Country--</option>
                                             <?php
                                                           $all_events = $form->get_all_country();
														if (mysqli_num_rows($all_events) > 0) {
														// output data of each row
														while($row = mysqli_fetch_assoc($all_events)) {
															$c_name = $row["country_name"];
															$c_code = $row["country_id"];
															echo"<option value='$c_code'> $c_name </option>";
														}
													} else {
														echo "0 results";
													}														   
														?>
                                            </select>
                                          </div>
										   </div>
										   
										   <div class="col-md-6 col-sm-offset-3">
		                                   <div class="form-group">
                                             <select name="gender" class="form-control" id="gender" required>
											 <option disabled="" selected="">--Select Gender--</option>
                                             <option value="M">Male</option>
											 <option value="F">Female</option>
                                            </select>
                                          </div>
										   </div>
										   
										   
										   
		<div class="col-md-8 col-sm-offset-2" id="edu_one">
		<hr/>
		<center>
		<button type="submit" class="btn btn-primary" name="create"><i class="fa fa-plus-square fa-fw"></i> Create Roster</button>
		</center>
		  </div>
		</div>
		</form>
		</div></div></div></br> 

           
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

	 <?php include('adm_includes/footer.php');?>
	  <script type="text/javascript">
    $(function () {
        $("#event").change(function () {
            var selectedText = $(this).find("option:selected").text();
            var selectedValue = $(this).val();
			
			if(selectedValue == '')
			{ 
		
			$("#edu_one").hide();
			$("#country").hide();
			$("#gender").hide();
		
			}
	
			else 
			{
		
			$("#country").show();
			
			}
        });
    });
	
	
</script>

<script type="text/javascript">
    $(function () {
        $("#country").change(function () {
            var selectedText = $(this).find("option:selected").text();
            var selectedValue = $(this).val();
			
			if(selectedValue == '')
			{ 
		
			$("#edu_one").hide();
			$("#gender").hide();
		
			}
	
			else 
			{
		
			$("#gender").show();
			
			}
        });
    });
	
	
</script>
   
   <script type="text/javascript">
    $(function () {
        $("#gender").change(function () {
            var selectedText = $(this).find("option:selected").text();
            var selectedValue = $(this).val();
			
			if(selectedValue == '')
			{ 
		
			$("#edu_one").hide();
			
		
			}
	
			else 
			{
		
			$("#edu_one").show();
			
			}
        });
    });
	
	
</script>



</body>

</html>
<?php

if(isset($_POST["create"]))
{
	$gender = base64_encode($_POST["gender"]);
	$event = base64_encode($_POST["event"]);
	$level = base64_encode($_POST["level"]);
	$country = base64_encode($_POST["country"]);
	$event1 = $_POST["event"];
	$gender1 = $_POST["gender"];
	$country1 = $_POST["country"];
	
	if(empty($gender) || empty($event) || empty($country))
	{
		echo "<script> alert('Missing Fields'); </script>";
	    header("refresh:0;url=roster_data_tbl");
	}
	
	else
	{
		$sql3 = "select distinct event_id,gender,ply_country from  intn_eve_ply_roster where event_id='$event1' and gender='$gender1' and ply_country='$country1'";
		//echo $sql3;
		$info = $form->extract($sql3);
		echo mysqli_num_rows($info);
		if (mysqli_num_rows($info) > 0) {
			
			while($row = mysqli_fetch_assoc($info)) {
				$a = $row["event_id"];
				$b = $row["gender"];
				$c = $row["ply_country"];
			}	
		
		
		if($a == $event1 && $b == $gender1 && $c == $country1)
		{
			echo "<script> alert('Event already exists..'); </script>";
			header("refresh:0;url=int_event_roster_data_main");
		}
		
		else
		{
			header("refresh:0;url=int_event_create_roster?eve=$event&gen=$gender&lev=$level&cou=$country");
		}
		
	}
	
	else
		{
			header("refresh:0;url=int_event_create_roster?eve=$event&gen=$gender&lev=$level&cou=$country");
		}
		
	}
}

?>

