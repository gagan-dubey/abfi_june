<?php require_once('../abfi_all_inc/Classes/include_all_min.php'); ?>
<?php confirm_slogged_in();?>
<?php confirm_session_svalid();?>
<?php 
$state = base64_decode($_GET["sta"]);
$event =base64_decode($_GET["eve"]);
$gender = base64_decode($_GET["gen"]);
$player = base64_decode($_GET["ply"]);
$gender1 = $_GET["gen"];
$event1 = $_GET["eve"];
$roster1 = $_GET["rid"];
$state1 = $_GET["sta"];
$form = new abfi_use();
?>
<!DOCTYPE html>
<html lang="en">

<head>
   
<title>Home | ABFI Admin</title>
<?php include('adm_includes/header.php');?>
 <style>
 label{margin-top:7px; color:#757575;}
 
 </style>
 
</head>

<body>

    <div id="wrapper">

       <?php include('adm_includes/nav.php');?>

        <div id="page-wrapper">

            <!-- /.row -->
           <div class="row"></br>
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading text-center">
                           <b> Roster Detail (Players) - <?php echo $form->get_state_name($state);?> </br> <?php echo $form->get_event_name($event);?></b>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
								<hr>
								<div class='row'>
								<?php 
								$roster =base64_decode($_GET["rid"]);
									$sql1 = "SELECT a.player_reg_id AS reg_id, b.full_name AS name, b.status as actv, b.father_name AS father, b.dob AS dob, b.ply_img as image, a.status as status FROM abfi_roster_create AS a
											INNER JOIN abfi_ply_reg AS b ON a.player_reg_id = b.ply_reg_id where b.status = '0' and a.roster_id = '$roster' and a.event_id = '$event' and a.state='$state' and a.player_reg_id='$player'";
									$result1 = $form->extract($sql1);
										if (mysqli_num_rows($result1) > 0) {
						// output data of each row
						while($row = mysqli_fetch_assoc($result1)) {
						        $a =$row["reg_id"];
								$b =$row["name"];
								$c =$row["father"];
						        $d =$row["dob"]; 
								$e =$row["image"];
								$button_status =$row["status"];
								echo" <div class='col-md-12'>
									<div class='col-md-4'>
									<center><img src='../abf_use/off_reg_imgs/$e' class='img-rounded' width='130' height='130'></center>
									</div>
									<div class='col-md-8'>
											<div class='row'>
											<div class='col-md-3'><label>Reg. ID</label></div>
											<div class='col-md-8'><label>$a</label></div>
											</div>
											<div class='row'>
											<div class='col-md-3'><label>Name</label></div>
											<div class='col-md-9'><label>$b</label></div>
											</div>
											
											<div class='row'>
											<div class='col-md-3'><label>Father</label></div>
											<div class='col-md-9'><label>$c</label></div>
											</div>
											
											<div class='row'>
											<div class='col-md-3'><label>D.O.B.</label></div>
											<div class='col-md-8'><label>$d</label></div>
											</div>
											
									<hr>
									</div>
									</div>"; 
						
						}
						} else {
						echo "0 results";
								}
									?>
						</div><hr>			
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
					
			
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           
        </div>
        <!-- /#page-wrapper -->
		
		  <!-- /.row -->
           <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
						<b> Players Data - <?php echo $form->get_state_name($state);?> </b> 
                        </div>
                        <!-- /.panel-heading -->
						<form method="post" action="" onsubmit="return confirm('Do you really want to replace this player?');">
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
									    <th>Reg. ID</th>
                                        <th>Name</th>
										<th>Father Name</th>
                                        <th>Gender</th>
										 <th>Age</th>
                                        <th>Position</th>
										<th>Select</th>
                                    </tr>
                                </thead>
                                <tbody>
								
						<?php
						$ply_dets = new abfi_use();
						$ply_state_dets = $ply_dets->get_player_dets_gender($state,$gender);
						
						if (mysqli_num_rows($ply_state_dets) > 0) {
						// output data of each row
						while($row = mysqli_fetch_assoc($ply_state_dets)) {
							//print_r($row);
						        $a =$row["ply_reg_id"];
								$b =$row["full_name"];
								$c =$row["father_name"];
								$d =$ply_dets->get_gender($row["gender"]);
								$e =$row["position"];
								$f =base64_encode($row["ply_sec_reg_id"]);
								$g =$row["dob"];
								$year =substr($g,6);
								$month =substr($g,-7,2);
								$day =substr($g,-10,2);
								$full =$month.'/'.$day.'/'.$year;
								$g1 =date_create($full);
								$g2 = date_format($g1,'Y-m-d H:i:s');
								$today = date("Y-m-d H:i:s");
								$to_time = strtotime($today);
								$from_time = strtotime($g2);
								$diff = round(abs($to_time - $from_time));
								$g3 = floor($diff/(365*24*3600));
								
								
									echo "<tr class='gradeA'>
                                        <td>$a</td>
										<td>$b</td>
                                        <td>$c</td>
										<td>$d</td>
										<td>$g3</td>
										<td>$e</td>
                                        <td><input type='radio' value='$a' name='ply_id'></td>
                                        
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
					<a href='<?php echo "edit_roster?eve=$event1&rid=$roster1&sta=$state1&gen=$gender1";?>'  class='btn btn-danger'><i class="fa fa-times-circle fa-fw"></i> Cancel</a>
					<button type="submit" class="btn btn-success" name="preplace" >Replace <i class="fa fa-check-circle fa-fw"></i> </a>
					</center>
					<hr>
						</form>
                    <!-- /.panel -->
					<?php
						
						if(isset($_POST["preplace"]))
						{
							$rpid = $player;
							$newpid = $_POST["ply_id"];
							$reprosterid = base64_decode($_GET["rid"]);
							$neweventid = $event;
							$newgen = $gender;
							
							if(!empty($newpid))
							{
								
								
								$replace_query = "UPDATE abfi_roster_create set player_reg_id='$newpid' where player_reg_id='$rpid' and roster_id='$reprosterid' and event_id='$neweventid' and gender='$newgen'";
								$newreplacement = $form->extract($replace_query);
								
								if ($roster) 
			{
				echo"<script>alert('Players replaced successfully');</script>";
				header("refresh:0;url=edit_roster?eve=$event1&rid=$roster1&sta=$state1&gen=$gender1");
			} 
					else 
			{
				echo"<script>alert('Error creating roster');</script>";
			}
							}
							
							else {
								echo"<script>alert('Kindly select a player....');</script>";
							}
						}
					?>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
		
		
		 </div>

    </div>
	
    <!-- /#wrapper -->

	 <?php include('adm_includes/footer.php');?>
   

</body>

</html>
