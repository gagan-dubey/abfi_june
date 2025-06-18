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
                    <hr>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php
									
									$player = $form->get_all_players($state);
									$row_play = mysqli_num_rows($player);
							         echo $row_play;
									?>
									</div>
                                    <div>Players</div>
                                </div>
                            </div>
                        </div>
						
						<div class="panel-body">
						<ul class="fa-ul">
						<li><i class="fa-li fa fa-check-square fa-fw"></i> Add new players</li>
						<li><i class="fa-li fa fa-check-square fa-fw"></i >View all players</li>
						<li><i class="fa-li fa fa-check-square fa-fw"></i> View players details</li>
						</ul>
						</div>
						
                        <a href="all_player_data_tbl.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>						
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
									<?php
									$offc = $form->get_all_officials($state);
									$row_offc = mysqli_num_rows($offc);
							         echo $row_offc;
									?>
									</div>
                                    <div>Officials</div>
                                </div>
                            </div>
                        </div>
						
						<div class="panel-body">
						<ul class="fa-ul">
						<li><i class="fa-li fa fa-check-square fa-fw"></i> Add new officials</li>
						<li><i class="fa-li fa fa-check-square fa-fw"></i> View all officials</li>
						<li><i class="fa-li fa fa-check-square fa-fw"></i> View officials details</li>
						</ul>
						</div>
						
						
						
                        <a href="all_official_data_tbl.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-th-list fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
									
									<?php
									
									$roster = $form->get_all_roster($state);
									$row_roster = mysqli_num_rows($roster);
							         echo $row_roster;
									?>
									
									</div>
                                    <div>Rosters</div>
                                </div>
                            </div>
                        </div>
						
						<div class="panel-body">
						<ul class="fa-ul">
						<li><i class="fa-li fa fa-check-square fa-fw"></i> Create roster</li>
						<li><i class="fa-li fa fa-check-square fa-fw"></i> View roster</li>
						<li><i class="fa-li fa fa-check-square fa-fw"></i> Print ID-Cards</li>
						</ul>
						</div>
						
                        <a href="roster_data_tbl.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
				
				
				                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-dashboard fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
									<?php
									
									$tourn = $form->get_all_tourn($state);
									$row_tourn = mysqli_num_rows($tourn);
							         echo $row_tourn;
									?>
									
									</div>
                                    <div>Tournaments</div>
                                </div>
                            </div>
                        </div>
						
						
						<div class="panel-body">
						<ul class="fa-ul">
						<li><i class="fa-li fa fa-check-square fa-fw"></i> View active events</li>
						<li><i class="fa-li fa fa-check-square fa-fw"></i> View complete events</li>
						<li><i class="fa-li fa fa-check-square fa-fw"></i> View upcoming events</li>
						</ul>
						</div>
						
                        <a href="event_tbl.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
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
