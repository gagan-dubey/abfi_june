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
						 $sql = "Select * from abfi_tour_create where sec_event_id = '$evt'";
						 $result = $a->extract($sql);
						  if (mysqli_num_rows($result) > 0) {
							// output data of each row
							while($row = mysqli_fetch_assoc($result)) {
								$a =$row["event_name"];
								$b =$row["event_organizer"];
								$c =$row["event_dates"];
								$d =$row["event_venue"];
								$e = base64_encode($row["sec_event_id"]);
								$f = $fevent->get_event_type($row["event_type"]);
								$estatus =$row["event_status"];
					
							echo "<div class='col-md-3 col-md-offset-1'>
										<img src='reg_images/ev1.jpg'  class='img-circle' alt='event' width='200' height='200'>
									</div>
							<div class='col-md-6'>
							<blockquote>
							<p>$a</p>
							<small><cite title='Event Title'><i class='fa fa-map-marker fa-fw'></i> $d</cite></small>
							</blockquote>
							<p>
							<i class='fa fa-paper-plane fa-fw'></i> <b>Event-Type - </b> $f<hr>
							<i class='fa fa-caret-square-o-right fa-fw'></i> <b>Organiser - </b> $b<hr>
							<i class='fa fa-calendar fa-fw'></i> <b>Dates - </b> $c
							</p>
							<hr>
							</div>";
							}
						} 

						?>
                                   
            <?php  
		if($estatus == 0)
		{	echo"
		<div class='col-md-12 col-md-offset-1'>
		<center><a href='#'><button type='button' class='btn btn-warning' data-toggle='modal' data-target='#closeR'><i class='fa fa-ban fa-fw'></i> Close Registrations</button></a>
		<a href='#'><button type='button' class='btn btn-danger' data-toggle='modal' data-target='#delete'><i class='fa fa-trash-o fa-fw'></i> Delete Event</button></a>
		<a href='#'><button type='button' class='btn btn-success' data-toggle='modal' data-target='#closeE'><i class='fa fa-check-circle fa-fw'></i> Close Event</button></a>
		</center></div></div></div></br><hr></br>";}
		
		elseif($estatus == 1)
		{	echo"
		<div class='col-md-12 col-md-offset-1'>
		<center><a href='#'><button type='button' class='btn btn-warning disabled' data-toggle='modal' data-target='#closeR'><i class='fa fa-ban fa-fw'></i> Close Registrations</button></a>
		<a href='#'><button type='button' class='btn btn-danger disabled' data-toggle='modal' data-target='#delete'><i class='fa fa-trash-o fa-fw'></i> Delete Event</button></a>
		<a href='#'><button type='button' class='btn btn-success' data-toggle='modal' data-target='#closeE'><i class='fa fa-check-circle fa-fw'></i> Close Event</button></a>
		</center></div></div></div></br><hr></br>";}
		
		elseif($estatus == 2)
		{	echo"
		<div class='col-md-12 col-md-offset-1'>
		<center><a href='#'><button type='button' class='btn btn-warning disabled' data-toggle='modal' data-target='#closeR'><i class='fa fa-ban fa-fw'></i> Close Registrations</button></a>
		<a href='#'><button type='button' class='btn btn-danger disabled' data-toggle='modal' data-target='#delete'><i class='fa fa-trash-o fa-fw'></i> Delete Event</button></a>
		<a href='event_marks?evt=$e'><button type='button' class='btn btn-success'><i class='fa fa-file-text-o fa-fw'></i> Update Players Records</button></a>
		<a href='event_marks?evt=$e'><button type='button' class='btn btn-info'><i class='fa fa-file-text-o fa-fw'></i> Update Players Level</button></a>
		</center></div></div></div></br><hr></br>";}
	?>
		<!-- Modal -->
  <div class="modal fade" id="delete" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
     <div class="modal-content text-center">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Delete Event</h4>
        </div>
		<form method="post" action="">
        <div class="modal-body">
		
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
  <div class="modal fade" id="closeR" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content text-center">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Close Registrations</h4>
        </div>
		<form method="post" action="">
        <div class="modal-body">
		
          <p>Are you sure you want to close registrations for this event?</p>
		 <input type="hidden" name="eid1" value="<?php echo $e?>"/>
        </div>
        <div class="modal-footer">
		<center>
          <button type="submit" class="btn btn-success" name="closer"><i class="fa fa-check-circle fa-fw"></i>Yes</button>
		   <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times-circle fa-fw"></i>No</button>
		   </center>
        </div>
		 </form>
      </div>
      
    </div>
  </div>
  
  <!-- Modal -->
  <div class="modal fade" id="closeE" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
     <div class="modal-content text-center">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Close Event</h4>
        </div>
		<form method="post" action="">
        <div class="modal-body">
		
          <p>Are you sure you want to close this event?</p>
		 <input type="hidden" name="eid2" value="<?php echo $e?>"/>
        </div>
        <div class="modal-footer">
		<center>
          <button type="submit" class="btn btn-success" name="eclose"><i class="fa fa-check-circle fa-fw"></i>Yes</button>
		   <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times-circle fa-fw"></i>No</button>
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
   

</body>

</html>

<?php
if(isset($_POST['delete']))
{
$form = new abfi_admin();
$eid = base64_decode($_POST['eid']);
$sql = "update abfi_tour_create set event_status ='3' where sec_event_id='$eid'";
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

<?php
if(isset($_POST['closer']))
{
$form = new abfi_admin();
$eid = base64_decode($_POST['eid1']);
$sql = "update abfi_tour_create set event_status ='1' where sec_event_id='$eid'";
$result = $form->extract($sql);
if($result)
							  {
								  echo "<script> alert('Registrations Closed Successfully..'); </script>";
								  header( "refresh:0;url=event_tbl" );
							  }
							  
							  else
							  {
								 echo "<script> alert('Error Closing Registrations..'); </script>";
								 
							  }
}

?>

<?php
if(isset($_POST['eclose']))
{
$form = new abfi_admin();
$eid = base64_decode($_POST['eid2']);
$sql = "update abfi_tour_create set event_status ='2' where sec_event_id='$eid'";
$result = $form->extract($sql);
if($result)
							  {
								  echo "<script> alert('Event Closed Successfully..'); </script>";
								  header( "refresh:0;url=event_tbl" );
							  }
							  
							  else
							  {
								 echo "<script> alert('Error Closing Event..'); </script>";
								 
							  }
}

?>
