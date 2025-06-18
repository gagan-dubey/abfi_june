<?php require_once('../abfi_all_inc/Classes/include_all_min.php'); ?>
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

        <div id="page-wrapper"></br>
		                   
            <!-- /.row -->
           <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                           <b> Event Table</b>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Event Name</th>
                                        <th>Organiser</th>
										<th>Dates</th>
										<th>Venue</th>
										<th>Type</th>
										<th>Level</th>
										<th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
								
						<?php
                         $a = new db_functions();
						 $sql = "Select * from abfi_tour_create where event_status in ('0','1','2') order by id DESC";
						 $status = new abfi_admin();
						 $result = $a->extract($sql);
						  if (mysqli_num_rows($result) > 0) {
							// output data of each row
							while($row = mysqli_fetch_assoc($result)) {
								$a =$row["event_name"];
								$b =$row["event_organizer"];
								$c =$row["event_dates"];
								$d =$row["event_venue"];
								$f=$status->get_event_level($row["event_level"]);
								$e =$status->get_event_status($row["event_status"]);
								$g = $status->get_event_type($row["event_type"]);
							echo "<tr class='gradeA'>
                                        <td>$a</td>
										<td>$b</td>
                                        <td>$c</td>
										<td>$d</td>
										<td>$g</td>
										<td>$f</td>
                                        <td>$e</td>
                                        
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
