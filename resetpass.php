<?php require_once('abfi_all_inc/Classes/outside.php');?>
<?php 
$cert = new outside_func();
$nameError ="";
$emailError ="";
$stateError ="";
$detailsError="";
if(isset($_POST['submit']))
{
	if($_POST['username'] != ""){
// Sanitizing name value of type string
$_POST['username'] = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$nameError = "<div class='col-md-6 col-md-offset-3 text-center'><div class='alert alert-success'>".$_POST['username']." is Sanitized an Valid username.</div></div>";
if ($_POST['username'] == ""){
$nameError = "<div class='col-md-6 col-md-offset-3 text-center'><div class='alert alert-danger'>Please enter a valid username.</div></div>";
}
else
{
$username = $_POST['username'];
	
}
}
else {
$nameError = "<div class='col-md-6 col-md-offset-3 text-center'><div class='alert alert-warning'>Please enter your username.</div></div>";
}
	
	
	if($_POST['email'] != ""){
//sanitizing email
$_POST['email'] = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
//After sanitization Validation is performed
$_POST['email'] = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$emailError = "<div class='col-md-6 col-md-offset-3 text-center'><div class='alert alert-success'>".$_POST['email']." is Sanitized an Valid Email.</div></div>";
if($_POST['email'] == ""){
$emailError = "<div class='col-md-6 col-md-offset-3 text-center'><div class='alert alert-danger'>Please enter a valid email.</div></div>";
}
else
{
$email = $_POST['email'];
	
}
}
else {
$emailError = "<div class='col-md-6 col-md-offset-3 text-center'><div class='alert alert-warning'>Please enter your email.</div></div>";
}

if($_POST['state'] != ""){
// Sanitizing state value of type string
$_POST['state'] = filter_var($_POST['state'], FILTER_SANITIZE_STRING);
$stateError = "<div class='col-md-6 col-md-offset-3 text-center'><div class='alert alert-success'>".$_POST['state']." is Sanitized an Valid state.</div></div>";
if ($_POST['state'] == ""){
$stateError = "<div class='col-md-6 col-md-offset-3 text-center'><div class='alert alert-danger'>Please enter a valid state.</div></div>";
}
else
{
$state = $_POST['state'];	
}
}
else {
$stateError = "<div class='col-md-6 col-md-offset-3 text-center'><div class='alert alert-warning'>Please enter your state.</div></div>";
}

$result_sub = $cert->pass_reset_link_gen($username,$email,$state);
if($result_sub == 'ABF_SUCCESS')
{
  $detailsError = "<div class='col-md-6 col-md-offset-3 text-center'><div class='alert alert-success'>A password reset link has been sent to your Email account. Kindly use that link to reset your password.</div></div>";
}
else
{
  $detailsError = "<div class='col-md-6 col-md-offset-3 text-center'><div class='alert alert-danger'>Details provided by you are not correct kindly check and try again.</div></div>";
}
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Home | Amateur Baseball Federation of India | THE OFFICIAL SITE OF INDIAN BASEBALL</title>
<?php include('includes/header.php');?>

	
</head>
<body>
<div id="outer_m">
<?php include('includes/nav.php');?>
<div id="main">

<div id="stickleft">
<i class="fa fa-facebook-square" style="font-size:32px; margin-left:2px; cursor:pointer; color:#022a5e;"></i>
<i class="fa fa-youtube-square" style="font-size:32px; margin-left:2px; cursor:pointer;  color:#022a5e;"></i>
<i class="fa fa-twitter-square" style="font-size:32px; margin-left:2px; cursor:pointer; color:#022a5e;"></i>
<i class="fa fa-linkedin-square" style="font-size:32px; margin-left:2px; cursor:pointer; color:#022a5e;"></i>
</div>




<div id="outer">
<div class="col-md-6 col-md-offset-3">
<div class="panel panel-primary text-center">
<div class="panel-heading">REST PASSWORD</div>
<div class="panel-body">
<form method="POST" action="">
<div class="form-group">
<input type="text" class="form-control" name="username" placeholder="Username" required />
</div>
<div class="form-group">
<input type="email" class="form-control" name="email" placeholder="Email ID" required />
</div>
<div class="form-group">
<select name="state" class="form-control" required>
											 <option disabled="" selected="">--Select--</option>
                                                
														<?php
                                                           $all_states = $cert->fetch_all_states();
														if (mysqli_num_rows($all_states) > 0) {
														// output data of each row
														while($row = mysqli_fetch_assoc($all_states)) {
															$state_name = $row["state_name"];
															$state_code = $cert->state_code_ecrypt($row["state_code"]);
															echo"<option value='$state_code'> $state_name </option>";
														}
													} else {
														echo "0 results";
													}														   
														?>

                                            </select>
</div>
<div class="form-group">
<button type="submit" class="btn btn-primary" name="submit">Submit</button>
</div>
</form>
</div>
</div>
</div>
<div class="form-group">
<p><?php echo $detailsError;?></p>
</div>
<div class="form-group">
<p><?php //echo $nameError;?></p>
</div>
<div class="form-group">
<p><?php //echo $emailError;?></p>
</div>
<div class="form-group">
<p><?php //echo $stateError;?></p>
</div>
</div>


</div>
</div>
</div>


<footer>
<?php include('includes/footer.php');?>
</footer>

</div>
</body>
</html>
