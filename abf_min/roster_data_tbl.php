<?php require_once('../abfi_all_inc/Classes/include_all_min.php'); ?>
<?php confirm_slogged_in();?>
<?php confirm_session_svalid();?>
<?php 
$form = new abfi_admin();
$event =base64_decode($_GET["eve"]);
//$state = 109;
 ?>
<?php if(empty($event))
{
header('Location: roster_data');
}	
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
                           <b> Rosters - State Wise</b>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Event Name</th>
										<th>State</th>
                                        <th>Gender</th>
										<th>Player Count</th>
										<th>Officials Count</th>
                                         <th>Status</th>
										 <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
								
						<?php
						$roster = $form->get_state_roster($event);
						
						if (mysqli_num_rows($roster) > 0) {
						// output data of each row
						while($row = mysqli_fetch_assoc($roster)) {
						        $a =$row["event_name"];
								$a1 =base64_encode($row["event"]);
								$b =$row["players"];
								$d =$row["officials"];
								$c =$form->get_gender($row["gender"]);
								$c1=base64_encode($row["gender"]);									
								$e =$row["status"];
								$e1 =$form->get_roster_status($row["status"]);
								$f =base64_encode($row["state"]);
								$g =base64_encode($row["roster"]);
								$h =$form->get_state_name($row["state"]);
								$h1 =base64_encode($row["state"]);
								if($b==0 || $a == null)
								{
									//echo "No results found.";
								}
								
								else{
								echo "	 <tr class='gradeA'>
                                        <td>$a</td>
										<td>$h</td>
										<td>$c</td>
                                        <td>$b</td>
										<td>$d</td>
										<td>$e1</td>
                                        <td><a href='roster_view?eve=$a1&rid=$g&sta=$h1&gen=$c1' class='btn btn-sm btn-primary'><i class='fa fa-eye fa-fw'></i> View Details</a></td>
                                        
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

