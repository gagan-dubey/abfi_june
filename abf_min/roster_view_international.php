<?php require_once('../abfi_all_inc/Classes/include_all_min.php'); ?>
<?php confirm_slogged_in();?>
<?php confirm_session_svalid();?>
<?php 
//$state = base64_decode($_GET["sta"]);
$event =base64_decode($_GET["eve"]);
//$roster =base64_decode($_GET["rid"]);
$event1 =$_GET["eve"];
$roster1 =$_GET["rid"];
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
                           <b> Roster Detail (Players) - INDIA </br> <?php echo $form->get_event_name($event);?></b>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
								<hr>
								<div class='row'>
								<?php 
								$roster =base64_decode($_GET["rid"]);
									$sql1 = "SELECT a.player_reg_id AS reg_id, b.full_name AS name, b.father_name AS father, b.dob AS dob, b.ply_img as image, a.status as status FROM int_roster_ply AS a
											INNER JOIN abfi_ply_reg AS b ON a.player_reg_id = b.ply_reg_id where a.roster_id = '$roster' and a.event_id = '$event'";
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
								echo" <div class='col-md-6'>
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
                           <b> Roster Detail (Officials) - INDIA </br> <?php echo $form->get_event_name($event);?></b>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
						<div class="row">
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
									if($button_status == 0)
										{echo
									"<div class='row'>
									<center><a href='print_one?eve=$event1&rid=$roster1' class='btn btn-success' target='_blank'><i class='fa fa-print fa-fw'></i> PRINT ROSTER</a>
									<a href='print_id?eve=$event1&rid=$roster1' class='btn btn-info' target='_blank'><i class='fa fa-list fa-fw'></i> PRINT ID-CARDS</a>
									<button type='button' class='btn btn-danger' data-toggle='modal' data-target='#myModal'><i class='fa fa-trash fa-fw'></i> DELETE</button></center>
									</div> <hr>";
										}
										
										else
										{
											echo
									"<div class='row'>
									<center><a href='roster_data_tbl' class='btn btn-info'><i class='fa fa-arrow-circle-left fa-fw'></i> Back</a>
									 <hr>";
											
										}
									?>
									<div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
    
                                <!-- Modal content-->
                              <div class="modal-content">
                              <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                       <h4 class="modal-title text-center">Delete Roster</h4>
                                  </div>
                            <div class="modal-body text-center">
							<p><i class="fa fa-exclamation-circle fa-3x"></i></p>
                          <p><b>Are you sure you want to delete this roster?</b></p>
						  <form method="post" action="">
						  <input type="hidden" value="<?php echo $roster;?>" name="del_play"/>
						  
                               </div>
                       <div class="modal-footer">
                    <center>
					<button type="submit" class="btn btn-success" name="reject"><i class="fa fa-check-circle fa-fw"></i> Yes</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times-circle fa-fw"></i> No</button>
					</center>
					</form>
					<?php
					if(isset($_POST['reject']))
					{
						$roster1 = $_POST["del_play"];
						$sql1 = "delete from int_roster_ply WHERE roster_id='$roster1'";
						$delete_player = $form->extract($sql1);
						
						if($delete_player)
						{
						  $sql2 = "delete from int_roster_offc WHERE roster_id='$roster1'";
						  $delete_offc = $form->extract($sql2);
						  if($delete_offc)
						  {
						  echo "<script>alert('Roster Deleted...');</script>";	  
						  header( "refresh:0;url=int_roster_data_tbl" );
						  }
						}
					}
					?>
                         </div>
                         </div>
      
                        </div>
						</div>
			
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
