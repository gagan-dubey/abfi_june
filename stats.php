<!DOCTYPE html>
<html lang="en">
<head>
<title>Stats | Amateur Baseball Federation of India | THE OFFICIAL SITE OF INDIAN BASEBALL</title>
	<?php include('includes/header.php');?>			  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div id="outer_m">
	<?php include('includes/nav.php');?>	
<div id="main">

		<div id="stickleft"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<i class="fa fa-facebook-square" style="font-size:32px; margin-left:2px; cursor:pointer; color:#2d3e50;"></i>
		<i class="fa fa-youtube-square" style="font-size:32px; margin-left:2px; cursor:pointer;  color:#2d3e50;"></i>
		<i class="fa fa-twitter-square" style="font-size:32px; margin-left:2px; cursor:pointer; color:#2d3e50;"></i>
		<i class="fa fa-linkedin-square" style="font-size:32px; margin-left:2px; cursor:pointer; color:#2d3e50;"></i>
		</div>

		
		<div class="container" style="margin-top:50px;">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">

                        <!-- .panel-heading -->
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><i class="fa fa-calculator" style="font-size:24px;color:#464646"></i> Batting Average (AVG)</a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            Divide the number of base hits by the total number of at bats. If Tony Gwynn has 600 at bats and has 206 hits</br>
											 His batting average would be .343 (206/600)
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><i class="fa fa-calculator" style="font-size:24px;color:#464646"></i> Earned Run Average (ERA)</a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            Multiply the total number of earned runs by nine, and divide the results by the total innings pitched.Randy Johnson has allowed 67 runs in 220 innings. What's his ERA?</br>
											Multiply 67 by 9: 67x9=603.  Divide 603 by 220 (his innings pitched):  603/220=2.74.  That's his ERA.
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><i class="fa fa-calculator" style="font-size:24px;color:#464646"></i> W-L percentage</a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            Divide the number of games won by the total number of decisions. Pedro Martinez has a 16-3 record.</br>
											Divide his win total(16) by his total number of decisions (19):16/19=0.842											
                                        </div>
                                    </div>
                                </div>
								
                                <div class="panel panel-default">
                                <div class="panel-heading"><h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><i class="fa fa-calculator" style="font-size:24px;color:#464646"></i> Slugging Percentage (SLG)</a></h4></div>
                                    <div id="collapseFour" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            Divide the total number of bases of all base hits by the total number of times at bat Sammy Sosa has 282 total bases and 440 at-bats.</br>
											Divide 282 by 440 to get his slugging percentage: 282/440=.641
                                </div></div></div>		

                                <div class="panel panel-default">
                                <div class="panel-heading"><h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive"><i class="fa fa-calculator" style="font-size:24px;color:#464646"></i> On-Base Percentage (OBP)</a></h4></div>
                                    <div id="collapseFive" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            Divide the total number of hits plus Bases on Balls plus hits by Pitch BY at Bats plus Bases on Balls plus hit by Pitch plus Sacrifice Flies In Derek Jeter's 434 at-bats, he has 152 hits, 59 walks, and has been hit by 9 pitches. He's hit 6 sacrifice flies.
											So here's the formula to determine his on-base average: (152+59+9)/(434+59+9+6)=220/508=.433
                                </div></div></div>
								
                                <div class="panel panel-default">
                                <div class="panel-heading"><h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix"><i class="fa fa-calculator" style="font-size:24px;color:#464646"></i> Fielding Average</a></h4></div>
                                    <div id="collapseSix" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            Divide the total number of putouts and assists by the total number of putouts, assists and errors. Edgardo Alfonzo has 218 putouts and 290 assists, while committing only 2 errors.</br>
											So his fielding percentage is : (218+290)/(218+290+2)=508/510=.996
                                </div></div></div>		

                                <div class="panel panel-default">
                                <div class="panel-heading"><h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseSev"><i class="fa fa-calculator" style="font-size:24px;color:#464646"></i> Magic Numbers</a></h4></div>
                                    <div id="collapseSev" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            Determine the number of games yet to be played, add one, then subtract the number of games ahead in the loss column of the standings from the closest opponent. So here's Texas' magic number.</br>
											remaining (50) +1=51. 51-7=44. The Rangers' magic number to clinch the AL West is 44.
                                </div></div></div>									
                            </div>
                        </div>
                        <!-- .panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>		
			</div>	
		</div>
		<footer>
		<?php include('includes/footer.php');?>	
		</footer>

		</div>
</body>
</html>