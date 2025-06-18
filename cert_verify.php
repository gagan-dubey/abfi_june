<?php require_once('abfi_all_inc/Classes/outside.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Home | Amateur Baseball Federation of India | THE OFFICIAL SITE OF INDIAN BASEBALL</title>
<?php include('includes/header.php');?>

	
</head>
<body>
<div id="outer_m">
<?php include('includes/nav.php');?>
<div id="main">

<div id="stickleft">
<i class="fa fa-facebook-square" style="font-size:32px; margin-left:2px; cursor:pointer; color:#022a5e;"></i>
<i class="fa fa-youtube-square" style="font-size:32px; margin-left:2px; cursor:pointer;  color:#022a5e;"></i>
<i class="fa fa-twitter-square" style="font-size:32px; margin-left:2px; cursor:pointer; color:#022a5e;"></i>
<i class="fa fa-linkedin-square" style="font-size:32px; margin-left:2px; cursor:pointer; color:#022a5e;"></i>
</div>




<div id="outer">
<div id="icard_out" style="padding-left:10px; padding-right:10px;">
<center><h3 class="hea3ding3">VERIFY CERTIFICATE</h3></center>
<hr>
<center>
<form method="POST" action="">
<div class="form-group">
    <input class="form-control" type="text" placeholder="Certificate Number" name="cnumber" required>
</div>
<div class="form-group">	
    <select name="ctype" class="form-control" required>
	<option disabled="" selected="">--Select Type--</option>
  <option value="ply">Player</option>
  <option value="offc">Official</option>
</select>
</div>
<hr>
   <input type="submit" name="submit" class="btn btn-primary" value="VERIFY" data-toggle="modal" data-target="#myModal">
</form>
</center>

</div>
</div>



</div>
</div>

<?php
if(isset($_POST['submit']))
{
	$a= $_POST['cnumber'];
	if(empty($a))
	{
		echo"<script>alert('Kindly fill all the feilds first.');</script>";
	}
	
	else
	{
		if(!isset($_POST['ctype']))
		{
			echo"<script>alert('Kindly select a type first.');</script>";
		}
		
		else
		{
			$b = $_POST['ctype'];
			if($b == "ply")
			{
				$cert = new outside_func();
				$result = $cert->cert_verify($a);
				if ($result->num_rows == 1) {
						
        while($row = $result->fetch_assoc()) {
		echo "<div class='container'><div class='row'><div class='col-md-4 col-md-offset-4 text-center'><div class='alert alert-success'><strong>Success!</strong> This certificate is Verified.";
		echo" <div class='list-group'>";	
        echo "<a href='#' class='list-group-item'>"."Certificate Number : ".$row["certificate"]."</a>";
		echo "<a href='#' class='list-group-item'>"."Player Name : ".$row["player"]."</a>";
		echo "<a href='#' class='list-group-item'>"."Date Of Birth : ".$row["dob"]."</a>";
		echo "<a href='#' class='list-group-item'>"."Father Name : ".$row["father"]."</a>";
		echo "<a href='#' class='list-group-item'>"."Event Name : ".$row["event_name"]."</a>";
		echo"</div></div></div></div></div>";
		}	
	
} else {
    echo "<div class='container'><div class='row'><div class='col-md-4 col-md-offset-4 text-center'><div class='alert alert-danger'><strong>Invalid!</strong> This certificate is not Verified.</div></div></div></div>";
}
			}
			
			elseif($b == "offc")
			{
				$cert = new outside_func();
				$result = $cert->cert_verify_offc($a);
				if ($result->num_rows == 1) {
			
        while($row = $result->fetch_assoc()) {
		echo "<div class='container'><div class='row'><div class='col-md-4 col-md-offset-4 text-center'><div class='alert alert-success'><strong>Success!</strong> This certificate is Verified.";
		echo" <div class='list-group'>";	
        echo "<a href='#' class='list-group-item'>"."Certificate Number : ".$row["certificate"]."</a>";
		echo "<a href='#' class='list-group-item'>"."Official Name : ".$row["official"]."</a>";
		echo "<a href='#' class='list-group-item'>"."Date Of Birth : ".$row["dob"]."</a>";
		echo "<a href='#' class='list-group-item'>"."Father Name : ".$row["father"]."</a>";
		echo "<a href='#' class='list-group-item'>"."Event Name : ".$row["event_name"]."</a>";
		echo"</div></div></div></div></div>";
		}
} else {
    echo "<div class='container'><div class='row'><div class='col-md-4 col-md-offset-4 text-center'><div class='alert alert-danger'><strong>Invalid!</strong> This certificate is not Verified.</div></div></div></div>";
}
			}
			
			else
			{
				echo "<div class='container'><div class='row'><div class='col-md-4 col-md-offset-4 text-center'><div class='alert alert-warning'><strong>Warning!</strong> Do not try to temper with this website.</div></div></div></div>";
			}
		}
	}
}
?>


</div>


<footer>
<?php include('includes/footer.php');?>
</footer>

</div>
</body>
</html>