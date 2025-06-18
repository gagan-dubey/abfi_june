<?php require_once('../abfi_all_inc/Classes/include_all_min.php'); ?>
<?php confirm_logged_in();?>
<?php confirm_session_valid();?>
<?php 
$form = new abfi_use();
$state = $_SESSION["state"];
 ?>
 <?php
 $sql101 = "DELETE abfi_roster_create FROM abfi_roster_create LEFT JOIN abfi_roster_create_off
		ON abfi_roster_create.roster_id =abfi_roster_create_off.roster_id WHERE abfi_roster_create_off.roster_id IS NULL";
		$result101 = $form->extract($sql101);
		if($result101)
		{
			
		}
		else
		{
			header("refresh:0;url=index");
		}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
   
<title>Home | ABFI Admin</title>
<?php include('adm_includes/header.php');?>
<style>
	#edu_one,#gender
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
                           <b> Create Roster - <?php echo $form->get_state_name($state);?></b>
                        </div>
                        <!-- /.panel-heading -->
						<form method="post" action="">
                        <div class="panel-body">
						<div class="col-md-6 col-sm-offset-3">
		                                   <div class="form-group">
                                             <select name="event" class="form-control" id="event" required>
											 <option disabled="" selected="">--Select Event--</option>
                                                
														<?php
                                                           $all_events = $form->get_events_all();
														if (mysqli_num_rows($all_events) > 0) {
														// output data of each row
														while($row = mysqli_fetch_assoc($all_events)) {
															$event_name = $row["sec_event_id"];
															$event_code = $row["event_name"];
															$event_level = $row["event_level"];
															echo"<option value='$event_name'> $event_code </option>";
														}
													} else {
														//echo "0 results";
													}														   
														?>

                                            </select>
											<input type="hidden" name="level" value="<?php echo $event_level;?>">
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

            <!-- /.row -->
           <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                           <b> Roster List - <?php echo $form->get_state_name($state);?></b>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Event Name</th>
                                        <th>Gender</th>
										<th>Players</th>
										<th>Officials</th>
										<th>Status</th>
										<th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
								
						<?php
						$roster = $form->get_state_roster($state);
						
						if (mysqli_num_rows($roster) > 0) {
						// output data of each row
						while($row = mysqli_fetch_assoc($roster)) {
						        $a =$row["event_name"];
								$a1 =base64_encode($row["event"]);
								$b =$row["players"];
								$d =$row["officials"];
								$c =$form->get_gender($row["gender"]);	
								$e =$row["status"];
								$e1 =$form->get_roster_status($row["status"]);
								$f =base64_encode($row["state"]);
								$g =base64_encode($row["roster"]);
								if($b==0 || $a == null)
								{
									//echo "No results found.";
								}
								
								else{
								echo "	 <tr class='gradeA'>
                                        <td>$a</td>
										<td>$c</td>
                                        <td>$b</td>
										<td>$d</td>
										<td>$e1</td>
                                        <td><a href='roster_view?eve=$a1&rid=$g' class='btn btn-sm btn-primary'><i class='fa fa-eye fa-fw'></i> View Details</a></td>
                                        
                                    </tr>";
						}}
						} else {
						//echo "0 results";
								}
						?>
                                   
                             
                                </tbody>
                            </table>
                           
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->

				
            </div>
            <!-- /.row -->
           
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
	$event1 = $_POST["event"];
	$gender1 = $_POST["gender"];
	
	if(empty($gender) || empty($event))
	{
		echo "<script> alert('Missing Fields'); </script>";
	    header("refresh:0;url=roster_data_tbl");
	}
	
	else
	{
		$sql3 = "select distinct event_id,gender,state from abfi_roster_create where event_id='$event1' and gender='$gender1' and state='$state'";
		$info = $form->extract($sql3);
		if (mysqli_num_rows($info) > 0) {
			
			while($row = mysqli_fetch_assoc($info)) {
				$a = $row["event_id"];
				$b = $row["gender"];
				$c = $row["state"];
			}	
		}
		
		if($a == $event1 && $b == $gender1 && $c == $state)
		{
			echo "<script> alert('Event already exists..'); </script>";
			header("refresh:0;url=roster_data_tbl");
		}
		
		else
		{
			header("refresh:0;url=create_roster?eve=$event&gen=$gender&lev=$level");
		}
		
	}
}

?>

