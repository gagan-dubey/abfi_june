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

        <div id="page-wrapper"></br>
		                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                           <b> Event Creator</b>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
		
		<hr>
		<center><a href="event_creator"><button type="button" class="btn btn-primary "><i class="fa fa-plus-circle fa-fw"></i> CREATE NEW EVENT</button></a>
		<a href="forthcoming_event_creator"><button type="button" class="btn btn-primary "><i class="fa fa-caret-square-o-right fa-fw"></i> CREATE FORTHCOMING EVENT</button></a>
		</center><hr></div></div><hr>

            <!-- /.row -->
           <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-info">
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
										<th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
								
						<?php
                         $a = new db_functions();
						 $status = new abfi_admin();
						 $sql = "Select * from abfi_tour_create where event_status in ('0','1','2') order by id DESC";
						 $result = $a->extract($sql);
						  if (mysqli_num_rows($result) > 0) {
							// output data of each row
							while($row = mysqli_fetch_assoc($result)) {
								$a =$row["event_name"];
								$b =$row["event_organizer"];
								$c =$row["event_dates"];
								$d =$row["event_venue"];
								$e = base64_encode($row["sec_event_id"]);
								$f = $status->get_event_type($row["event_type"]);
								$g = $status->get_event_level($row["event_level"]);
								$h =$status->get_event_status($row["event_status"]);
							echo "	 <tr class='gradeA'>
                                        <td>$a</td>
										<td>$b</td>
                                        <td>$c</td>
										<td>$d</td>
										<td>$f</td>
										<td>$g</td>
										<td>$h</td>
                                        <td><a href='event_dets?evt=$e' class='btn btn-sm btn-primary'><i class='fa fa-eye fa-fw'></i> View Details</a></td>
                                        
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
           
		  <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading text-center">
                           <b> Forthcoming Event Table</b>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example2">
                                <thead>
                                    <tr>
                                        <th>Event Name</th>
										<th>Dates</th>
										<th>Venue</th>
										<th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
								
						<?php
                         $a = new db_functions();
						 $sql = "Select * from abfi_forth_event order by id DESC";
						 $result = $a->extract($sql);
						  if (mysqli_num_rows($result) > 0) {
							// output data of each row
							while($row = mysqli_fetch_assoc($result)) {
								$a =$row["event_name"];
								$c =$row["event_date"];
								$d =$row["event_venue"];
								$e = base64_encode($row["sec_eve_id"]);
					
							echo "	 <tr class='gradeA'>
                                        <td>$a</td>
                                        <td>$c</td>
										<td>$d</td>
                                        <td><a href='fevent_dets?evt=$e' class='btn btn-sm btn-primary'><i class='fa fa-eye fa-fw'></i> View Details</a></td>
                                        
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
   <script>
    $(document).ready(function() {
        $('#dataTables-example2').DataTable({
        responsive: true,
		paging:   false,
        ordering: false,
        info:     false,
		searching: false
        });
    });
    </script>

</body>

</html>
