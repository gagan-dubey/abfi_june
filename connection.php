
<?php  
$db_host = "localhost"; 
//$db_username = "abfi_dbuser";  
//$db_pass = "AbfiDB@0810";  
//$db_name = "abfi_abfisol_abfindia_db"; 
$db_username = "cwcrefot_abfi";  
$db_pass = "@Y![Ejp!vDrA";  
$db_name = "cwcrefot_abfi"; 
// Run the actual connection here  
mysql_connect("$db_host","$db_username","$db_pass") or die ("could not connect");
mysql_select_db("$db_name") or die ("no database");          
?>