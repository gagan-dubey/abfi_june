<?php
// Require necessary files
require_once ('../../abfi_all_inc/Classes/include_all_min2.php');

// Set error reporting
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

// Confirm session
confirm_slogged_in();
confirm_session_svalid();

// Create abfi_admin object
$form = new abfi_admin();

// Decode parameters
$event = base64_decode($_GET["eve"]);
$gender = base64_decode($_GET["gen"]);

// Include FPDF library
require ('fpdf.php');

// Define PDF class
class PDF extends FPDF
{
    // Page header
    function Header()
    {
        $this->Image('cf.jpg', 0, 0, 298);
    }

    function body($image, $name, $dob, $event, $venue, $state, $organizer, $from, $to, $number, $eid)
    {
        // if (file_exists($image) && in_array(pathinfo($image, PATHINFO_EXTENSION), array('jpg', 'jpeg', 'png', 'gif'))) {
        //     $this->Image($image, 251, 8.5, 37, 43);
        // } else {
        //     // Display placeholder or handle missing image situation accordingly
        //     $this->Image('cf.jpg', 251, 8.5, 37, 43);
        // }

        if (file_exists($image)) {
            // Get MIME type and validate the image
            $image_info = @getimagesize($image);
            if ($image_info && in_array($image_info['mime'], ['image/jpeg', 'image/jpg'])) {
                $this->Image($image, 251, 8.5, 37, 43);
            } else {
                // Display placeholder if image is invalid
                $this->Image('cf.jpg', 251, 8.5, 37, 43);
            }
        } else {
            // Display placeholder if image does not exist
            $this->Image('cf.jpg', 251, 8.5, 37, 43);
        }

        $this->SetFont('Arial', '', 10);
        $this->SetTextColor(0, 0, 0);
        $this->SetXY(259, 51.2);
        $this->Cell(10, 10, $number);
        $this->SetFont('Arial', 'B', 18);
        $this->SetTextColor(240, 92, 22);
        $this->SetXY(48, 35);
        $this->Cell(10, 10, $event);
        $this->SetFont('Arial', 'B', 15);
        $this->SetTextColor(240, 92, 22);
        $this->SetXY(98, 45);
        $this->Cell(14, 14, $organizer);
        $this->SetXY(125, 104);
        $this->SetFont('Arial', 'B', 15);
        $this->SetTextColor(220, 50, 50);
        $this->Cell(10, 10, $name);
        $this->SetXY(235, 104);
        $this->Cell(10, 10, $dob);
        $this->SetXY(48, 123);
        $this->Cell(10, 10, $event);
        $this->SetXY(48, 133);
        $this->Cell(10, 10, $venue);
        $this->SetXY(40, 114);
        $this->Cell(10, 10, $state);
        $this->SetXY(46, 141);
        $this->Cell(10, 10, $from);
        $this->SetXY(122, 141);
        $this->Cell(10, 10, $to);
    }
}

// Create PDF object
$pdf = new PDF();

// Capture output in a buffer
ob_start();

// Get certificate data
$result = $form->get_cer($event, $gender);
$path = "../../abf_use/off_reg_imgs/";
$count = 0;

// Check if there's any data
if ($result->num_rows > 0) {
    // Loop through each row
    while ($row = $result->fetch_assoc()) {
        // Skip count 148
        if ($count == 148) {
            $count++;
            continue;
        }

        // Get data from the row
        $name = strtoupper($row["name"]);
        $dob = $row["dob"];
        $event = $row["event"];
        $venue = $row["venue"];
        $state = $row["state"];
        $organizer = $row["organizer"];
        $eid = $row["eid"];
        $pid = $row["pid"];
        $dates = $row["dates"];
        $image1 = $row["image"];
        $image = $path . $image1;
        $to = date_format(date_create(substr($dates, 13)), "d/m/Y");
        $from = date_format(date_create(substr($dates, 0, 10)), "d/m/Y");
        $count++;

        // Format count
        if ($count < 10) {
            $count = "000" . $count;
        } elseif ($count < 100) {
            $count = "00" . $count;
        } else {
            $count = "0" . $count;
        }
        $number = "ABFIP" . date("ym") . $count;

        // Check if certificate already exists
        $result3 = $form->check_cer($eid, $pid);
        if ($result3->num_rows > 0) {
            $cert_data = $form->get_cert_id($eid, $pid);
            $cert_dets = $cert_data->fetch_assoc();
            $cert_id = $cert_dets['cert_id'];
            $number = $cert_dets['cert_id'];
        } else {
            // If not, insert certificate
            $form->insert_cer($eid, $pid, $name, $count);
        }

        // Add page to PDF
        $pdf->AliasNbPages();
        $pdf->AddPage('L');
        $pdf->body($image, $name, $dob, $event, $venue, $state, $organizer, $from, $to, $number, $eid);
    }
}



// Send PDF
$pdf->Output();

// Get the buffered output
$pdf_output = ob_get_clean();

// Send PDF headers and output
header('Content-type: application/pdf');
header('Content-Disposition: inline; filename="certificate.pdf"');
echo $pdf_output;
?>
