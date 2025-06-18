<!DOCTYPE html>
<html>
<head>
<?php include('includes/header.php');?>
		<title>Thank You | Amateur Baseball Federation of India | THE OFFICIAL SITE OF INDIAN BASEBALL</title>
			<style>

				a, a:active { text-decoration: none }
		#address{background-color:rgba(000,00,000,0.9); color:white; width:100%; margin:auto; box-shadow:0px 0px 5px black;}
		label{font-family: 'Josefin Sans', sans-serif;}
		.contact_us_main
		{	text-align:center;
			color:black;
		}
		.contact_us_phone , .contact_us_fullname ,.contact_us_email 
		{	height:30px; width:200px;  border:1px solid #b7b7b7;
			transition:0.3s all; -webkit-transition:0.3s all; -moz-transition:0.3s all; -o-transition:0.3s all;
			-ms-transition:0.3s all; padding:5px;
		}
		.contact_us_message
		{	width:200px; 
			border:1px solid #b7b7b7;
			height:70px; transition:0.3s all; -webkit-transition:0.3s all; -moz-transition:0.3s all; -o-transition:0.3s all;
			-ms-transition:0.3s all;
		}
		.contact_us_phone:hover , .contact_us_fullname:hover ,.contact_us_email:hover , .contact_us_message:hover
		{box-shadow:0px 0px 10px #b7b7b7;}
		.contact_p{font-family: 'Josefin Sans', sans-serif; padding:10px;}

		.contact_us_btn{height:40px; width:100px; border:1px solid #b7b7b7; background-color:#c2c2c2;
		 transition:0.3s all; -webkit-transition:0.3s all; -moz-transition:0.3s all; -o-transition:0.3s all;
			-ms-transition:0.3s all;}
		.contact_us_btn:hover{background-color:#ebebeb;}

		#message{height:170px; width:100%;}
		</style>
			<script> 
		function check()
		{
			if(document.form1.contact_us_fullname.value=="")
		  {
			alert("Please Enter Your FullName");
			document.form1.contact_us_fullname.focus();
			return false;
		  }

		  if(document.form1.contact_us_email.value=="")
		  {
			alert("Please Enter Your Email Address");
			document.form1.contact_us_email.focus();
			return false;
		  } 
			if(document.form1.contact_us_phone.value=="")
		  {
			alert("Please Enter Your Contact Number");
			document.form1.contact_us_phone.focus();
			return false;
		  }
		  if(document.form1.contact_us_message.value=="")
		  {
			alert("Please Enter Your Message");
			document.form1.contact_us_message.focus();
			return false;
		  }  
		  return true;
		  }
		  
		</script>	
</head>
<body>
<div id="outer_m">
<?php include('includes/nav.php');?>
<div id="main">

<div id="stickleft">
<i class="fa fa-facebook-square" style="font-size:32px; margin-left:2px; cursor:pointer; color:#2d3e50;"></i>
<i class="fa fa-youtube-square" style="font-size:32px; margin-left:2px; cursor:pointer;  color:#2d3e50;"></i>
<i class="fa fa-twitter-square" style="font-size:32px; margin-left:2px; cursor:pointer; color:#2d3e50;"></i>
<i class="fa fa-linkedin-square" style="font-size:32px; margin-left:2px; cursor:pointer; color:#2d3e50;"></i>
</div>



<div id="stic"> 
<div id="cont_sent">
<div id="message">
<?php
  $name=addslashes($_POST['contact_us_fullname']);
  $selected=addslashes($_POST['select_me']);
  $address=addslashes($_POST['contact_us_add']);
  $email=addslashes($_POST['contact_us_email']);
  $phone=addslashes($_POST['contact_us_phone']);
  $fax=addslashes($_POST['contact_us_fax']);
  $message=addslashes($_POST['contact_us_message']);

 

	 
 // you can specify which email you want your contact form to be emailed to here

  $toemail = "abfi.secretarygeneral@gmail.com";
  $subject = "From abfi.in";

  $headers = "MIME-Version: 1.0\n"
            ."From: \"".$name."\" <".$email.">\n"
            ."Content-type: text/html; charset=iso-8859-1\n";

  $body = "Name: ".$name."<br>\n"
			 ."Type: ".$selected."<br>\n"
			 ."Address: ".$address."<br>\n"
            ."Email: ".$email."<br>\n"
            ."Phone:".$phone."<br>\n"
			."Fax:".$fax."<br>\n"
			 ."message:".$message."<br>\n";
			 
    @mail($toemail, $subject, $body, $headers);
    echo "Your mail has been sent successfully !";
?>

</div>

</div>
</div>
</div>
<footer>
<?php include('includes/footer.php');?>
</footer>

</div>
</body>
</html>