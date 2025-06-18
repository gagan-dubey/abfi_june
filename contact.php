

<!DOCTYPE html>
<html>	
	<head>		
		<?php include('includes/header.php');?>			
		<title>Contact Us | Amateur Baseball Federation of India | THE OFFICIAL SITE OF INDIAN BASEBALL</title>		
		<style>			
			.contact1{height:400px; width:100%;}			
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
				<div class="container" style="margin-top:50px;">					
					<div class="row">						
						<div class="col-lg-4 col-lg-offset-1">								
														
							<h4>Contact Form</h4>							
							<div class="panel panel-default" style="padding:10px;">								
								<form method="POST" action="cont_sent.php" onsubmit="return check();" name="form1">									
									<input class="form-control" placeholder="Name" name="contact_us_fullname">	</br>									
									<select class="form-control" name="select_me">										
										<option>School</option>										
										<option>College</option>										
										<option>Club</option>										
									</select></br>									
									<textarea class="form-control" rows="2" placeholder="Address" name="contact_us_add"></textarea></br>									
									<input class="form-control" placeholder="Email" name="contact_us_email"></br>									
									<input class="form-control" placeholder="Contact Number" name="contact_us_phone"></br>									
									<input class="form-control" placeholder="Fax Number"></br>									
									<textarea class="form-control" rows="3" placeholder="Message" name="contact_us_message"></textarea></br>									
									<input type="submit" name="contact_us_btn" class="btn btn-primary" value="Send">															
									<?php										
										function phpAlert($msg) 										
										{ echo '<script type="text/javascript">alert("' . $msg . '")</script>';}										
									?> 										
								</div>								
							</div>							
							<div class="col-lg-6">								
								<h4>Our Location</h4>												<iframe class="contact1" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1750.0184972070094!2d77.16063325819887!3d28.688539948546996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d023841155555%3A0xf88cb51241a6670d!2sAmateur%20Baseball%20Federation%20of%20India!5e0!3m2!1sen!2sin!4v1646815331471!5m2!1sen!2sin" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
																
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