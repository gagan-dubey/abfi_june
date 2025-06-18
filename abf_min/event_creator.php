<?php require_once('../abfi_all_inc/Classes/include_all_min.php'); ?>
<?php confirm_slogged_in();?>
<?php confirm_session_svalid();?>
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
		<div class="col-sm-12">
		    <div class="panel panel-primary">
            <div class="panel-heading text-center">
            <b> Create New Event</b>
            </div><!-- /.panel-heading -->
            <div class="panel-body">
		
					<form id="defaultForm" method="post" class="form-horizontal" action="" enctype="multipart/form-data" data-toggle="validator">
					<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-8">
					</br>
						
							<div class="form-group">
							
							<div class="inputGroupContainer">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-caret-square-o-right fa-fw"></i></span>
								<input type="text" class="form-control" name="evtname" placeholder="Event Name" />
							</div>
							</div>
							</div></br>
							
							<div class="form-group">
							
							<div class="inputGroupContainer">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-hourglass-start fa-fw"></i></span>
								<input type="text" class="form-control" name="evtorg" placeholder="Organiser" />
							</div>
							</div>
							</div></br>
							
							
							<div class="form-group">
							
							<div class="inputGroupContainer">
							<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
							<input type="text" class="form-control" name="evtdate" placeholder="DD/MM/YYYY" id="reservation">
							</div>
							</div>
							</div></br>
							

							
							<div class="form-group">
						
							<div class="inputGroupContainer">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
								<input type="text" class="form-control" name="evtvenue" placeholder="Venue" />
							</div>
							</div>
							</div></br>
							
							<div class="form-group">
                                        
                                          <select name="evttype" class="form-control" required>
										  <option disabled="" selected="">--Select Event Type--</option>
											<option value="N">	National Event	</option>
											<option value="IN">	International Event	</option>
										  </select>
                                      </div></br>
									  
									  <div class="form-group">
                                        
                                          <select name="evtlevel" class="form-control" required>
										  <option disabled="" selected="">--Select Event Level--</option>
											<option value="LL"> Little League </option>
											<option value="SJ">	Sub Junior	</option>
											<option value="JL">	Junior	</option>
											<option value="SL">	Senior	</option>
										  </select>
                                      </div></br>
				
					</div>
					<div class="col-md-2"></div>		
					</div></br>
					<center>
					<button type="submit" name="send" class="btn btn-primary "><i class="fa fa-plus-circle fa-fw"></i> CREATE</button>
					<a href="event_creator" class="btn btn-primary "><i class="fa fa-refresh fa-fw"></i> RESET</a>
					</center>
					</form>
					<?php 
					
					if(isset($_POST['send']))
						
						{
							$ename = $_POST['evtname'];
							$eorganiser = $_POST['evtorg'];
							$edates = $_POST['evtdate'];
							$evenue = $_POST['evtvenue'];
							$evetype = $_POST['evttype'];
							$evelevel = $_POST['evtlevel'];
							
							$a = new abfi_admin();
							$result = $a->check_empty_event($ename,$eorganiser,$edates,$evenue,$evetype,$evelevel);
							
							if($result === 0)
							{
								header( "refresh:0;url=event_creator" );
							}
							
							else 
							{
								
						      $push_data = $a->create_event($ename,$eorganiser,$edates,$evenue,$evetype,$evelevel);
							  if($push_data)
							  {
								  echo "<script> alert('Event Created Successfully..'); </script>";
								  header( "refresh:0;url=event_tbl" );
							  }
							  
							  else
							  {
								 echo "<script> alert('Not able to create the event right now..'); </script>";
								  //header( "refresh:0;url=event_creator" ); 
							  }
							}
						}
					
					?>
            <!-- /.row -->
			</div>
			</div>
			</div>			   
        </div>
		</div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

	 <?php include('adm_includes/footer.php');?>
	 <script>
  $(function () {
    

    //Date picker
    $('#reservation').daterangepicker({
      autoclose: true,
	  todayHighlight: true
    });

  });
</script>

<script type="text/javascript">
$(document).ready(function() {
	
	$('#reservation')
        .daterangepicker({
            format: 'dd/mm/yyyy'
        })
        .on('changeDate', function(e) {
            // Revalidate the date field
            $('#defaultForm').formValidation('revalidateField', 'evtdate');
        });
	

    $('#defaultForm').formValidation({
        message: 'This value is not valid',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            evtname: {
                validators: {
                    notEmpty: {
                        message: 'Event Name is required'
                    }
                }
            },
			
			evtorg: {
                validators: {
                    notEmpty: {
                        message: 'Event Organiser is required'
                    }
                }
            },
			
			
				evtdate: {
					 excluded: false,
                validators: {
                    notEmpty: {
                        message: 'Event Date is required'
                    },
                }
            },
			
						evtvenue: {
                validators: {
                    notEmpty: {
                        message: 'Venue is required'
                    }
                }
            },
			
						evttype: {
                validators: {
                    notEmpty: {
                        message: 'Kindly Select A Value'
                    }
                }
            },
			
			evtlevel: {
                validators: {
                    notEmpty: {
                        message: 'Kindly Select A Value'
                    }
                }
            }
        }
    });
	
});
</script>
   

</body>

</html>
