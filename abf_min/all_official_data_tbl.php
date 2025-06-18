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
		                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                           <b> Fedration Official (FO) Registration</b>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
		
		
		<center><a href="add_official.php"><button type="button" class="btn btn-primary "><i class="fa fa-plus-square fa-fw"></i> Register Official</button></a>
		</center></div></div></br>
            <!-- /.row -->
           <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <b> Officials Data - State wise</b>
						   <div class="pull-right img768"><a href="export_offc"><i class="fa fa-file-excel-o fa-fw"></i> Export All Officials Data</a></div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>State</th>
                                        <th>Total Officials</th>
                                        <th>Actions</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
								
						<?php
                         $all = new abfi_admin();
					     $all_offc_data = $all->count_all_off();
						  if (mysqli_num_rows($all_offc_data) > 0) {
							// output data of each row
							while($row = mysqli_fetch_assoc($all_offc_data)) {
								$a =$row["total_offc"];
								$b =$row["state"];
								$c =base64_encode($row["ostate"]);
					
							echo "	 <tr class='gradeA'>
                                        <td>$b</td>
										<td>$a</td>
  
                                        <td><a href='state_official_data_tbl?ofst=$c' class='btn btn-sm btn-primary'><i class='fa fa-eye fa-fw'></i> View All</a></td>
                                        
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
