 <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <img src="reg_images/logo.png" class="img-circle" alt="ABFI-LOGO" width="40" height="40" align="left" style="margin-top:5px; margin-left:5px;"><a class="navbar-brand" href="index" align="right"><span class="img768">Amateur Baseball Federation of India</span><span class="img7682">ABFI</span></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right img768">
                
               
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        <li>
                            <a href="index"><i class="fa fa-home fa-fw"></i> Home</a>
                        </li>
						
						<li>
                            <a href="all_player_data_tbl"><i class="fa fa-users fa-fw"></i> Players</a>
                        </li>
						
						<li>
                            <a href="all_official_data_tbl"><i class="fa fa-user fa-fw"></i> Officials</a>
                        </li>
						
						<li>
                            <a href="event_tbl"><i class="fa fa-dashboard fa-fw"></i> Tournaments</a>
                        </li>
						
						<li>
						<?php
						$pen_data = new abfi_admin(); 
						$pen = $pen_data->get_pending_rosters();
						$roster = $pen_data->get_all_roster();
						$row_roster = mysqli_num_rows($roster);
						$int_ros = $pen_data->get_all_roster_int();
						$int_ros_count = mysqli_num_rows($int_ros);
						if($pen == 0)
						{echo "<a href='roster_data'><i class='fa fa-th-list fa-fw'></i> Rosters <span class='label label-danger pull-right' style='margin-left:2px;'>$pen</span> <span class='label label-success pull-right'>$row_roster </span></a>";}
						else
						{echo "<a href='roster_data_pen'><i class='fa fa-th-list fa-fw'></i> Rosters <span class='label label-danger pull-right' style='margin-left:2px;'>$pen</span> <span class='label label-success pull-right'>$row_roster</span></a>";}
						?>	
                        </li>
						
						<li>
                            <a href="int_event_home"><i class="fa fa-info-circle fa-fw"></i> International Events <span class='label label-primary pull-right'>New</span> </a>
                        </li>
                 
						<li>
                            <a href="int_roster_data"><i class="fa fa-th-list fa-fw"></i> International Rosters <span class='label label-success pull-right'><?php echo $int_ros_count;?></span></a>
                        </li>
						
						<li>
                            <a href="gen_cert" target="_blank"><i class="fa fa-file fa-fw"></i> Generate Certificates</a>
                        </li>
						
						<li>
                           <a href="logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
				 
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>