<?php require_once('../abfi_all_inc/Classes/include_all_min.php'); ?>
<?php confirm_logged_in();?>
<?php confirm_session_valid();?>
<?php 
$country = base64_decode($_GET["cou"]);
$cou = $_GET["cou"];
$eve = $_GET["eve"];
$gen = $_GET["gen"];
$lev = $_GET["lev"];
$gender =base64_decode($_GET["gen"]);
$event =base64_decode($_GET["eve"]);
$level =base64_decode($_GET["lev"]);
$roster_id = $gender . "-ros" . $event . $country;
$roster_id_enc = base64_encode($gender . "-ros" . $event . $country);
$form = new abfi_admin();
?>
<!DOCTYPE html>
<html lang="en">

<head>
   
<title>Home | ABFI Admin</title>
<?php include('adm_includes/header.php');?>
 <style>
 #upload_progress
 {
   display:none;
 }
 </style>
</head>

<body>

    <div id="wrapper">

       <?php include('adm_includes/nav.php');?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <hr>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
						<h4><b>Upload Players Details</b></h4> 
                        </div>
                        <!-- /.panel-heading -->
						<form method="post" action="" enctype="multipart/form-data">
                        <div class="panel-body">
						<div class="row">
						<div class="col-md-6 col-md-offset-5">
                        <div class="form-group">   
						<input type="file" name="file" id="file" />
                        </div>
						</div>
						</div>
						<div class="row text-center">
						<div class="col-md-6 col-md-offset-3">						
						<div class="alert alert-danger" id="upload_progress">
						<p>File Uploading In progress please wait.....</p>
						</div>						
                        </div>
						</div>
						 </div>
                        <!-- /.panel-body -->
                    </div>
					<center>
					<a href="int_event_roster_data"  class='btn btn-primary'><i class="fa fa-arrow-circle-left fa-fw"></i> BACK</a>
					<button type="submit" class="btn btn-primary" name="next" id="next" disabled >NEXT <i class="fa fa-arrow-circle-right fa-fw"></i> </button>
					</center>
						</form>
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
   <script type="text/javascript">
    $(document).ready(function(){
    $("#file").change(function(){
		var a = $(this).val();
         if (a !== "")
		 {
			 $('#next').removeAttr('disabled');
		 }
 });
 $("#next").click(function(){
		 $('#file').hide();
		 $('#upload_progress').show();
 });
});
	</script>

</body>

</html>
<?php
$uploadedStatus = 0;
if(isset($_POST['next'])){

if ( isset($_FILES["file"])) {
//if there was an error uploading the file
if ($_FILES["file"]["error"] > 0) {
echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
}
else {
if (file_exists($_FILES["file"]["name"])) {
unlink($_FILES["file"]["name"]);
}
$dir_name = "rosterfiles";
$storagename = $country.$gender."rosterfile.xlsx";
$location = $dir_name."/".$storagename;
move_uploaded_file($_FILES["file"]["tmp_name"],  $location);
$uploadedStatus = 1;

if($uploadedStatus == 1)
{
try {
	$objPHPExcel = PHPExcel_IOFactory::load($location);
} catch(Exception $e) {
	die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
}
$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
$arrayCount = count($allDataInSheet);	
for($i=2;$i<=$arrayCount;$i++){
$playerName = trim($allDataInSheet[$i]["A"]);
$playerHeight = trim($allDataInSheet[$i]["B"]);
$playerWeight = trim($allDataInSheet[$i]["C"]);
$playerBloodg = trim($allDataInSheet[$i]["D"]);
$playerJersey = trim($allDataInSheet[$i]["E"]);
$playerdob = trim($allDataInSheet[$i]["F"]);
$playerPosition = trim($allDataInSheet[$i]["G"]);
$playerPassport = trim($allDataInSheet[$i]["H"]);
$playerAddress = trim($allDataInSheet[$i]["I"]);
$playerAssociation = trim($allDataInSheet[$i]["J"]);
$playerEmail = trim($allDataInSheet[$i]["K"]);
$playerImage = trim($allDataInSheet[$i]["L"]);
$insertBulkPlayer = $form->insert_player_in_bulk($playerName,$playerHeight,$playerWeight,$playerBloodg,$playerJersey,$playerdob,$playerPosition,$playerPassport,$playerAddress,$playerAssociation,$playerEmail,$playerImage,$country,$gender,$event,$roster_id);
}
if ($insertBulkPlayer == 1) 
			{
				echo"<script>alert('Players added successfully');</script>";
				header("refresh:0;url=int_event_create_roster_off?eve=$eve&rid=$roster_id_enc&cou=$cou&gen=$gen&lev=$lev");
			} 
else 
			{
				echo"<script>alert('Error creating roster');</script>";
				header("refresh:0;url=int_event_roster_data_main");
			}
}
}
} 
else 
{
echo "<script>alert('No file selected');</script>";
}

}
?>
