<?php require_once('../abfi_all_inc/Classes/include_all_min.php'); ?>
<?php confirm_slogged_in();?>
<?php confirm_session_svalid();?>
<?php $form = new abfi_use(); ?>
<?php $userid = $_SESSION["admin_id"]?>
<!DOCTYPE html>
<html lang="en">

<head>
   
<title>Home | ABFI Admin</title>
<?php include('adm_includes/header.php');?>
<!--     Fonts and icons     -->
    <!--<link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">-->

	<!-- CSS Files -->
	<link href="../abf_min/assets/css/gsdk-bootstrap-wizard.css" rel="stylesheet" />
	<style>
	#edu_one,#edu_two
	{
      display:none;    	
	}
	
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
        <div class="col-sm-12">

            <!--      Wizard container        -->
            <div class="wizard-container" style="padding-top:0px;">

                <div class="card wizard-card" data-color="blue" id="wizardProfile">
                    <form action="" method="POST" id="defaultForm" enctype="multipart/form-data">
              

                    	<div class="wizard-header">
                        	<h3>
                        	   <small>Official Registration</small>
                        	</h3>
                    	</div>

						<div class="wizard-navigation">
							<ul>
	                            <li><a href="#about" data-toggle="tab">Basic</a></li>
	                            <li><a href="#account" data-toggle="tab">Address and Contact</a></li>
	                            <li><a href="#address" data-toggle="tab">Other Information</a></li>
								
	                        </ul>

						</div>

                        <div class="tab-content">
                            <div class="tab-pane" id="about">
                              <div class="row">
                                  
                                  <div class="col-sm-4 col-sm-offset-1">
                                     <div class="picture-container">
                                          <div class="picture">
                                              <img src="../abf_min/assets/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title=""/>
                                              <input type="file" id="wizard-picture" class="required" rel="tooltip" title="Upload image" name="userimage">
                                          </div>
                                          <h6>Choose Picture</h6>
										  <p style="font-size:12px; color:red;">Image Extension : jpg,jpeg or png</p>
										  <p style="font-size:12px; color:red;">Image Dimensions : 100 X 100</p>
										  <p style="font-size:12px; color:red;">Image Size : 100KB Max</p>
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                        <label>Full Name <small>(required)</small></label>
                                        <input name="fullname" type="text" class="form-control" placeholder="Full Name" required>
                                      </div>
                                      <div class="form-group">
                                        <label>Father name <small>(required)</small></label>
                                        <input name="fathername" type="text" class="form-control" placeholder="Father's Name" required>
                                      </div>
                                 
                                     <div class="form-group">
                                 <label>D.O.B. <small>(required)</small></label>
                           
                              <input type="text" class="form-control" name="dob" id="datepicker" placeholder="dd/mm/yyyy" required>
                                           
                                         </div><hr>
                                  </div>
								  
								     <div class="col-sm-5 col-sm-offset-1">
									 <div class="col-sm-6">
                                      <div class="form-group">
                                          <label>Gender <small>(required)</small></label>
                                          <select name="gender" class="form-control" required>
										  <option disabled="" selected="">--Select--</option>
											<option value="M">	Male	</option>
											<option value="F">	Female	</option>
										  </select>
                                      </div>
									  </div>
									<div class="col-sm-6">
                                      <div class="form-group">
                                          <label>Blood group <small>(required)</small></label>
                                          <select name="blood" class="form-control" required >
										   <option disabled="" selected="">--Select--</option>
											<option value="A+">A+</option>
											<option value="A-">A-</option>
											<option value="B+">B+</option>
											<option value="B-">B-</option>
											<option value="AB+">AB+</option>
											<option value="AB-">AB-</option>
											<option value="O+">O+</option>
											<option value="O-">O-</option>
										  </select>
                                      </div>
									  </div>
									  
                                  </div>
								  
								  
									<div class="col-sm-5 col-sm-offset-0">
									 <div class="col-sm-6">
                                      <div class="form-group">
                                          <label>Height <small>(required)</small></label>
                                          <input name="height" type="text" class="form-control" placeholder="In cm" required>
                                      </div>
									  </div>
									<div class="col-sm-6">
                                      <div class="form-group">
                                          <label>weight <small>(required)</small></label>
                                          <input name="weight" type="text" class="form-control" placeholder="In kg" required>
                                      </div>
									  </div>
									  
                                  </div>
								  
								  
                              </div>
                            </div>
							
							
							 <div class="tab-pane" id="account">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h4 class="info-text"> Address and Contact</h4>
                                    </div>
                                    <div class="col-sm-10 col-sm-offset-1">
                                         <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" name="address" class="form-control" placeholder="House Number/Flat Number Street Name" required>
                                          </div>
                                    </div>
                                    
                                    <div class="col-sm-3 col-sm-offset-1">
                                         <div class="form-group">
                                            <label>District</label>
                                            <input type="text" name="district" class="form-control" placeholder="District" required>
                                          </div>
                                    </div>
                                    <div class="col-sm-4">
                                         <div class="form-group">
                                            <label>State</label><br>
                                             <select name="state" class="form-control" required>
											 <option disabled="" selected="">--Select--</option>
                                                
														<?php
                                                           $all_states = $form->fetch_all_states();
														if (mysqli_num_rows($all_states) > 0) {
														// output data of each row
														while($row = mysqli_fetch_assoc($all_states)) {
															$state_name = $row["state_name"];
															$state_code = $row["state_code"];
															echo"<option value='$state_code'> $state_name </option>";
														}
													} else {
														echo "0 results";
													}														   
														?>

                                            </select>
                                          </div>
                                    </div>
									
									<div class="col-sm-3">
                                         <div class="form-group">
                                            <label>Post code</label>
                                            <input type="text" name="postcode" class="form-control" placeholder="173213" required>
                                          </div>
                                    </div>
									
                                </div><hr>
								
								<div class="row">
																		
								<div class="col-sm-3 col-sm-offset-1">
                                <div class="form-group">
                                <label>Contact</label>
                                            <input name="contact" type="text" class="form-control" placeholder="0123456789" required>
                                          </div>
                                    </div>
									<div class="col-sm-3">
                                         <div class="form-group">
                                            <label>Emergency Contact</label>
                                            <input name="emecontact" type="text" class="form-control" placeholder="0123456789" required>
                                          </div>
                                    </div>
									
												<div class="col-sm-4">
                                         <div class="form-group">
                                            <label>Email</label>
                                            <input name="email" type="email" class="form-control" placeholder="jhon@example.com" required>
                                          </div>
                                    </div>

									</div><!-- /box 4 -->

								
                            </div>
							
							
                            <div class="tab-pane" id="address">
                                
								<div class="row">
																		
								<div class="col-sm-3 col-sm-offset-1">
                               <div class="form-group">
                                          <label>Position<small>(required)</small></label>
                                          <select name="position" class="form-control" id="position" required>
										   <option disabled="" selected="">--Select--</option>
										   <option value="202">Federation Official</option>
										 
										  </select>
                                      </div>
                                    </div>
									<div class="col-sm-3">
                                         <div class="form-group">
                                            <label>Aadhar</label>
                                            <input name="aadhar" type="text" class="form-control" placeholder="Aadhar Number" required>
                                          </div>
                                    </div>
									
												<div class="col-sm-4">
                                         <div class="form-group">
                                            <label>Passport</label>
                                            <input name="passport" type="text" class="form-control" placeholder="Passport Number" required>
                                          </div>
                                    </div>
									
									<div class="col-sm-10 col-sm-offset-1" id="edu_one"><hr>
		                                        <div class="form-group label-floating">
		                                            <label class="control-label">Enter the name of your position</label>
		                                            <input type="text" name="other_pos" class="form-control" id="other_pos" required>
													
		                                        </div>
												
		                                    </div>

									</div><hr><!-- /box 4 -->
								
									<div class="row">
																		
									<div class="col-sm-5 col-sm-offset-1">
                                         <div class="form-group">
                                            <label>Marital Status</label>
                                             <select name="marital" class="form-control" id="maritalstatus" required>
											 <option disabled="" selected="">--Select--</option>
											<option value="Unmarried">Unmarried</option>
											<option value="Married">Married</option>
											<option value="Widow/Widower">Widow/Widower</option>
										  </select>
                                          </div>
                                    </div>
									<div class="col-sm-5" id="edu_two">
                                         <div class="form-group">
                                            <label>Marriage Date</label>
                                            <input type="text" name="mrg_date" id="mrg_date" class="form-control" placeholder="dd/mm/yyyy" required>
                                          </div>
                                    </div>

									</div><hr><!-- /box 4 -->
									
									<div class="row">
																		
									<div class="col-sm-8 col-sm-offset-1">
                                         <div class="form-group">
                                            <label><b style="color:red;">Note:</b> Kindly fill in <b style="color:red;">NA</b> in <b style="color:red;">Passport Field</b> if you don't have passport yet.</label>
                                            
                                          </div>
                                    </div>
									

									</div><hr>
							
                            </div>

                        </div>
                        <div class="wizard-footer height-wizard">
                            <div class="pull-right">
                                <input type='button' class='btn btn-next btn-fill btn-primary btn-wd btn-sm' name='next' value='Next' />
                                <input type='submit' class='btn btn-finish btn-fill btn-primary btn-wd btn-sm' name='finish' value='Finish' />

                            </div>

                            <div class="pull-left">
                                <input type='button' class='btn btn-previous btn-fill btn-primary btn-wd btn-sm' name='previous' value='Previous' />
                            </div>
                            <div class="clearfix"></div>
                        </div>

                    </form>
                </div>
            </div> <!-- wizard container -->
        </div>
        </div><!-- end row -->
            <!-- /.row -->
           
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
 <?php include('adm_includes/footer.php');?>
	 <!--   Core JS Files   -->
	<!--<script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>-->
	<!--<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>-->
	<script src="../abf_min/assets/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>

	<!--  Plugin for the Wizard -->
	<script src="../abf_min/assets/js/gsdk-bootstrap-wizard.js"></script>

	<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
	<script src="../abf_min/assets/js/jquery.validate.min.js"></script>
   
    <script type="text/javascript">
    $(function () {
        $("#position").change(function () {
            var selectedText = $(this).find("option:selected").text();
            var selectedValue = $(this).val();
			if(selectedValue == '204')
			{ 
		
			$("#edu_one").show();
		
			}
	
			else 
			{
			  
			$("#edu_one").hide();
			$("#other_pos").val("");
			  
			}
        });
    });
	
	
