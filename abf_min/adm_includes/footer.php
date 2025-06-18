 <!-- jQuery -->


    <!-- Metis Menu Plugin JavaScript -->
    <script src="css/metisMenu/metisMenu.min.js"></script>
	
	 <!-- DataTables JavaScript -->
    <script src="plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="plugins/datatables-responsive/dataTables.responsive.js"></script>
	<script src="plugins/datepicker/js/bootstrap-datepicker.min.js"></script>
	<script src="plugins//daterangepicker/moment.js"></script>
	<script src="plugins/daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>
	
 <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
        responsive: true,
		paging:   false,
        ordering: false,
        info:     false,
		searching: false
        });
    });
    </script>