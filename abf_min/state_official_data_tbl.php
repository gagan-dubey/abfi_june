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
            <!-- /.row -->
           <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                           <b> Officials Data - State Name</b>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Reg. ID</th>
                                        <th>Name</th>
										<th>Father Name</th>
										<th>Official Type</th>
										<th>Position</th>
                                        <th>Actions</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
								
						<?php
						
						$offc_dets = new abfi_admin();
						$state = base64_decode($_GET['ofst']);
						$offc_state_dets = $offc_dets->get_offc_dets($state);
						
						if (mysqli_num_rows($offc_state_dets) > 0) {
						// output data of each row
						while($row = mysqli_fetch_assoc($offc_state_dets)) {
						        $a =$row["offc_reg_id"];
								$b =$row["full_name"];
								$c =$row["father_name"];
								$d =$offc_dets->get_gender($row["gender"]);
								$e =$offc_dets->get_offc_name($row["position"]);
								$f =base64_encode($row["offc_sec_reg_id"]);
								echo "	 <tr class='gradeA'>
                                        <td>$a</td>
										<td>$b</td>
                                        <td>$c</td>
										<td>$d</td>
										<td>$e</td>
                                        <td><a href='detail_view_official?secid=$f' class='btn btn-sm btn-primary'><i class='fa fa-eye fa-fw'></i> View Details</a></td>
                                        
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
