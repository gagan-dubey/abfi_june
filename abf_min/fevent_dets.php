<?php require_once('../abfi_all_inc/Classes/include_all_min.php'); ?>
<?php confirm_slogged_in();?>
<?php confirm_session_svalid();?>
<?php $evt = base64_decode($_GET["evt"]);?>
<!DOCTYPE html>
<html lang="en">

<head>
   
<title>Home | ABFI Admin</title>
<?php include('adm_includes/header.php');?>
 
</head>

<body>

    <div id="wrapper">

       <?php include('adm_includes/nav.php');?>

        <div id="page-wrapper"></br>
		                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                           <b> Event Details</b>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
						
						<?php
                         $a = new db_functions();
						 $fevent = new abfi_admin();
						 $sql = "Select * from abfi_forth_event where sec_eve_id = '$evt'";
						 $result = $a->extract($sql);
						  if (mysqli_num_rows($result) > 0) {
							// output data of each row
							while($row = mysqli_fetch_assoc($result)) {
								$a =$row["event_name"];
								$c =$row["event_date"];
								$d =$row["event_venue"];
								$e = base64_encode($row["sec_eve_id"]);
								
					
							echo "<div class='col-md-3 col-md-offset-1'>
										<img src='reg_images/ev1.jpg'  class='img-circle' alt='event' width='200' height='200'>
									</div>
							<div class='col-md-6'>
							<blockquote>
							<p>$a</p>
							<small><cite title='Event Title'><i class='fa fa-map-marker fa-fw'></i> $d</cite></small>
							</blockquote>
							<p>
							<i class='fa fa-calendar fa-fw'></i> <b>Dates - </b> $c
							</p>
							<hr>
							</div>";
							}
						} 

						?>
                                   
              
		
		<div class='col-md-12 col-md-offset-1'>
		<center>
		<button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit"><i class="fa fa-edit fa-fw"></i> Edit Event</button>
		<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete"><i class="fa fa-trash-o fa-fw"></i> Delete Event</button>
		</center></div></div></div></br><hr></br>

		<!-- Modal -->
  <div class="modal fade" id="delete" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
     <div class="modal-content text-center">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Delete Event</h4>
        </div>
        <div class="modal-body">
		<form method="post" action="">
          <p>Are you sure you want to delete this event?</p>
			<input type="hidden" name="eid" value="<?php echo $e?>"/>
        </div>
        <div class="modal-footer">
		<center>
          <button type="submit" class="btn btn-success" name="delete"><i class="fa fa-check-circle fa-fw"></i>Yes</button>
		   <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times-circle fa-fw"></i>No</button>
		   </center>
        </div>
		 </form>
      </div>
      
    </div>
  </div>
  
  <!-- Modal -->
  <div class="modal fade" id="edit" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content text-center">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Event Details</h4>
        </div>
		<form id="defaultForm" method="post" class="form-horizontal" action="" enctype="multipart/form-data" data-toggle="validator">
        <div class="modal-body">
          <div class="row">
					<div class="col-md-8 col-md-offset-2">
					
							<div class="row">
							<div class="form-group">
							<div class="col-md-2"><label>Event Name</label></div>
							<div class="col-md-10"><input class="form-control" name="ename" placeholder="Enter Event Name" value="<?php echo $a;?>"></div>
							</div></div>
							
							<div class="row">
							<div class="form-group">
							<div class="col-md-2"><label>Dates</label></div>
							<div class="col-md-10"><input class="form-control" name="edate" placeholder="Enter Event Dates" value="<?php echo $c;?>"></div>
							</div></div>
							
							<div class="row">
							<div class="form-group">
							<div class="col-md-2"><label>Venue</label></div>
							<div class="col-md-10"><input class="form-control" name="evenue" placeholder="Enter Event Venue" value="<?php echo $d;?>"></div>
							</div></div>
							<input type="hidden" name="eid1" value="<?php echo $e?>"/>
					</div>
						
					</div>
		 
        </div>
        <div class="modal-footer">
		<center>
          <button type="submit" class="btn btn-success" name="save"><i class="fa fa-check-circle fa-fw"></i>Save</button>
		   <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times-circle fa-fw"></i>Cancel</button>
		   </center>
        </div>
		 </form>
      </div>
      
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
if(isset($_POST['save']))
{
$ename = $_POST['ename'];
$edate = $_POST['edate'];
$evenue = $_POST['evenue'];
$form = new abfi_admin();
$id = $_POST['eid1'];
$eid = base64_decode($_POST['eid1']);
echo $eid;
$sql = "update abfi_forth_event set event_name ='$ename', event_date ='$edate', event_venue ='$evenue' where sec_eve_id='$eid'";
$result = $form->extract($sql);
if($result)
{
	echo "<script> alert('Event Details Updated Successfully..'); </script>";
								  header( "refresh:0;url=fevent_dets?evt=$id" );
}
 else
							  {
								 echo "<script> alert('Error Updating Data..'); </script>";
								 
							  }
}

?>

<?php
if(isset($_POST['delete']))
{
$eid = base64_decode($_POST['eid']);
$form = new abfi_admin();
$sql = "delete from abfi_forth_event where sec_eve_id='$eid'";
$result = $form->extract($sql);

			if($result)
							  {
								  echo "<script> alert('Event Deleted Successfully..'); </script>";
								  header( "refresh:0;url=event_tbl" );
							  }
							  
							  else
							  {
								 echo "<script> alert('Error Deleting Event..'); </script>";
								 
							  }
}

?>