</script>

<script type="text/javascript">
    $(function () {
        $("#maritalstatus").change(function () {
            var selectedText = $(this).find("option:selected").text();
            var selectedValue = $(this).val();
			if(selectedValue == 'Unmarried' || selectedValue == 'Widow/Widower')
			{ 
		
			$("#edu_two").hide();
			$("#mrg_date").val("");
		
			}
	
			else 
			{
			  
			$("#edu_two").show();
			  
			}
        });
    });
	
	
</script>

<script>
  $(function () {
    

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true,
	  format: 'dd/mm/yyyy'
    }).on('changeDate', function(e) {
            // Revalidate the date field
            $('#defaultForm').formValidation('revalidateField', 'dob');
        });

  });
</script>


</body>

</html>

<?php
if(isset($_POST["finish"]))
{
	$imgs = $_FILES['userimage']['name'];
	$modify = base64_encode(rand(10,10000));
	$file_name = $modify . $_FILES['userimage']['name'];
	$file_size =$_FILES['userimage']['size'];
	$file_tmp =$_FILES['userimage']['tmp_name'];
	$offc_id = rand(10,100);
	$sec_offc_id = rand(10,10000);
	$fullname = $form->mysql_prep($_POST["fullname"]);
	$fathername = $form->mysql_prep($_POST["fathername"]);
	$dob = $form->mysql_prep($_POST["dob"]);
	$gender = $form->mysql_prep($_POST["gender"]);
	$blood = $form->mysql_prep($_POST["blood"]);
	$height = $form->mysql_prep($_POST["height"]);
	$weight = $form->mysql_prep($_POST["weight"]);
	$address = $form->mysql_prep($_POST["address"]);
	$district = $form->mysql_prep($_POST["district"]);
	$state = $form->mysql_prep($_POST["state"]);
	$postcode = $form->mysql_prep($_POST["postcode"]);
	$contact = $form->mysql_prep($_POST["contact"]);
	$emecontact = $form->mysql_prep($_POST["emecontact"]);
	$email = $form->mysql_prep($_POST["email"]);
	$position = $form->mysql_prep($_POST["position"]);
	$aadhar = $form->mysql_prep($_POST["aadhar"]);
	$passport = $form->mysql_prep($_POST["passport"]);
	$other_pos = $form->mysql_prep($_POST["other_pos"]);
	$marital = $form->mysql_prep($_POST["marital"]);
	$mrg_date = $form->mysql_prep($_POST["mrg_date"]);
	$designation='';
	//$login_state = $_SESSION["state"];
	$login_state = 4000;
	$status = 2;
	
	$image_input = $form->insert_image($file_name,$file_size,$file_tmp);
	
	if($image_input == 4)
	{
		$empty_check = $form->check_feilds($file_name,$fullname,$fathername,$dob,$gender,$blood,$height,$weight,$address,$district,$state,$postcode,$contact,$emecontact,$email,$position,$aadhar,$passport,$marital,$other_pos,$mrg_date);
		
		if($empty_check == 3)
		{
			$insert_data = $form->insert_official($offc_id,$sec_offc_id,$fullname,$fathername,$dob,$gender,$blood,$height,$weight,$address,$postcode,$district,$state,$login_state,$position,$designation,$other_pos,$aadhar,$passport,$contact,$emecontact,$email,$marital,$mrg_date,$file_name,$status);
			if($insert_data)
			{
	
			echo "<script> alert('Data Entered Successfully'); </script>";
			 header("refresh:0;url=all_official_data_tbl");
			
		
			}
			
			else
		{
			echo "<script> alert('Error in entering data..!!!'); </script>";
			 header("refresh:0;url=add_official");
		}
		
		}
		
		
	}
	
	
}


?>





