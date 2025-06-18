<?php require_once('abfi_all_inc/Classes/outside.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Schedule | Amateur Baseball Federation of India | THE OFFICIAL SITE OF INDIAN BASEBALL</title>
<?php include('includes/header.php');?>
<style>
.panel
{
    text-align: center;
}
.panel:hover { box-shadow: 0 1px 5px rgba(0, 0, 0, 0.4), 0 1px 5px rgba(130, 130, 130, 0.35); }
.panel-body
{
    padding: 0px;
    text-align: center;
}

.the-price
{
    background-color: rgba(220,220,220,.17);
    box-shadow: 0 1px 0 #dcdcdc, inset 0 1px 0 #fff;
    padding: 20px;
    margin: 0;
}

.the-price h1
{
    line-height: 1em;
    padding: 0;
    margin: 0;
}

.subscript
{
    font-size: 25px;
}

/* CSS-only ribbon styles    */
.cnrflash
{
    /*Position correctly within container*/
    position: absolute;
    top: -9px;
    right: 4px;
    z-index: 1; /*Set overflow to hidden, to mask inner square*/
    overflow: hidden; /*Set size and add subtle rounding  		to soften edges*/
    width: 100px;
    height: 100px;
    border-radius: 3px 5px 3px 0;
}
.cnrflash-inner
{
    /*Set position, make larger then 			container and rotate 45 degrees*/
    position: absolute;
    bottom: 0;
    right: 0;
    width: 145px;
    height: 145px;
    -ms-transform: rotate(45deg); /* IE 9 */
    -o-transform: rotate(45deg); /* Opera */
    -moz-transform: rotate(45deg); /* Firefox */
    -webkit-transform: rotate(45deg); /* Safari and Chrome */
    -webkit-transform-origin: 100% 100%; /*Purely decorative effects to add texture and stuff*/ /* Safari and Chrome */
    -ms-transform-origin: 100% 100%;  /* IE 9 */
    -o-transform-origin: 100% 100%; /* Opera */
    -moz-transform-origin: 100% 100%; /* Firefox */
    background-image: linear-gradient(90deg, transparent 50%, rgba(255,255,255,.1) 50%), linear-gradient(0deg, transparent 0%, rgba(1,1,1,.2) 50%);
    background-size: 4px,auto, auto,auto;
    background-color: #aa0101;
    box-shadow: 0 3px 3px 0 rgba(1,1,1,.5), 0 1px 0 0 rgba(1,1,1,.5), inset 0 -1px 8px 0 rgba(255,255,255,.3), inset 0 -1px 0 0 rgba(255,255,255,.2);
}
.cnrflash-inner:before, .cnrflash-inner:after
{
    /*Use the border triangle trick to make  				it look like the ribbon wraps round it's 				container*/
    content: " ";
    display: block;
    position: absolute;
    bottom: -16px;
    width: 0;
    height: 0;
    border: 8px solid #800000;
}
.cnrflash-inner:before
{
    left: 1px;
    border-bottom-color: transparent;
    border-right-color: transparent;
}
.cnrflash-inner:after
{
    right: 0;
    border-bottom-color: transparent;
    border-left-color: transparent;
}
.cnrflash-label
{
    /*Make the label look nice*/
    position: absolute;
    bottom: 0;
    left: 0;
    display: block;
    width: 100%;
    padding-bottom: 5px;
    color: #fff;
    text-shadow: 0 1px 1px rgba(1,1,1,.8);
    font-size: 0.95em;
    font-weight: bold;
    text-align: center;
}
</style>	
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


<div id="basic">

<!--<div id="el">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div id="evnt_cont"><img class="evnt" src="images/ev2.jpg"><img class="evnt" src="images/ev4.jpg"></div>
</p></br>


</div>-->

<div class="container">
    <div class="row">
	
	<?php 
	
	$a = new db_functions();
	$sql = "Select * from abfi_forth_event order by id DESC";
						 $result = $a->extract($sql);
							 if (mysqli_num_rows($result) > 0) {
							// output data of each row
							while($row = mysqli_fetch_assoc($result)) {
								$a =$row["event_name"];
								$c =$row["event_date"];
								$d =$row["event_venue"];
								$f =$row["event_org"];
								$e = base64_encode($row["sec_eve_id"]);
					
						 ?>
        <center>
        <div class="col-xs-12 col-md-5">
            <div class="panel panel-info">
                <div class="cnrflash">
                    <div class="cnrflash-inner">
                        <span class="cnrflash-label">NEW
                            <br>
                            EVENT</span>
                    </div>
                </div>
                <div class="panel-heading">
                    <img src="logo.png" width="60" height="60">
                </div>
                <div class="panel-body">
                    <div class="the-price">
                        <h2>
                        <?php echo strtoupper($a); ?>
						</h2>
						
						<!--<h2>
						Baseball Championship
						</h2>
						<h3>
						(Boys & Girls)
                       </h3>-->
                    </div>
                    <table class="table">
                        <tr>
                            <td>
                                <a class="btn btn-danger btn-lg active"> <b><?php echo ucfirst($c); ?></b></a>
                            </td>
                        </tr>
                        <tr class="active">
                            <td>
                               <h4>Venue</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                           <h4><b><?php echo strtoupper($d); ?></b></h4>						   
                            </td>
                        </tr>
                        <tr class="active">
                            <td>
                                <h4>Hosted By</h4>
                            </td>
                        </tr>
                        <tr>
                            <td>
                               <h4><b> <?php echo ucfirst($f); ?> </b></h4>
                            </td>
                        </tr>
                      
                    </table>
                </div>
                <div class="panel-footer"><a class="btn btn-primary active">ABFI</a></div>
            </div>
        </div>
		</center>
		<?php

			}
						} 
		
		else {
							echo '<div class="panel panel-default text-center"><div class="panel-body"><p class="lead">Currently there are no upcomming events.</p></div></div>';
						}
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