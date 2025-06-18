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
					<div id="icard_out">
						<center><h3 class="hea3ding3">ABFI LOGIN</h3></center>
						
						<form method="POST" name="form" action="abf_use/login_all.php">
							<input class="admin_input" type="text" placeholder="Username" name="username">
							<input class="admin_input1" type="password" placeholder="Password" name="password">
							<input type="submit"value="LOGIN" class="admin_submit" name="submit" >
						</form>
					</div>
					<p class="text-center" style="margin-top:-50px;"><a href="resetpass">Fogot Password?</a></p>
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