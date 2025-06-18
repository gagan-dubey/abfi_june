<?php require_once('../abfi_all_inc/Classes/outside2.php');?>
<?php $form = new outside_func();?>
<?php 
$current_token = $_GET['tnk'];
$userid = $form->state_code_dcrypt($_GET['id']);
$check_token = $form->check_token($current_token,$userid);

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ABFI | Reset Password</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="../abf_min/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<script src="../abf_min/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../abf_min/js/bootstrap.min.js"></script>
	
	
	 <script type="text/javascript" src="../abf_min/dist/js/formValidation.js"></script>
    <script type="text/javascript" src="../abf_min/dist/js/framework/bootstrap.js"></script>

    <!-- Custom CSS -->
    


</head>

<body style="padding-top:70px;">

  
    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h3 class="text-center">Change your password</h3>
				<hr>
				<div class="col-md-5" style="margin-left:330px; margin-right:330px;">
               <div class="panel panel-info">
				<div class="panel-heading text-center"><b>Set Your Password</b></div>
				<form id="defaultForm" method="post" action="#" enctype="multipart/form-data" data-toggle="validator">
				<div class="panel-body">
				<div class="form-group">
							
							<div class="inputGroupContainer">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-unlock-alt fa-fw"></i></span>
								<input type="password" class="form-control" name="pass" placeholder="New Password" />
							</div>
							</div>
				</div>
							
				<div class="form-group">
							
							<div class="inputGroupContainer">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-unlock-alt fa-fw"></i></span>
								<input type="password" class="form-control" name="cpass" placeholder="Confirm Password" />
							</div>
							</div>
				</div><hr>
							
							<center>
					<button type="submit" name="send" class="btn btn-success"><i class="fa fa-key fa-fw"></i> Change</button>
					</center>
				</div>
				</form>
				</div>
				</div>
				<div class="text-center"><b>Note: For security reasons you are requested to change your password before you proceed further.</b></div>
				<hr>
				<div class="text-center"><b style="color:red">Kindly use the new password after updating the password for login.</b></div>
				<hr>
				<div class="text-center"><img src="reg_images/logo.png" class="img-circle" alt="ABFI-LOGO" width="40" height="40">
				<p><b>Amateur Baseball Federation of India</b></p></div>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
	
<script type="text/javascript">
$(document).ready(function() {
	
	$('#defaultForm').formValidation({
        message: 'This value is not valid',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
             pass: {
                validators: {
                    notEmpty: {
                        message: 'The password is required'
                    },
                   
                }
            },
			
			cpass: {
                validators: {
                    notEmpty: {
                        message: 'The password is required'
                    },
                    identical: {
                        field: 'pass',
                        message: 'The password and its confirm are not the same'
                    }
                }
            },
	
        }
    });
	
});
</script>

</body>

</html>

<?php
if (isset($_POST['send']))
{
	$pass =$_POST["pass"];
	$cpass =$_POST["cpass"];
	
    $check1 = $form->check_empty_pass($pass,$cpass);
	
	if($check1 == 1)
	{
		$pass_updt = $form->update_pass($pass,$cpass,$userid);
		if($pass_updt)
		{
			
				$new_token = $form->update_token($userid);
				if($new_token)
				{
			    echo"<script>alert('Password updated successfully....');</script>";
			   header("refresh:0;url=../admin_login");
				}
				
				else
				{
				   echo"<script>alert('Password updated Error Contact Your Admin....');</script>";
				}
			
		}
		
		else
		{
			echo"<script>alert('Error in updating password...');</script>";
		}
	}
	
	
}

?>
