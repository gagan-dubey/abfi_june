<?php require_once('../abfi_all_inc/Classes/include_all_min.php'); ?>
<?php 
$form = new abfi_use();
?>
 <?php
 $sql101 = "DELETE int_roster_ply FROM int_roster_ply LEFT JOIN int_roster_offc
		ON int_roster_ply.roster_id =int_roster_offc.roster_id WHERE int_roster_offc.roster_id IS NULL";
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
                           <b> International Roster List </b>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Event Name</th>
                                        <th>Roster Count</th>
										<th>Event Status</th>
										<th>Event Type</th>
										<th>Event Level</th>
										<th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
								
						<?php
						$roster = $form->get_int_roster_by_event();
						
						if (mysqli_num_rows($roster) > 0) {
						// output data of each row
						while($row = mysqli_fetch_assoc($roster)) {
						         $a =$row["eid"];
								$a1 =base64_encode($row["eid"]);
								$b = $row["event"];
								$c = $row["roster_num"];
								$d = $form->get_event_status($row["status"]);
								$e = $form->get_event_type($row["type"]);
								$f = $form->get_event_level($row["level"]);
								if($a == null)
								{
									//echo "No results found.";
								}
								
								else{
								echo "	 <tr class='gradeA'>
                                        <td>$b</td>
										<td>$c</td>
										<td>$d</td>
										<td>$e</td>
										<td>$f</td>
                                        <td><a href='int_roster_data_tbl?eve=$a1' class='btn btn-sm btn-primary'><i class='fa fa-eye fa-fw'></i> View Details</a></td>
                                        
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
		$sql3 = "select distinct event_id,gender from int_roster_ply where event_id='$event1' and gender='$gender1'";
		$info = $form->extract($sql3);
		if (mysqli_num_rows($info) > 0) {
			
			while($row = mysqli_fetch_assoc($info)) {
				$a = $row["event_id"];
				$b = $row["gender"];
			}	
		}
		
		if($a == $event1 && $b == $gender1)
		{
			echo "<script> alert('Event already exists..'); </script>";
			header("refresh:0;url=int_roster_data");
		}
		
		else
		{
			header("refresh:0;url=create_roster?eve=$event&gen=$gender&lev=$level");
		}
		
	}
}

?>

