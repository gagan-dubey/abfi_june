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
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
									<?php
									
									$player = $all_data->get_all_players();
									$row_play = mysqli_num_rows($player);
							         echo $row_play;
									?></div>
                                    <div>Players</div>
                                </div>
                            </div>
                        </div>
						
						<div class="panel-body">
						<ul class="fa-ul">
						<li><i class="fa-li fa fa-check-square"></i>View players state-wise</li>
						<li><i class="fa-li fa fa-check-square"></i>View player's detail</li>
						<li><i class="fa-li fa fa-check-square"></i>Edit player's detail</li>
						<li><i class="fa-li fa fa-check-square"></i>Delete a player</li><ul>
						</div>
						
                        <a href="all_player_data_tbl">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>						
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
									
									<?php
									
									$offc = $all_data->get_all_officials();
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
						<li><i class="fa-li fa fa-check-square"></i>View officials state wise</li>
						<li><i class="fa-li fa fa-check-square"></i>View official's detail</li>
						<li><i class="fa-li fa fa-check-square"></i>Edit official's detail</li>
						<li><i class="fa-li fa fa-check-square"></i>Delete a official</li><ul>
						</div>
						
						
						
                        <a href="all_official_data_tbl">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-dashboard fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
									<?php
									
									$tourn = $all_data->get_all_tourn();
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
						<li><i class="fa-li fa fa-check-square"></i>Create an event</li>
						<li><i class="fa-li fa fa-check-square"></i>Create forthcoming event</li>
						<li><i class="fa-li fa fa-check-square"></i>Edit an event</li>
						<li><i class="fa-li fa fa-check-square"></i>Disable an event</li><ul>
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
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-th-list fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
									<?php
									
									$roster = $all_data->get_all_roster();
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
						<li><i class="fa-li fa fa-check-square"></i>View rosters state-wise</li>
						<li><i class="fa-li fa fa-check-square"></i>View rosters for a state</li>
						<li><i class="fa-li fa fa-check-square"></i>Approve a roster</li>
						<li><i class="fa-li fa fa-check-square"></i>Delete a roster</li><ul>
						</div>
						
                        <a href="roster_data">
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
