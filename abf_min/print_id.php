<?php require_once('../abfi_all_inc/Classes/include_all_min.php'); ?>
<?php confirm_slogged_in();?>
<?php confirm_session_svalid();?>
<?php 
//$state = base64_decode($_GET["sta"]);
$event =base64_decode($_GET["eve"]);
$roster =base64_decode($_GET["rid"]);
$event1 =$_GET["eve"];
$roster1 =$_GET["rid"];
$form = new abfi_use();
?>
<!DOCTYPE html>
<html>
<head>
<html lang="en">
<head>
<link rel="icon" href="../images/favlogo.png" type="image/png" sizes="16x16">
<title>Home | ABFI | INDIA | ID-CARDS | PLAYERS</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap.min.css" rel="stylesheet" >
 <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" >
<link rel="stylesheet" href="../css/screen_layout_mega.css">
<link rel="stylesheet" media="only screen and (min-width:801px) and (max-width:1366px)" href="../css/screen_layout_large.css">
<link rel="stylesheet" media="only screen and (min-width:701px) and (max-width:800px)" href="../css/screen_layout_medium.css">
<link rel="stylesheet" media="only screen and (min-width:50px) and (max-width:700px)" href="../css/screen_layout_small.css">
   
<link href="https://fonts.googleapis.com/css?family=Ubuntu:700" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Slabo+27px|Ubuntu+Condensed|Yanone+Kaffeesatz" rel="stylesheet"> 
    <style>
        body {
            font-family: 'Lucida Sans Unicode', 'Lucida Console', sans-serif;
            padding: 0;
        }
    </style>
	
</head>
<body>
<div class="container">
<div>
<div style=" margin-top:5px; margin-left:510px" align="right" id="one">
<button class='print'><i class="fa fa-print fa-fw"></i> Print</button>
<a href='print_off_id?<?php echo"eve=$event1&rid=$roster1";?>'><button> Next <i class='fa fa-arrow-circle-right fa-fw'></i></button></a>
</div>
<div id="main">

<div id="roaster_main" style="margin-left:10px;">
<div class="row">
<div class="col-md-12" id="page">
<?php 
$sql1 = "SELECT a.player_reg_id AS reg_id, b.full_name AS name, b.father_name AS father, b.dob AS dob, b.ply_img as image, b.position as position, b.blood_group as blood, b.emergency_contct as econtact, a.status as status, c.event_dates as dates FROM int_roster_ply AS a
		INNER JOIN abfi_ply_reg AS b ON a.player_reg_id = b.ply_reg_id INNER JOIN abfi_tour_create as c ON a.event_id = c.sec_event_id where a.roster_id = '$roster' and a.event_id = '$event'";
$result1 = $form->extract($sql1);
if (mysqli_num_rows($result1) > 0) {
	while($row = mysqli_fetch_assoc($result1)) {
						        $a =$row["reg_id"];
								$b =strtoupper($row["name"]);
								$c =strtoupper($row["father"]);
						        $d =$row["dob"]; 
								$e =$row["image"];
								$f =strtoupper($row["position"]);
								$g =$row["blood"];
								$h =$row["econtact"];
								$i =$row["dates"];
								$j = substr($i,0,10);
echo"
<div id='icard_out1' style='margin-bottom:38px;' class='text-left'>
<div id='tp'><img src='../images/id_bk2.png'></div><div id='icard_out2'><center><img class='idlogo' src='../images/logo.png'></center>
<h6 class='headingid6'>Amateur Baseball Federation of India</h6>
<center><img class='idlogo' src='../abf_use/off_reg_imgs/$e' style='height:140px; width:120px; margin-top:0px; border:4px solid #022a5e;'></center>
<br>
<div style='margin-left:30px;'>
<div id='tbl1'><div id='tbl2'><label class='headingid7'>Name</label></div><div id='tbl3'>$b</div></div>
<div id='tbl1'><div id='tbl2'><label class='headingid7'>Reg. No.</label></div><div id='tbl3'>$a</div></div>
<div id='tbl1'><div id='tbl2'><label class='headingid7'>Position</label></div><div id='tbl3'>$f</div></div>
<div id='tbl1'><div id='tbl2'><label class='headingid7'>Blood Group</label></div><div id='tbl3'>$g</div></div>
<div id='tbl1'><div id='tbl2'><label class='headingid7'>Emerg. Cont.</label></div><div id='tbl3'>$h</div></div>
<div id='tbl1'><div id='tbl2'><label class='headingid7'>Validity</label></div><div id='tbl3'>$j</div></div>
<div id='tbl3'></div></div></div><div id='bt'><img src='../images/id_bk21.jpg'></div>
</div>";
}}
else 
{
echo "0 results";
}
?>
</div>
</div>
</div>


</div>


</div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/html2canvas.min.js"></script>
 <script>
	
	$('.print').on('click', function(){		
		html2canvas(document.body, {
	        onrendered: function(canvas) {
	        	
	        	$("#page").hide();
				$("#one").hide();
	            document.body.appendChild(canvas);
	            window.print();
	            $('canvas').remove();
	            $("#page").show();
				$("#one").show();
				
	        }
	    });
	    
	});
	
	</script>
</body>
</html>