<?php require_once('../abfi_all_inc/Classes/include_all_min.php'); ?>
<?php confirm_logged_in();?>
<?php confirm_session_valid();?>
<?php 

$single_ply_dets = new abfi_admin();
$sec_id = base64_decode($_GET['secid']);
$ply_dets = $single_ply_dets->single_player_dets($sec_id);
if (mysqli_num_rows($ply_dets) == 1) {
						// output data of each row
						while($row = mysqli_fetch_assoc($ply_dets)) {
						        $a =$row["ply_reg_id"];
								$b =$row["full_name"];
								$c =$row["father_name"];
								$d =$row["dob"];
								$e =$single_ply_dets->get_gender($row["gender"]);
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
								$r =base64_encode($row["ply_sec_reg_id"]);
								$image = $row["ply_img"];
								
						}
						} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
   
<title>Home | ABFI Admin</title>
<?php include('adm_includes/header.php');?>
<link href="css/imagestyle.css" rel="stylesheet">
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
                           <b> Player ID - <?php echo "$a";?></b>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                     <form method="post" action="">
									<div class="row">
									<div class="col-md-2"><label>Edit Image</label></div>
									<div class="col-md-8">
									<div class="thumbnail" style="margin-left:0px;">
										<div class="caption">
										<h4><?php echo "$a"; ?></h4>
                    <p>Edit Your Profile Picture</p>
                    <p><button style="width:30px; height:25px;" type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal"><i class="fa fa-image fa-fw"></i></button>
                     </p>
				                    </div>
                              <img src="../abf_use/off_reg_imgs/<?php echo $image;?>" alt="Player-Image" width="150" height="150"/>
                                         </div>
									</div>
									
	
									<div class="col-md-12">
											<div class="row">
											<div class="col-md-2"><label>Name</label></div>
											<div class="col-md-8"><input class="form-control" name="fullname" value="<?php echo "$b";?>" required></div>
											</div></br>
											
											<div class="row">
											<div class="col-md-2"><label>Father Name</label></div>
											<div class="col-md-8"><input class="form-control" name="father" value="<?php echo "$c";?>" required></div>
											</div></br>
											
											<div class="row">
											<div class="col-md-2"><label>D.O.B.</label></div>
											<div class="col-md-8"><input class="form-control" name="dob" placeholder="dd/mm/yyyy" value="<?php echo "$d";?>" required></div>
											</div>
									<hr>
									</div>
									</div>
									
									<div class="row">
									<div class="col-md-12">
									<div class="row">
									<div class="col-md-2"><label>Gender</label></div>
									<div class="col-md-8"><input class="form-control" value="<?php echo "$e";?>" readonly ></div>
									</div></br>
									
									<div class="row">
									<div class="col-md-2"><label>Blood Group</label></div>
									<div class="col-md-8"><input class="form-control" name="blood" value="<?php echo "$f";?>" required></div>
									</div></br>

									
									<div class="row">
									<div class="col-md-2"><label>Height</label></div>
									<div class="col-md-8"><input class="form-control" name="height" value="<?php echo "$g";?>" required></div>
									</div></br>
									
									<div class="row">
									<div class="col-md-2"><label>Weight</label></div>
									<div class="col-md-8"><input class="form-control" name="weight" value="<?php echo "$h";?>" required></div>
									</div></div>
									</div><hr><!-- /box 1 --> <!-- /box 2 -->
									
									
									
									<div class="row">
									
									<div class="col-md-12">
									<div class="row">
									<div class="col-md-2"><label>Address</label></div>
									<div class="col-md-8"><textarea class="form-control" name="address" rows="3" style="resize: none;" required><?php echo "$i";?></textarea></div>
									</div></br>
									
											<div class="row">
											<div class="col-md-2"><label>District</label></div>
											<div class="col-md-8"><input class="form-control" name="district" value="<?php echo "$k";?>" required></div>
											</div></br>
											
											<div class="row">
											<div class="col-md-2"><label>State</label></div>
											<div class="col-md-8"><input class="form-control" value="<?php echo $single_ply_dets->get_state_name($l);?>" readonly></div>
											</div></br>
											
											<div class="row">
											<div class="col-md-2"><label>Post code</label></div>
											<div class="col-md-8"><input class="form-control" name="postalcode" value="<?php echo "$j";?>" required></div>
											</div>
									
									</div>
									</div>
									<hr>  <!-- /box 3 -->
									
									
									
									<div class="row">
																		
									<div class="col-lg-12">
									<div class="row">
									<div class="col-md-2"><label>Position</label></div>
									<div class="col-md-8"><input class="form-control" name="position" value="<?php echo "$m";?>" required></div>
									</div></br>
									
									<div class="row">
									<div class="col-md-2"><label>Aadhar</label></div>
									<div class="col-md-8"><input class="form-control" name="aadhar" value="<?php echo "$n";?>" required></div>
									</div></br>
									
									<div class="row">
									<div class="col-md-2"><label>Passport</label></div>
									<div class="col-md-8"><input class="form-control" name="passport" value="<?php echo "$o";?>" required></div>
									</div></div>

									</div><hr> <!-- /box 4 -->

									
									<div class="row">
									<div class="col-lg-12">
									<div class="row">
									<div class="col-md-2"><label>Contact</label></div>
									<div class="col-md-8"><input class="form-control" name="contact" value="<?php echo "$p";?>" required></div>
									</div></br>
									
									<div class="row">
									<div class="col-md-2"><label>Emergency Contact</label></div>
									<div class="col-md-8"><input class="form-control" name="emecontact" value="<?php echo "$p1";?>" required></div>
									</div></br>									
									
									<div class="row">
									<div class="col-md-2"><label>Email</label></div>
									<div class="col-md-8"><input class="form-control" name="email" value="<?php echo "$q";?>" required></div>
									</div></br>
									</div></br><hr>
									<div class="row">
									<center><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1"><i class="fa fa-save fa-fw"></i> Save Changes</button>
									<a href="<?php echo "detail_view_player?secid=$r";?>" class="btn btn-primary "><i class="fa fa-times-circle fa-fw"></i> Cancel</a></center>
									</div>
									
									
									   <div class="modal fade" id="myModal1" role="dialog">
                            <div class="modal-dialog">
    
                                <!-- Modal content-->
                              <div class="modal-content">
                              <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                       <h4 class="modal-title text-center">Save Changes</h4>
                                  </div>
                            <div class="modal-body text-center">
							<p><i class="fa fa-exclamation-circle fa-3x"></i></p>
                          <p><b>Are you sure you want save changes?</b></p>
						  
						  <input type="hidden" value="<?php echo $r;?>" name="del_play"/>
						  
                               </div>
                       <div class="modal-footer">
                    <center>
					<button type="submit" class="btn btn-success" name="save"><i class="fa fa-check-circle fa-fw"></i> Yes</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times-circle fa-fw"></i> No</button>
					</center>
					</form>
					<?php
					if(isset($_POST['save']))
					{
						$del = base64_decode($_POST['del_play']);
						$fullname = $_POST["fullname"];
						$father = $_POST["father"];
						$dob = $_POST["dob"];
						$blood = $_POST["blood"];
						$height = $_POST["height"];
						$weight = $_POST["weight"];
						$address = $_POST["address"];
						$district = $_POST["district"];
						$postalcode = $_POST["postalcode"];
						$position = $_POST["position"];
						$aadhar = $_POST["aadhar"];
						$passport = $_POST["passport"];
						$contact = $_POST["contact"];
						$emecontact = $_POST["emecontact"];
						$email = $_POST["email"];
						$del_player = new abfi_admin();
						$check_empty = $del_player->check_empty_update($fullname,$father,$dob,$blood,$height,$weight,$address,$district,$postalcode,$position,$aadhar,$passport,$contact,$emecontact,$email);
						if($check_empty == 1)
						{
						$delete_player = $del_player->update_player($del,$fullname,$father,$dob,$blood,$height,$weight,$address,$district,$postalcode,$position,$aadhar,$passport,$contact,$emecontact,$email);
						
						if($delete_player)
						{
						  echo"<script>alert('Data Updated Successfully...');</script>";
						  header( "refresh:0;url=detail_view_player?secid=$r");
						}
					    }
						
						else 
						{
							echo"<script>alert('Kindly fill all the required details...');</script>";
						}
						
						}
					?>
                         </div>
                         </div>
      
                        </div>
						</div>
						
	<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content -->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Profile Picture</h4>
        </div>
        <div class="modal-body">
          <p>
		  <div>
		  <div id="imagePreview" style="margin-left:200px;"><img src="../abf_use/off_reg_imgs/<?php echo $image;?>" alt="Player-Image" width="180" height="180"/></div>
		  <div id="manageleft">
		  <form action="" method="POST" enctype="multipart/form-data">
			
			<input id="uploadFile" type="file" name="image" class="img" accept="image/jpeg,image/gif,image/png"/>
			 <input type="hidden" value="<?php echo $r;?>" name="del_play"/>
		 </div> 
		  </div>
		  
		  </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
		   <button type="submit" class="btn btn-default" name="imgsave">Save</button>
		   </form>
        </div>
      </div>
      
    </div>
  </div>
  
