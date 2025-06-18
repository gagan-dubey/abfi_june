<?php require_once('../abfi_all_inc/Classes/include_all_min.php'); ?>
<?php confirm_slogged_in();?>
<?php confirm_session_svalid();?>
<?php $evt = base64_decode($_GET["evt"]);?>
<!DOCTYPE html>
<html lang="en">

<head>
   
<title>Home | ABFI Admin</title>
<?php include('adm_includes/header.php');?>
<link rel="stylesheet" href="assets/dropify/dropify.min3f0d.css?v2.2.0">

  <!-- Scripts -->
  <script src="assets/modernizr/modernizr.min.js"></script>
  <script src="assets/breakpoints/breakpoints.min.js"></script>
  <script>
    Breakpoints();
  </script>
 
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
					
							echo "
							<div class='col-md-12'>
							<blockquote>
							<p>$a</p>
							<small><cite title='Event Title'><i class='fa fa-map-marker fa-fw'></i> $d</cite></small>
							</blockquote>
							<p>
							 <div class='example-wrap'>
               <blockquote><h4 class='example-title'>Upload Marks</h4></blockquote>
			   <form>
                <div class='example'>
                  <input type='file' id='input-file-now' data-plugin='dropify' data-default-file=''/>
                </div>
              </div>
							</p>
							<hr>
							</div>";
							}
						} 

						?>
                                   
            <?php  
		if($estatus == 0)
		{	}
		
		elseif($estatus == 1)
		{	}
		
		elseif($estatus == 2)
		{	echo"
		<div class='col-md-12 col-md-offset-0'>
		<center>
		<button type='button' class='btn btn-success' id ='uploadButton' disabled><i class='fa fa-file-text-o fa-fw'></i> Update Players Records</button>
		</center>
		</form>
		</div></div></div></br><hr></br>";}
	?>
		
  
        </div>
	
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

	 <?php include('adm_includes/footer.php');?>
	 <script src="assets/animsition/animsition.min.js"></script>
  
  <!-- Plugins For This Page -->
  <script src="assets/jquery-ui/jquery-ui.min.js"></script>
  <script src="assets/dropify/dropify.min.js"></script>

  <!-- Scripts -->
  <script src="js/core.min.js"></script>
  <script src="js/site.min.js"></script>
  <script src="js/components/dropify.min.js"></script>
  <script src="js/uploads.min.js"></script>
  
   <script>
  $('INPUT[type="file"]').change(function () {
    var ext = this.value.match(/\.(.+)$/)[1];
    switch (ext) {
		case 'xlsx':
            $('#uploadButton').attr('disabled', false);
            break;
        default:
            alert('This is not an allowed file type.');
            this.value = '';
			$('#uploadButton').attr('disabled', true);
			
    }
});
  </script>
  
  <script>
$(document).ready(function(){
    $(".dropify-clear").click(function(){
        $('#uploadButton').attr('disabled', true);
    });
});
</script>
   

</body>

</html>

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
