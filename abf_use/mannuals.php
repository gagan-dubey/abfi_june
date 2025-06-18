<?php require_once('../abfi_all_inc/Classes/include_all_min.php'); ?>
<?php 
$form = new abfi_use(); 
$state = $_SESSION["state"];
?>
<?php confirm_logged_in();?>
<?php confirm_session_valid();?>
<?php 

$imp = $form->get_imp_officials($state);
$imp_count = mysqli_num_rows($imp); 

if($imp_count != 2)
{
	header( "refresh:0; url=logout-all");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   
<title>Home | ABFI</title>
<?php include('adm_includes/header.php');?>
 
</head>

<body>

    <div id="wrapper">

       <?php include('adm_includes/nav.php');?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
				<h3>ABFI REGISTRATION MANNUALS</h3>   
					<hr><h4><a href="pdf/1-ABFI STATE OFFICIAL REGISTRATION.pdf" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> 1. ABFI STATE OFFICIAL REGISTRATION</a></h4>				
					<hr><h4><a href="pdf/2-ABFI PLAYER REGISTRATION.pdf" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> 2. ABFI PLAYER REGISTRATION</a></h4>
					<hr><h4><a href="pdf/3-ABFI OTHER OFFICIAL REGISTRATION.pdf" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> 3. ABFI OTHER OFFICIAL REGISTRATION</a></h4>
					<hr><h4><a href="pdf/4-CREATING A ROSTER.pdf" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> 4. CREATING A ROSTER</a></h4>
					<hr><h4><a href="pdf/5-IMGAE EDITNIG.pdf" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> 5. IMGAE EDITNIG</a></h4>					
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
