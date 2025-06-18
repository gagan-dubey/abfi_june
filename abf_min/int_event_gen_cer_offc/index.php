<?php require_once('../../abfi_all_inc/Classes/include_all_min2.php'); ?>
<?php confirm_slogged_in();?>
<?php confirm_session_svalid();?>
<?php 
$form = new abfi_admin();
$event =base64_decode($_GET["eve"]);
?>
<?php
require('fpdf.php');

class PDF extends FPDF
{
// Page header

function Header()
{
    $this->Image('cf.jpg',0,0,298);
}

function body($image,$name,$dob,$event,$venue,$state,$organizer,$from,$to,$count,$eid)
{	
	$this->Image($image,251,8.5,37,43);
	$this->SetFont('Arial','',10);
	$this->SetTextColor(0,0,0);
	$this->SetXY(259,51.2);
	$this->Cell(10,10,"ABFIO".date("ym").$count);
	$this->SetFont('Arial','B',18);
	$this->SetTextColor(240,92,22);
	$this->SetXY(48,35);
	$this->Cell(10,10,$event);
	$this->SetFont('Arial','B',15);
	$this->SetTextColor(240,92,22);
	$this->SetXY(98,45);
	$this->Cell(14,14,$organizer);
	$this->SetXY(125,104);
	$this->SetFont('Arial','B',15);
	$this->SetTextColor(220,50,50);
	$this->Cell(10,10,$name);
	$this->SetXY(235,104);
	$this->Cell(10,10,$dob);
	$this->SetXY(48,123);
	$this->Cell(10,10,$event);
	$this->SetXY(48,133);
	$this->Cell(10,10,$venue);
	$this->SetXY(40,114);
	$this->Cell(10,10,$state);
	$this->SetXY(46,141);
	$this->Cell(10,10,$from);
	$this->SetXY(122,141);
	$this->Cell(10,10,$to);
}

}

$pdf = new PDF();

$result = $form->int_event_get_cer_off($event);
$path = "../int_eve_imgs";
$count = 0;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $name = strtoupper($row["name"]);
		$dob = $row["dob"];
		$event = $row["event"];
		$venue = $row["venue"];
		$state = $row["country"];
		$organizer = $row["organizer"];
		$eid = $row["eid"];
		$oid = $row["oid"];
		$dates = $row["dates"];
		$image1 = $row["image"];
		//$image = $path . $image1;
		$image ="image-back.jpg"; 
		$to = date_format(date_create(substr($dates,13)),"d/m/Y");
		$from = date_format(date_create(substr($dates,0,10)),"d/m/Y");
		$count++;
		if($count < 10)
		{
			$count = "000".$count;
		}
		elseif($count < 100)
		{
			$count = "00".$count;
		}
		
		else
		{
			$count = "0".$count;
		}
		$result3 = $form->check_cer_off($eid,$oid);
		if ($result3->num_rows > 0) {} 
		else 
		{
		 $form->insert_cer_off($eid,$oid,$name,$count);
		}
		$pdf->AliasNbPages();
		$pdf->AddPage('L');
		$pdf->body($image,$name,$dob,$event,$venue,$state,$organizer,$from,$to,$count,$eid);
    }
} 
$pdf->Output();
?>