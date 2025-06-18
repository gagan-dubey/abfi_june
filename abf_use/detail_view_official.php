<?php require_once('../abfi_all_inc/Classes/include_all_min.php'); ?>
<?php confirm_logged_in();?>
<?php confirm_session_valid();?>
<?php 
$single_offc_dets = new abfi_admin();
$sec_id = base64_decode($_GET['secid']);
$offc_dets = $single_offc_dets->single_offc_dets($sec_id);
if (mysqli_num_rows($offc_dets) == 1) {
						// output data of each row
						while($row = mysqli_fetch_assoc($offc_dets)) {
						        $a =$row["offc_reg_id"];
								$b =$row["full_name"];
								$c =$row["father_name"];
								$d =$row["dob"];
								$e =$single_offc_dets->get_gender($row["gender"]);
								$f =$row["blood_group"];
								$g =$row["height"];
								$h =$row["weight"];
								$i =$row["address"];
								$j =$row["pin_code"];
								$k =$row["district"];
								$l =$row["state"];
								$m =$row["position"];
								$n =$row["adhar_card"];
								$o =$row["passport_num"];
								$p =$row["contact"];
								$p1 =$row["emergency_contct"];
								$q =$row["email"];
								$image = $row["user_img"];
								$mrg_status = $row["marital_status"];
								$mrg_date = $row["mrg_date"];
								$s =base64_encode($row["offc_sec_reg_id"]);
								
						}
						} 
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
           <div class="row">
		   
		    <div class="col-lg-12">
                    <hr>
                </div>
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">
                           <b> Official ID - <?php echo $a;?></b>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

									<div class="row">
									<div class="col-md-12">
									<div class="row">
									<div class="col-md-2"><label></label></div>
									<div class="col-md-8">
									<center><img src="../abf_use/off_reg_imgs/<?php echo $image;?>" class="img-thumbnail" alt="Cinque Terre" width="150" height="150"></center>
									</div></div></br></div></div>
									<div class="row">
									<div class="col-md-12">
											<div class="row">
											<div class="col-md-2"><label>Name</label></div>
											<div class="col-md-8"><input class="form-control" value="<?php echo "$b";?>" readonly></div>
											</div></br>
											
											<div class="row">
											<div class="col-md-2"><label>Father Name</label></div>
											<div class="col-md-8"><input class="form-control" value="<?php echo "$c";?>" readonly></div>
											</div></br>
											
											<div class="row">
											<div class="col-md-2"><label>D.O.B.</label></div>
											<div class="col-md-8"><input class="form-control" value="<?php echo "$d";?>" readonly></div>
											</div>
									<hr>
									</div>
									</div>
									
									<div class="row">
									<div class="col-md-12">
									<div class="row">
									<div class="col-md-2"><label>Gender</label></div>
									<div class="col-md-8"><input class="form-control" value="<?php echo "$e";?>" readonly></div>
									</div></br>
									
									<div class="row">
									<div class="col-lg-2"><label>Blood Group</label></div>
									<div class="col-lg-8"><input class="form-control" value="<?php echo "$f";?>" readonly></div>
									</div></br>
									
									<div class="row">
									<div class="col-md-2"><label>Height</label></div>
									<div class="col-md-8"><input class="form-control" value="<?php echo "$g";?>" readonly></div>
									</div></br>
									
									<div class="row">
									<div class="col-md-2"><label>Weight</label></div>
									<div class="col-md-8"><input class="form-control" value="<?php echo "$h";?>" readonly></div>
									</div>
									</div></div><hr><!-- /box 1 --> <!-- /box 2 -->
									
									
									
									<div class="row">
									<div class="col-md-12">
									<div class="row">
									<div class="col-md-2"><label>Address</label></div>
									<div class="col-md-8"><textarea class="form-control" rows="6" style="resize: none;" readonly><?php echo "$i";?></textarea></div>
									</div></br>
									
											<div class="row">
											<div class="col-md-2"><label>District</label></div>
											<div class="col-md-8"><input class="form-control" value="<?php echo "$k";?>" readonly></div>
											</div></br>
											
											<div class="row">
											<div class="col-md-2"><label>State</label></div>
											<div class="col-md-8"><input class="form-control" value="<?php echo $single_offc_dets->get_state_name($l);?>" readonly></div>
											</div></br>
											
											<div class="row">
											<div class="col-md-2"><label>Post code</label></div>
											<div class="col-md-8"><input class="form-control" value="<?php echo "$j";?>" readonly></div>
											</div>
									
								
									</div></div><hr><!-- /box 3 -->
									
									
									
									<div class="row">
									<div class="col-md-12">								
									<div class="row">
									<div class="col-md-2"><label>Position</label></div>
									<div class="col-md-8"><input class="form-control" value="<?php echo $single_offc_dets->get_offc_name($m);?>" readonly></div>
									</div></br>
									
									<div class="row">
									<div class="col-md-2"><label>Aadhar</label></div>
									<div class="col-md-8"><input class="form-control" value="<?php echo "$n";?>" readonly></div>
									</div></br>
									
									<div class="row">
									<div class="col-lg-2"><label>Passport</label></div>
									<div class="col-lg-8"><input class="form-control" value="<?php echo "$o";?>" readonly></div>
									</div>

									</div></div><hr><!-- /box 4 -->

									<div class="row">
									<div class="col-md-12">
									<div class="row">
									<div class="col-md-2"><label>Marital Status</label></div>
									<div class="col-md-8"><input class="form-control" value="<?php echo "$mrg_status";?>" readonly></div>
									</div></br>
									
									<div class="row">
									<div class="col-lg-2"><label>Marriage Date</label></div>
									<div class="col-lg-8"><input class="form-control" value="<?php echo "$mrg_date";?>" readonly></div>
									</div>
									</div>
									</div><hr><!-- /box 4 -->
									
									<div class="row">
									<div class="col-md-12">
									<div class="row">
									<div class="col-md-2"><label>Contact</label></div>
									<div class="col-md-8"><input class="form-control" value="<?php echo "$p";?>" readonly ></div>
									</div></br>
									
									<div class="row">
									<div class="col-lg-2"><label class="text-center">Emergency Contact</label></div>
									<div class="col-lg-8"><input class="form-control" value="<?php echo "$p1";?>" readonly ></div>
									</div>
									</br>
									
									<div class="row">
									<div class="col-md-2"><label>Email</label></div>
									<div class="col-md-8"><input class="form-control" value="<?php echo "$q";?>" readonly ></div>
									</div>
									</div></div><hr>
									
									
									
									 <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
    
                                <!-- Modal content-->
                              <div class="modal-content">
                              <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                       <h4 class="modal-title text-center">Delete Official</h4>
                                  </div>
                            <div class="modal-body text-center">
							<p><i class="fa fa-exclamation-circle fa-3x"></i></p>
                          <p><b>Are you sure you want to delete this official?</b></p>
						  <form method="post" action="">
						  <input type="hidden" value="<?php echo $s;?>" name="del_play"/>
						  
                               </div>
                       <div class="modal-footer">
                    <center>
					<button type="submit" class="btn btn-success" name="delete"><i class="fa fa-check-circle fa-fw"></i> Yes</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times-circle fa-fw"></i> No</button>
					</center>
					</form>
					<?php
					if(isset($_POST['delete']))
					{
						$del = base64_decode($_POST['del_play']);
						$delete_player = $single_offc_dets->delete_official($del);
						echo "$delete_player";
						if($delete_player)
						{
						  header( "refresh:0;url=all_official_data_tbl" );
						}
					}
					?>
                         </div>
                         </div>
      
                        </div>
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
   

</body>

</html>
