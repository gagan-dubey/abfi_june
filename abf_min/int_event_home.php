<?php require_once('../abfi_all_inc/Classes/include_all_min.php'); ?>
<?php confirm_slogged_in();?>
<?php confirm_session_svalid();?>
<?php $all_data = new abfi_admin();?>
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
                
                <div class="col-lg-6 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-dashboard fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
									<?php
									
									$tourn = $all_data->get_all_tourn_int_eve();
									$row_tourn = mysqli_num_rows($tourn);
							         echo $row_tourn;
									?>
									</div>
                                    <div>International Tournaments</div>
                                </div>
                            </div>
                        </div>
						
                        <a href="event_tbl">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-th-list fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
									<?php
									
									$roster = $all_data->get_all_roster_int_eve();
									$row_roster = mysqli_num_rows($roster);
							         echo $row_roster;
									?>
									</div>
                                    <div>International Rosters</div>
                                </div>
                            </div>
                        </div>
					
                        <a href="int_event_roster_data">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
				
				
            </div>
			
			<div class="row">
			<div class="col-md-12 text-center">
			<div class="panel panel-primary">
			<div class="panel-heading">
			<h4>Create Roster</h4>
			</div>
			<div class="panel-body">
			<a class="btn btn-primary" href="int_event_roster_data_main"><i class="fa fa-plus-circle fa-fw"></i> Click here to create a new roster</a>
			</div>
			</div>
			</div>
			</div>
			
			
			<div class="row">
			<div class="col-md-12 text-center">
			<div class="panel panel-success">
			<div class="panel-heading">
			<h4>Generate Certificates</h4>
			</div>
			<div class="panel-body">
			<a class="btn btn-success" href="int_event_gen_cert" target="_blank"><i class="fa fa-plus-circle fa-fw"></i> Click here to generate certificates</a>
			</div>
			</div>
			</div>
			</div>
           
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

	 <?php include('adm_includes/footer.php');?>
   

</body>

</html>
