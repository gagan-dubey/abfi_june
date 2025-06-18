<?php require_once('../abfi_all_inc/Classes/include_all_min.php'); ?>
<?php confirm_slogged_in();?>
<?php confirm_session_svalid();?>
<?php 
$form = new abfi_admin();
//$state = 109;
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
 </br>

            <!-- /.row -->
           <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                           <b> Rosters - Event Wise</b>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Event Name</th>
										<th>Roster Count </th>
										<th>Event Status</th>
										<th>Event Type</th>
										<th>Event Level</th>
										 <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
								
						<?php
						$roster = $form->get_roster_by_event();
						
						if (mysqli_num_rows($roster) > 0) {
						// output data of each row
						while($row = mysqli_fetch_assoc($roster)) {
						        $a =$row["eid"];
								$a1 =base64_encode($row["eid"]);
								$b = $row["event"];
								$c = $row["roster_num"];
								$d = $form->get_event_status($row["status"]);
								$e = $form->get_event_type($row["type"]);
								$f = $form->get_event_level($row["level"]);
								if($a == null)
								{
									//echo "No results found.";
								}
								
								else{
								echo "	 <tr class='gradeA'>
                                        <td>$b</td>
										<td>$c</td>
										<td>$d</td>
										<td>$e</td>
										<td>$f</td>
                                        <td><a href='roster_data_tbl?eve=$a1' class='btn btn-sm btn-primary'><i class='fa fa-eye fa-fw'></i> View Details</a></td>
                                        
                                    </tr>";
						}}
						} else {
						//echo "0 results";
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