<?php
if(isset($_POST['imgsave']))
{
        $del = base64_decode($_POST['del_play']);
		$del1 = $_POST['del_play'];
		$imgs = $_FILES['image']['name'];
		$modify = base64_encode(rand(10,10000));
	    $file_name = $modify . $_FILES['image']['name'];
		$file_size =$_FILES['image']['size'];
		$file_tmp =$_FILES['image']['tmp_name'];
		$maxsize = 200 * 1024;
        $fpart2 = pathinfo($file_name, PATHINFO_EXTENSION);
		$allowedextns = array('jpeg','JPEG','png','PNG','jpg','JPG');
		$desired_dir="../abf_use/off_reg_imgs";
		
		if(!empty($imgs))
		{
			if($file_size < $maxsize)
			{
			
		if(!in_array($fpart2 , $allowedextns))
		{
			echo "<script>alert('Kindly Upload a JPEG/JPG or PNG file to proceed further..!!')</script>";
			header( "refresh:0;url=edit_view_player?secid=$r");
		}
		
		else 
		{
			//echo "<script>alert('You are good to go')</script>";
			$sqlque1 = "UPDATE abfi_ply_reg SET ply_img='$file_name' where ply_sec_reg_id = '$del'";
		
			 $del_player = new abfi_admin();
			 $result = $del_player->extract($sqlque1);
		    
			 
			  if(!$result)
			   {
				   echo "<script>alert(Error Uploading Files...??.. Server Error...)</script>";
				   header( "refresh:0;url=edit_view_player?secid=$r");
			   }

             else
			 {
				  if(is_dir($desired_dir)==false){
                mkdir("$desired_dir", 0700);		// Create directory if it does not exist
            }
			
			if(is_dir("$desired_dir/".$file_name)==false){
                move_uploaded_file($file_tmp,"$desired_dir/".$file_name);
            }
				 echo "<script>alert('Image Uploaded Successfully....!!!')</script>";
				 header( "refresh:0;url=detail_view_player?secid=$r");
				 
			 }		
		
        } 
           }   else 
			  {
				  echo "<script>alert('File size can not be greater than 200KB')</script>";
				 header( "refresh:0;url=edit_view_player?secid=$r");
			  }
            
		}
		
		else 
		{
			echo "<script>alert('Image file cannot be empty..!!!')</script>";
			header( "refresh:0;url=edit_view_player?secid=$r");
		}
}
?>
									
					
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
   <script type="text/javascript" src="js/script.js"></script>

</body>

</html>
