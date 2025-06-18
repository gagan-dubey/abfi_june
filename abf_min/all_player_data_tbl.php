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
                        <div class="panel-heading">
                           <b> Players Data - State wise</b>
						   <div class="pull-right img768"><a href="export_ply"><i class="fa fa-file-excel-o fa-fw"></i> Export All Players Data</a></div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>State</th>
										<th>Gender</th>
                                        <th>Total Players</th>
										<th>Actions</th>
							
                                    </tr>
                                </thead>
                                <tbody>
								
						<?php
                         $all = new abfi_admin();
					     $all_ply_data = $all->count_all_ply();
						  if (mysqli_num_rows($all_ply_data) > 0) {
							// output data of each row
							while($row = mysqli_fetch_assoc($all_ply_data)) {
								$a =$row["total_play"];
								$b =$row["state"];
								$c = $all->get_gender($row["gender"]);
								$d =$row["pstate"];
								$a1 =base64_encode($row["total_play"]);
								$b1 =base64_encode($row["state"]);
								$c1 = base64_encode($row["gender"]);
								$d1 =base64_encode($row["pstate"]);
					
							echo "	 <tr class='gradeA'>
                                        <td>$b</td>
										<td>$c</td>
                                        <td>$a</td>
										
                                        <td><a href='state_player_data_tbl?stco=$d1&gnr=$c1&stna=$b1' class='btn btn-sm btn-primary'><i class='fa fa-eye fa-fw'></i> View All</a></td>
                                        
                                    </tr>";
							}
						} else {
							//echo "No Players have been registered yet.";
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
