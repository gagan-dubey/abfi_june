<?php require_once('../abfi_all_inc/Classes/include_all_min.php'); ?>
<?php 
$form = new abfi_use();
$event =base64_decode($_GET["eve"]);
?>
 <?php
 $sql101 = "DELETE int_roster_ply FROM int_roster_ply LEFT JOIN int_roster_offc
		ON int_roster_ply.roster_id =int_roster_offc.roster_id WHERE int_roster_offc.roster_id IS NULL";
		$result101 = $form->extract($sql101);
		if($result101)
		{
			
		}
		else
		{
			header("refresh:0;url=index");
		}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
   
<title>Home | ABFI Admin</title>
<?php include('adm_includes/header.php');?>
<style>
	#edu_one,#gender
	{
      display:none;    	
	}
	
	</style>
 
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
                           <b> International Roster List </b>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Event Name</th>
                                        <th>Gender</th>
										<th>Players</th>
										<th>Officials</th>
										<th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
								
						<?php
						$roster = $form->get_international_roster($event);
						
						if (mysqli_num_rows($roster) > 0) {
						// output data of each row
						while($row = mysqli_fetch_assoc($roster)) {
						        $a =$row["event_name"];
								$a1 =base64_encode($row["event"]);
								$b =$row["players"];
								$d =$row["officials"];
								$c =$form->get_gender($row["gender"]);	
								$e =$row["status"];
								//$e1 =$form->get_roster_status($row["status"]);
								$f =base64_encode($row["state"]);
								$g =base64_encode($row["roster"]);
								if($b==0 || $a == null)
								{
									//echo "No results found.";
								}
								
								else{
								echo "	 <tr class='gradeA'>
                                        <td>$a</td>
										<td>$c</td>
                                        <td>$b</td>
										<td>$d</td>
                                        <td><a href='roster_view_international?eve=$a1&rid=$g' class='btn btn-sm btn-primary'><i class='fa fa-eye fa-fw'></i> View Details</a></td>
                                        
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
	  <script type="text/javascript">
    $(function () {
        $("#event").change(function () {
            var selectedText = $(this).find("option:selected").text();
            var selectedValue = $(this).val();
			
			if(selectedValue == '')
			{ 
		
			$("#edu_one").hide();
			$("#gender").hide();
		
			}
	
			else 
			{
		
			$("#gender").show();
			
			}
        });
    });
	
	
</script>
   
   <script type="text/javascript">
    $(function () {
        $("#gender").change(function () {
            var selectedText = $(this).find("option:selected").text();
            var selectedValue = $(this).val();
			
			if(selectedValue == '')
			{ 
		
			$("#edu_one").hide();
			
		
			}
	
			else 
			{
		
			$("#edu_one").show();
			
			}
        });
    });
	
	
</script>

</body>

</html>
<?php

if(isset($_POST["create"]))
{
	$gender = base64_encode($_POST["gender"]);
	$event = base64_encode($_POST["event"]);
	$level = base64_encode($_POST["level"]);
	$event1 = $_POST["event"];
	$gender1 = $_POST["gender"];
	
	if(empty($gender) || empty($event))
	{
		echo "<script> alert('Missing Fields'); </script>";
	    header("refresh:0;url=roster_data_tbl");
	}
	
	else
	{
		$sql3 = "select distinct event_id,gender from int_roster_ply where event_id='$event1' and gender='$gender1'";
		$info = $form->extract($sql3);
		if (mysqli_num_rows($info) > 0) {
			
			while($row = mysqli_fetch_assoc($info)) {
				$a = $row["event_id"];
				$b = $row["gender"];
			}	
		}
		
		if($a == $event1 && $b == $gender1)
		{
			echo "<script> alert('Event already exists..'); </script>";
			header("refresh:0;url=int_roster_data");
		}
		
		else
		{
			header("refresh:0;url=create_roster?eve=$event&gen=$gender&lev=$level");
		}
		
	}
}

?>

