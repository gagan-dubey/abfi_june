<?php require_once('../abfi_all_inc/Classes/include_all_min.php'); ?>
<?php confirm_slogged_in();?>
<?php confirm_session_svalid();?>
<?php $form = new abfi_admin(); ?>
<?php 
$result = $form->export_all_ply();
$rows = array();
while($row = mysqli_fetch_assoc($result))
$rows[] = $row;
/*echo"<pre>";
print_r($rows);
echo"</pre>";*/

$obj = new PHPExcel();

$obj->getProperties()->setCreator("ABFI | Admin");
$obj->getProperties()->setLastModifiedBy("Admin");
$obj->getProperties()->setTitle("ABFI-Reports");
$obj->getProperties()->setSubject("Reports");
$obj->getProperties()->setDescription("Exported Reports");
$obj->setActiveSheetIndex(0);
$obj->getActiveSheet()->setCellValue('A1', 'Player-ID');
$obj->getActiveSheet()->setCellValue('B1', 'Full Name');
$obj->getActiveSheet()->setCellValue('C1', 'Father Name');
$obj->getActiveSheet()->setCellValue('D1', 'DOB');
$obj->getActiveSheet()->setCellValue('E1', 'Gender');
$obj->getActiveSheet()->setCellValue('F1', 'Blood Group');
$obj->getActiveSheet()->setCellValue('G1', 'Height');
$obj->getActiveSheet()->setCellValue('H1', 'Weight');
$obj->getActiveSheet()->setCellValue('I1', 'Address');
$obj->getActiveSheet()->setCellValue('J1', 'Pin Code');
$obj->getActiveSheet()->setCellValue('K1', 'District');
$obj->getActiveSheet()->setCellValue('L1', 'State');
$obj->getActiveSheet()->setCellValue('M1', 'Position');
$obj->getActiveSheet()->setCellValue('N1', 'Aadhar Card No');
$obj->getActiveSheet()->setCellValue('O1', 'Passport No.');
$obj->getActiveSheet()->setCellValue('P1', 'Contact');
$obj->getActiveSheet()->setCellValue('Q1', 'Emergency Contact');
$obj->getActiveSheet()->setCellValue('R1', 'Email');
$obj->getActiveSheet()->setCellValue('S1', 'State Code');

$line = 2;
foreach($rows as $row){ 
 $obj->getActiveSheet()->setCellValue('A'.$line,$row['id']);
 $obj->getActiveSheet()->setCellValue('B'.$line,$row['name']);
 $obj->getActiveSheet()->setCellValue('C'.$line,$row['father']);
 $obj->getActiveSheet()->setCellValue('D'.$line,$row['dob']);
 $obj->getActiveSheet()->setCellValue('E'.$line,$row['gender']);
 $obj->getActiveSheet()->setCellValue('F'.$line,$row['bg']);
 $obj->getActiveSheet()->setCellValue('G'.$line,$row['height']);
 $obj->getActiveSheet()->setCellValue('H'.$line,$row['weight']);
 $obj->getActiveSheet()->setCellValue('I'.$line,$row['address']);
 $obj->getActiveSheet()->setCellValue('J'.$line,$row['pin']);
 $obj->getActiveSheet()->setCellValue('K'.$line,$row['district']);
 $obj->getActiveSheet()->setCellValue('L'.$line,$row['state']);
 $obj->getActiveSheet()->setCellValue('M'.$line,$row['position']);
 $obj->getActiveSheet()->setCellValue('N'.$line,$row['aadhar']);
 $obj->getActiveSheet()->setCellValue('O'.$line,$row['pass']);
 $obj->getActiveSheet()->setCellValue('P'.$line,$row['contact']);
 $obj->getActiveSheet()->setCellValue('Q'.$line,$row['econtact']);
 $obj->getActiveSheet()->setCellValue('R'.$line,$row['email']);
 $obj->getActiveSheet()->setCellValue('S'.$line,$row['code']);
 
 
 $line++;
}

$file = "Export" . date("Y-m-d-H-i-s") . ".xlsx";
$obj->getActiveSheet()->setTitle('Export');
header("Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header("Content-Disposition: attachment; filename=".$file."");
header("Cache-Control: max-age=0");

$writer = PHPExcel_IOFactory::createWriter($obj, 'Excel2007');
$writer->save('php://output');
exit;
?>
