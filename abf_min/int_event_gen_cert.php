<?php require_once('../abfi_all_inc/Classes/include_all_min.php'); ?>
<?php confirm_slogged_in();?>
<?php confirm_session_svalid();?>
<?php 
$form = new abfi_admin();
//$state = 109;
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
   
<title>Home | ABFI Admin</title>
<?php include('adm_includes/header.php');?>

<style>
	#edu_one,#etype,#edu_two
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

            <!-- /.row -->
           <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                           <b> Generate Certificates</b>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body text-center">
						<form method="POST" action="">
						<div class="col-md-6 col-sm-offset-3">
		                                   <div class="form-group">
                                             <select name="event" class="form-control" id="event" required>
											 <option disabled="" selected="">--Select Event--</option>
                                                
														<?php
                                                           $all_events = $form->get_events_all_new_international();
														if (mysqli_num_rows($all_events) > 0) {
														// output data of each row
														while($row = mysqli_fetch_assoc($all_events)) {
															$event_name = $row["sec_event_id"];
															$event_code = $row["event_name"];
															
															echo"<option value='$event_name'> $event_code </option>";
														}
													} else {
														//echo "0 results";
													}														   
														?>

                                            </select>
											
                                          </div>
										   </div>
										   <div class="col-md-6 col-sm-offset-3">
		                                   <div class="form-group">
                                             <select name="etype" class="form-control" id="etype" required>
											 <option disabled="" selected="">--Select Type--</option>
                                             <option value="P">Players</option>
											 <option value="O">Officials</option>
                                            </select>
                                          </div>
										   </div>
                          <p><button type="submit" class="btn btn-success" name="ply" id="edu_one"><i class="fa fa-download fa-fw"></i> Click Here To Generate And Download Players Certificates</button></p> 
                          <p><button type="submit" class="btn btn-info" name="off" id="edu_two"><i class="fa fa-download fa-fw"></i> Click Here To Generate And Download Officials Certificates</button></p> 
                        </div>
						</form>
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
			$("#edu_two").hide();
			$("#etype").hide();
		
			}
	
			else 
			{
		
			$("#etype").show();
			
			}
        });
    });
	
	
</script>
   
   <script type="text/javascript">
    $(function () {
        $("#etype").change(function () {
            var selectedText = $(this).find("option:selected").text();
            var selectedValue = $(this).val();
			
			if(selectedValue == '')
			{ 
		
			$("#edu_one").hide();
			$("#edu_two").hide();
		
			}
	
			else if (selectedValue == 'P') 
			{
		
			$("#edu_one").show();
			$("#edu_two").hide();
			
			}
			
			else if (selectedValue == 'O')
				
			{
		
			$("#edu_two").show();
			$("#edu_one").hide();
			
			}
        });
    });
	
	
</script>
   

</body>

</html>

<?php

if(isset($_POST["ply"]))
{
	$etype = base64_encode($_POST["etype"]);
	$event = base64_encode($_POST["event"]);
	$event1 = $_POST["event"];
	$etype1 = $_POST["etype"];
	
	if(empty($etype) || empty($event))
	{
		echo "<script> alert('Missing Fields'); </script>";
	    header("refresh:0;url=int_event_gen_cert");
	}
	
	
		else
		{
			if($etype1 == 'P')
			{
			header("refresh:0;url=int_event_gen_cer/index?eve=$event");
			}
			
			else
			
			{
			 header("refresh:0;url=int_event_gen_cert");
			}
		}
		
	}


?>

<?php

if(isset($_POST["off"]))
{
	$etype = base64_encode($_POST["etype"]);
	$event = base64_encode($_POST["event"]);
	$event1 = $_POST["event"];
	$etype1 = $_POST["etype"];
	
	if(empty($etype) || empty($event))
	{
		echo "<script> alert('Missing Fields'); </script>";
	    header("refresh:0;url=int_event_gen_cert");
	}
	
	
		else
		{
			if($etype1 == 'O')
			{
			header("refresh:0;url=int_event_gen_cer_offc/index?eve=$event");
			}
			
			else
			
			{
			 header("refresh:0;url=int_event_gen_cert");
			}
		}
		
	}


?>

