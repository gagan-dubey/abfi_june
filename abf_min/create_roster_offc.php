<?php require_once('../abfi_all_inc/Classes/include_all_min.php'); ?>
<?php confirm_logged_in();?>
<?php confirm_session_valid();?>
<?php 
$state = "INDIA";
$eve = $_GET["eve"];
$roster =base64_decode($_GET["rid"]);
$event =base64_decode($_GET["eve"]);
$form = new abfi_use();
?>
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
						<b> Officials Data - All States </b> 
                        </div>
                        <!-- /.panel-heading -->
						<form method="post" action="">
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
									    <th>Reg. ID</th>
                                        <th>Name</th>
                                        <th>Position</th>
										<th>Select</th>
                                    </tr>
                                </thead>
                                <tbody>
								
						<?php
						$ply_dets = new abfi_use();
						$ply_state_dets = $ply_dets->get_all_officials_india();
						
						if (mysqli_num_rows($ply_state_dets) > 0) {
						// output data of each row
						while($row = mysqli_fetch_assoc($ply_state_dets)) {
						        $a =$row["offc_reg_id"];
								$b =$row["full_name"];
								$e =$form->get_offc_name($row["position"]);
								$f =base64_encode($row["offc_sec_reg_id"]);
								echo "	 <tr class='gradeA'>
                                        <td>$a</td>
										<td>$b</td>
										<td>$e</td>
                                        <td><input type='checkbox' value='$a' name='ply_id[]'></td>
                                        
                                    </tr>";
						}
						} else {
						echo "0 results";
								}
						?>
                                   
                             
                                </tbody>
                            </table>
                           
                        </div>
						
                        <!-- /.panel-body -->
                    </div>
					<center>
					<a href="roster_data_tbl.php"  class='btn btn-primary'><i class="fa fa-arrow-circle-left fa-fw"></i> BACK</a>
					<button type="submit" class="btn btn-primary" name="next" >NEXT <i class="fa fa-arrow-circle-right fa-fw"></i> </a>
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
   

</body>

</html>
<?php
if(isset($_POST['next'])){
if(!empty($_POST['ply_id'])){
$roster_id = $roster;
foreach($_POST['ply_id'] as $selected){

$enc_roster_id = base64_encode($roster_id);
$status = 0;
$sql = "INSERT INTO int_roster_offc(off_reg_id,roster_id,event_id,state,status) VALUES ('$selected','$roster_id','$event','$state','$status')";
$roster1 = $form->extract($sql);
}
if ($roster1) 
			{
				echo"<script>alert('Officials added successfully');</script>";
				header("refresh:0;url=roster_view_international?eve=$eve&rid=$enc_roster_id");
			} 
else 
			{
				echo"<script>alert('Error creating roster');</script>";
			}


}
}
?>
