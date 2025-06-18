<?php require_once('../abfi_all_inc/Classes/include_all_min.php'); ?>
<?php confirm_slogged_in();?>
<?php confirm_session_svalid();?>
<?php 
//$state = base64_decode($_GET["sta"]);
$event =base64_decode($_GET["eve"]);
$roster =base64_decode($_GET["rid"]);
$event1 =$_GET["eve"];
$roster1 =$_GET["rid"];
$form = new abfi_use();
$sql_dates = "select event_dates,event_venue from abfi_tour_create where sec_event_id = '$event'";
$result_dates = $form->extract($sql_dates);
$row_dates = $result_dates->fetch_assoc();
$edates = $row_dates["event_dates"];
$evenue = $row_dates["event_venue"];

$sql_gender = "select distinct gender from int_roster_ply where roster_id = '$roster'";
$result_gender = $form->extract($sql_gender);
$row_gender = $result_gender->fetch_assoc();
$egender = $row_gender["gender"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
   
<title>ABFI | Roster Form | INDIA | Officials</title>
 <link href="css/bootstrap.min.css" rel="stylesheet" >
 <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" >
 
</head>
<style>
label
{
font-size:16px;
color:black;
}
</style>
<body>

    <div class="container">

        <div>
		<div style="padding-top:10px; padding-bottom:10px;" align="right" id="one">
		<button class='print'><i class="fa fa-print fa-fw"></i> Print</button>
		</div>
            <!-- /.row -->
           <div class="row">
                <div class="col-lg-12" style="margin-left:-100px;" id="page">
                    <div class="panel panel-default" style="border:none;">
                        <div class="panel-heading text-center">
                          <img src="reg_images/logo.png" class="img-circle" alt="ABFI-LOGO"  width="70" height="70"> <b style="font-size:26px; line-height:22px;"> Amateur Baseball Federation of India </b></br><b style="font-size:20px;"><?php echo $form->get_event_name($event);?></b></br> <b style="font-size:20px;">Dated - <?php echo $edates;?> At <?php echo $evenue;?></b></br><b style="font-size:20px;">Roster - <?php echo $form->get_gender($egender);?></b>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
								
								<div class='row'>
								<?php 
									$sql1 = "SELECT a.off_reg_id AS reg_id, b.full_name AS name, b.father_name AS father, b.dob AS dob, b.user_img as image, a.status as status FROM int_roster_offc AS a
											INNER JOIN abfi_ply_offc AS b ON a.off_reg_id = b.offc_reg_id where a.roster_id = '$roster' and a.event_id = '$event'";
									
									$result1 = $form->extract($sql1);
										if (mysqli_num_rows($result1) > 0) {
						// output data of each row
						while($row = mysqli_fetch_assoc($result1)) {
						        $a =$row["reg_id"];
								$b =$row["name"];
								$c =$row["father"];
						        $d =$row["dob"]; 
								$e =$row["image"];
								$button_status =$row["status"];
								echo" <div class='col-md-6' style='padding-top:20px;'>
									<div class='col-md-4'>
									<center><img src='../abf_use/off_reg_imgs/$e' class='img-rounded'  width='130' height='130'></center>
									</div>
									<div class='col-md-8'>
											<div class='row'>
											<div class='col-md-3'><label>Reg. ID</label></div>
											<div class='col-md-8'><label>$a</label></div>
											</div>
											<div class='row'>
											<div class='col-md-3'><label>Name</label></div>
											<div class='col-md-9'><label>$b</label></div>
											</div>
											
											<div class='row'>
											<div class='col-md-3'><label>Father</label></div>
											<div class='col-md-8'><label>$c</label></div>
											</div>
											
											<div class='row'>
											<div class='col-md-3'><label>D.O.B.</label></div>
											<div class='col-md-8'><label>$d</label></div>
											</div>
											
											<div class='row'>
											<div class='col-md-3'><label>Signature</label></div>
											<div class='col-md-8'><label></label></div>
											</div>
									
									</div>
									</div>"; 
						
						}
						} else {
						echo "0 results click next to view and print next page details.";
								}
									?>
						</div><hr>			
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
				
				
				
													
                                    <?php
									echo
									"<div class='row' id='two'>
									<center><a href='print_one?eve=$event1&rid=$roster1' class='btn btn-primary'><i class='fa fa-arrow-circle-left fa-fw'></i> Back</a>
									<a href='print_four?eve=$event1&rid=$roster1' class='btn btn-primary disabled'> Next <i class='fa fa-arrow-circle-right fa-fw'></i></a>
									</div> <hr>";
										
									?>
									
			
			
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

	 <?php include('adm_includes/footer.php');?>
	  <script src="js/jquery.js"></script>
	  <script src="js/html2canvas.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
	 <script>
	
	$('.print').on('click', function(){		
		html2canvas(document.body, {
	        onrendered: function(canvas) {
	        	
	        	$("#page").hide();
				$("#one").hide();
	            document.body.appendChild(canvas);
	            window.print();
	            $('canvas').remove();
	            $("#page").show();
				$("#one").show();
	        }
	    });
	    
	});
	
	</script>
   

</body>

</html>
