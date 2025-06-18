<?php require_once('../abfi_all_inc/Classes/include_all_min.php'); ?>
<?php confirm_slogged_in();?>
<?php confirm_session_svalid();?>
<!DOCTYPE html>
<html lang="en">

<head>
   
<title>Home | ABFI Admin</title>
<?php include('adm_includes/header.php');?>
 
</head>

<body>

    <div id="wrapper">

       <?php include('adm_includes/nav.php');?>

        <div id="page-wrapper">
		</br>
		    <div class="panel panel-primary">
            <div class="panel-heading text-center">
            <b> Create Forthcoming Event</b>
            </div><!-- /.panel-heading -->
            <div class="panel-body">
			<form id="defaultForm" method="post" class="form-horizontal" action="" enctype="multipart/form-data" data-toggle="validator">
					<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-8">
					</br>
							<div class="row">
							<div class="form-group">
							<div class="col-md-2"><label>Event Name</label></div>
							<div class="col-md-10"><input class="form-control" name="ename" placeholder="Enter Event Name"></div>
							</div></div></br>
							
							<div class="row">
							<div class="form-group">
							<div class="col-md-2"><label>Event Organiser</label></div>
							<div class="col-md-10"><input type="text" class="form-control" name="eorg" placeholder="Organiser" /></div>
							</div></div></br>
							
							<div class="row">
							<div class="form-group">
							<div class="col-md-2"><label>Dates</label></div>
							<div class="col-md-10"><input class="form-control" name="edate" placeholder="Enter Event Dates"></div>
							</div></div></br>
							
							<div class="row">
							<div class="form-group">
							<div class="col-md-2"><label>Venue</label></div>
							<div class="col-md-10"><input class="form-control" name="evenue" placeholder="Enter Event Venue"></div>
							</div></div></br>
					</div>
					<div class="col-md-2"></div>		
					</div></br>
					<center><a href="forthcoming_event_creator" class="btn btn-primary "><i class="fa fa-recycle fa-fw"></i> RESET</a>
							<button type="submit" class="btn btn-primary" name="create"><i class="fa fa-check-square fa-fw"></i> CREATE</button></center>
            <!-- /.row -->
			</form>
			</div>
			</div>
						   
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

	 <?php include('adm_includes/footer.php');?>
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
            ename: {
                validators: {
                    notEmpty: {
                        message: 'Event Name is required'
                    }
                }
            },
			
	
				edate: {
					 excluded: false,
                validators: {
                    notEmpty: {
                        message: 'Event Date is required'
                    },
                }
            },
			
						evenue: {
                validators: {
                    notEmpty: {
                        message: 'Venue is required'
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
if(isset($_POST['create']))
{
	$ename = $_POST['ename'];
	$eorg = $_POST['eorg'];
	$edate = $_POST['edate'];
	$evenue = $_POST['evenue'];
	$a = new abfi_admin();
	
	$push_data = $a->create_fevent($ename,$edate,$evenue,$eorg);
							  if($push_data)
							  {
								  echo "<script> alert('Event Created Successfully..'); </script>";
								  header( "refresh:0;url=event_tbl" );
							  }
							  
							  else
							  {
								 echo "<script> alert('Not able to create the event right now..'); </script>";
								 
							  }
	
}
?>
