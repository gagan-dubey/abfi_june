<?php require_once('../abfi_all_inc/Classes/include_all_min.php'); 
$state = $_SESSION["state"];
$ply_dets = new abfi_use();
?>
<?php confirm_logged_in();?>
<?php confirm_session_valid();?>
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
		                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                           <b> Player Registration - <?php echo $ply_dets->get_state_name($state);?></b>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
		
		
		<center><a href="add_player.php"><button type="button" class="btn btn-primary "><i class="fa fa-plus-circle fa-fw"></i> Register New Player</button></a>
		</center></div></div></br>
            <!-- /.row -->
           <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                           <b> Players Data - <?php echo $ply_dets->get_state_name($state);?></b>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Reg. ID</th>
                                        <th>Name</th>
										<th>Father Name</th>
										<th>Gender</th>        
										<th>Position</th>
                                        <th>Actions</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
								
						<?php
						
						$ply_state_dets = $ply_dets->get_player_dets($state);
						
						if (mysqli_num_rows($ply_state_dets) > 0) {
						// output data of each row
						while($row = mysqli_fetch_assoc($ply_state_dets)) {
						        $a =$row["ply_reg_id"];
								$b =$row["full_name"];
								$c =$row["father_name"];
								$d =$ply_dets->get_gender($row["gender"]);
								$e =$row["position"];
								$f =base64_encode($row["ply_sec_reg_id"]);
								echo "	 <tr class='gradeA'>
                                        <td>$a</td>
										<td>$b</td>
                                        <td>$c</td>
										<td>$d</td>
										<td>$e</td>
                                        <td><a href='detail_view_player?secid=$f' class='btn btn-sm btn-primary'><i class='fa fa-eye fa-fw'></i> View Details</a></td>
                                        
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

