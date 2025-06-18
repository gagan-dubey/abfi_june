<?php require_once('../abfi_all_inc/Classes/include_all_min.php'); ?>
<?php confirm_slogged_in();?>
<?php confirm_session_svalid();?>
<?php 
$state = base64_decode($_GET["sta"]);
$event =base64_decode($_GET["eve"]);
$gender = $_GET["gen"];
$event1 = $_GET["eve"];
$roster1 = $_GET["rid"];
$state1 = $_GET["sta"];
$form = new abfi_use();
?>
<!DOCTYPE html>
<html lang="en">

<head>
   
<title>Home | ABFI Admin</title>
<?php include('adm_includes/header.php');?>
 <style>
 label{margin-top:7px; color:#757575;}
 
 </style>
 
</head>

<body>

    <div id="wrapper">

       <?php include('adm_includes/nav.php');?>

        <div id="page-wrapper">

            <!-- /.row -->
           <div class="row"></br>
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">
                           <b> Roster Detail (Players) - <?php echo $form->get_state_name($state);?> </br> <?php echo $form->get_event_name($event);?></b>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
								<hr>
								<div class='row'>
								<?php 
								$roster =base64_decode($_GET["rid"]);
									$sql1 = "SELECT a.player_reg_id AS reg_id, b.full_name AS name, b.status as actv, b.father_name AS father, b.dob AS dob, b.ply_img as image, a.status as status FROM abfi_roster_create AS a
											INNER JOIN abfi_ply_reg AS b ON a.player_reg_id = b.ply_reg_id where b.status = '0' and a.roster_id = '$roster' and a.event_id = '$event' and a.state='$state'";
									$result1 = $form->extract($sql1);
										if (mysqli_num_rows($result1) > 0) {
						// output data of each row
						while($row = mysqli_fetch_assoc($result1)) {
						        $a =$row["reg_id"];
								$a1 = base64_encode($row["reg_id"]);
								$b =$row["name"];
								$c =$row["father"];
						        $d =$row["dob"]; 
								$e =$row["image"];
								$button_status =$row["status"];
								echo" <div class='col-md-6'>
									<div class='col-md-4'>
									<center><img src='../abf_use/off_reg_imgs/$e' class='img-rounded' width='130' height='130'></center>
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
											<div class='col-md-9'><label>$c</label></div>
											</div>
											
											<div class='row'>
											<div class='col-md-3'><label>D.O.B.</label></div>
											<div class='col-md-8'><label>$d</label></div>
											</div>
											<hr>
											<div class='row'>
											<div class='col-md-3'></div>
											<div class='col-md-8'><a href='edit_roster_ply?eve=$event1&rid=$roster1&sta=$state1&gen=$gender&ply=$a1' class='btn btn-danger'><i class='fa fa-edit fa-fw'></i> Edit Details</a>
											</div></div>
									<hr>
									</div>
									</div>"; 
						
						}
						} else {
						echo "0 results";
								}
									?>
						</div><hr>			
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
				
				
				
				
				                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">
                           <b> Roster Detail (Officials) - <?php echo $form->get_state_name($state);?> </br> <?php echo $form->get_event_name($event);?></b>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
						<div class="row">
                                    <?php 
									$sql1 = "SELECT a.off_reg_id AS reg_id, b.full_name AS name, b.father_name AS father, b.dob AS dob, b.user_img as image, a.status as status FROM abfi_roster_create_off AS a
											INNER JOIN abfi_ply_offc AS b ON a.off_reg_id = b.offc_reg_id where a.roster_id = '$roster' and a.event_id = '$event' and a.state='$state'";
									$result1 = $form->extract($sql1);
										if (mysqli_num_rows($result1) > 0) {
						// output data of each row
						while($row = mysqli_fetch_assoc($result1)) {
						        $a =$row["reg_id"];
								$a1 = base64_encode($row["reg_id"]);
								$b =$row["name"];
								$c =$row["father"];
						        $d =$row["dob"]; 
								$e =$row["image"];
								echo "<div class='col-md-6'>
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
											<div class='col-md-9'><label>$c</label></div>
											</div>
											
											<div class='row'>
											<div class='col-md-3'><label>D.O.B.</label></div>
											<div class='col-md-8'><label>$d</label></div>
											</div>
											<hr>
											<div class='row'>
											<div class='col-md-3'></div>
											<div class='col-md-8'><a href='edit_roster_offc?eve=$event1&rid=$roster1&sta=$state1&gen=$gender&offc=$a1' class='btn btn-danger'><i class='fa fa-edit fa-fw'></i> Edit Details</a>
											</div></div>
									<hr>
									</div>
									</div>";
								
						}
						} else {
						echo "0 results";
								}
									?>
									
									
							
									</div></br>

									
									
					
                        <!-- /.panel-body -->
                    </div>
					
                    <!-- /.panel -->
                </div>
				
													
                                    <?php
									if($button_status == 1)
										{echo
									"<div class='row'>
									<center><button type='button' class='btn btn-success' data-toggle='modal' data-target='#myModal1' ><i class='fa fa-check-square-o fa-fw'></i> APPROVE</button>
									<button type='button' class='btn btn-danger' data-toggle='modal' data-target='#myModal'><i class='fa fa-times-circle-o fa-fw'></i> REJECT</button></center>
									</div> <hr>";
										}
										
										else
										{
											echo
									"<div class='row'>
									<center>
									<a href='roster_data_tbl' class='btn btn-info'><i class='fa fa-arrow-circle-left fa-fw'></i> Back</a>
									<a href='print_one_new?eve=$event1&rid=$roster1&sta=$state1' class='btn btn-success' target='_blank'><i class='fa fa-print fa-fw'></i> Print Roster</a>
			
									</center>
									</div>
									 <hr>";
											
										}
									?>
			
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

	 <?php include('adm_includes/footer.php');?>
   

</body>

</html>
