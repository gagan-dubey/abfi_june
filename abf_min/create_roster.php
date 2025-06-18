<?php require_once('../abfi_all_inc/Classes/include_all_min.php'); ?>
<?php confirm_logged_in();?>
<?php confirm_session_valid();?>
<?php 
$state = "INDIA";
$eve = $_GET["eve"];
$gender =base64_decode($_GET["gen"]);
$event =base64_decode($_GET["eve"]);
$level =base64_decode($_GET["lev"]);
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
						<b> Players Data - All States</b> 
                        </div>
                        <!-- /.panel-heading -->
						<form method="post" action="">
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
						$ply_state_dets = $ply_dets->get_player_dets_gender_all($gender);
						
						if (mysqli_num_rows($ply_state_dets) > 0) {
						// output data of each row
						while($row = mysqli_fetch_assoc($ply_state_dets)) {
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
								
								if($level == "LL")
								{
									if($g3 < 13)
									{
								echo "	 <tr class='gradeA'>
                                        <td>$a</td>
										<td>$b</td>
                                        <td>$c</td>
										<td>$d</td>
										<td>$g3</td>
										<td>$e</td>
                                        <td><input type='checkbox' value='$a' name='ply_id[]'></td>
                                        
                                    </tr>";}}
									
										elseif($level == "SJ")
								{
									if($g3 >= 13 && $g3 < 15)
									{echo "	 <tr class='gradeA'>
                                        <td>$a</td>
										<td>$b</td>
                                        <td>$c</td>
										<td>$d</td>
										<td>$g3</td>
										<td>$e</td>
                                        <td><input type='checkbox' value='$a' name='ply_id[]'></td>
                                        
								</tr>";}}
								
								elseif($level == "JL")
								{
									if($g3 >= 15 && $g3 < 17)
									{echo "	 <tr class='gradeA'>
                                        <td>$a</td>
										<td>$b</td>
                                        <td>$c</td>
										<td>$d</td>
										<td>$g3</td>
										<td>$e</td>
                                        <td><input type='checkbox' value='$a' name='ply_id[]'></td>
                                        
								</tr>";}}
								
								elseif($level == "SL")
								{
									if($g3 >= 17)
									{echo "	 <tr class='gradeA'>
                                        <td>$a</td>
										<td>$b</td>
                                        <td>$c</td>
										<td>$d</td>
										<td>$g3</td>
										<td>$e</td>
                                        <td><input type='checkbox' value='$a' name='ply_id[]'></td>
                                        
								</tr>";}}
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
					<a href="int_roster_data_tbl"  class='btn btn-primary'><i class="fa fa-arrow-circle-left fa-fw"></i> BACK</a>
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
	
$random_id = rand(10,1000);	

foreach($_POST['ply_id'] as $selected){

$roster_id = "IND-roster" . $random_id;
$status = 0;
$enc_roster_id = base64_encode($roster_id);
$sql = "INSERT INTO int_roster_ply(player_reg_id,roster_id,event_id,state,gender,status) VALUES ('$selected','$roster_id','$event','$state','$gender','$status')";
$roster = $form->extract($sql);
}
if ($roster) 
			{
				echo"<script>alert('Players added successfully');</script>";
				header("refresh:0;url=create_roster_offc?eve=$eve&rid=$enc_roster_id");
			} 
else 
			{
				echo"<script>alert('Error creating roster');</script>";
			}


}
}
?>
