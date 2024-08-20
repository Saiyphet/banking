<?php
//============================================================+
// File name   : example_011.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 011 for TCPDF class
//               Colored Table (very simple table)
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Colored Table
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('./TCPDF-main/tcpdf.php');

// extend TCPF with custom functions
class MYPDF extends TCPDF {
    
    // Load table data from file
    public function LoadData() {
        // Read file lines
        
        include '../EmployeeLeaveSystem-PHP/includes/dbconnect.php';
        // $eid ='eid';
        
        $eid = $_GET['eid'];
        $query = mysqli_query($connect,"SELECT DISTINCT * FROM v_report_user WHERE idEmp='$eid' ORDER BY ID DESC");

       //SET eid='".$empid."'
        		$row = mysqli_fetch_assoc($query);
                
                //$sql = "SELECT DISTINCT * FROM `v_report_user` WHERE v_report_user.idEmp=:eid order by ID desc";
                  
        //SET eid='".$empid."'
        
		// $row = mysqli_fetch_assoc($query);
        //  $id =$_GET['empid'];
        // $query = "SELECT * FROM  tblemployees ";
        // $result = $connect->query($query);
        // echo ($id);
         
		
        
        
		return $query;
    }

    // Colored table
    public function ColoredTable($header,$data) {
        // Colors, line width and bold font
        $this->SetFillColor(255, 255, 255);
        $this->SetTextColor(0,0,0);
        $this->SetDrawColor(128, 0, 0);
        $this->SetLineWidth(0.3);
        $this->SetFont('phetsarath_ot', '', 12);
        // Header
        $w = array(45, 27, 28, 26,30,37,58,21);
        $num_headers = count($header);
        for($i = 0; $i < $num_headers; ++$i) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
        }
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        
        $this->SetFont('phetsarath_ot', '', 14);
        // Data
        $fill = 0;
        
        
        foreach($data as $row) {
            
             $this->Cell($w[0], 8, $row['LeaveType'], 'LR', 0, 'C', $fill);
             $this->Cell($w[1], 8, $row["Fromdate"], 'LR', 0, 'C', $fill);
             $this->Cell($w[2], 8, $row["timestart"], 'LR', 0, 'C', $fill);
            $this->Cell($w[3], 8, $row["endtime"], 'LR', 0, 'C', $fill);
            $this->Cell($w[4], 8, $row["classroom"], 'LR', 0, 'C', $fill);
            $this->Cell($w[5], 8, $row["class"], 'LR', 0, 'C', $fill);
            $this->Cell($w[6], 8, $row["Description"], 0,  false, 'C', $fill);
            $this->Cell($w[7], 8, $row["AdminRemark"], 'LR', 0, 'C', $fill);

            
            // $this->Cell(0, 10, 'ຊື່ ແລະ ນາມສະກຸນ.ວຸດທິນັກສຶກສາ'.$row['firstname'], 0, 1, 'b');
            $this->Ln();
            $fill=!$fill;
        }
        $this->Cell(array_sum($w), 0, '', 'T');
    }
    }


// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('ຕາຕະລາງ');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetFont('phetsarath_ot', '', 14);
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
// $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 011', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
$pdf->setCellHeightRatio(1);
// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font



// add a page
$pdf->AddPage('L','A4');

// column titles


    $header = array('ສາຂາ', 'ວັນ/ເດືອນ/ປີ', 'ເວລາເລີ່ມສອນ ', 'ຈົບເວລາສອນ','ເບີຫ້ອງທີ່ໃຊ້ສອນ','ຫ້ອງສອນນັກສຶກສາ','ເນື້ອໃນການສອນ','ໝາຍເຫດ');
    
    $pdf->SetFont('phetsarath_ot', 'I', 16);
    $pdf->Cell(0, 10, 'ສາທາລະນະລັດ ປະຊາທິປະໄຕ ປະຊາຊົນລາວ', 0, 1, 'C');
        $pdf->Cell(0, 10, 'ສັນຕິພາບ ເອກະລາດ ປະຊາທິປະໄຕ ເອກະພາບ ວັດທະນາຖາວອນ', 0, 1, 'C');
        $pdf->SetFont('phetsarath_ot', 'I', 16);
        $pdf->Cell(0, 10, 'ໃບຕິດຕາມຊົ່ວໂມງຂຶ້ນຫ້ອງສອນ ຂອງຄູ-ອາຈານປະຈຳ ແລະ ຮັບເຊີນ (ຢູ່ສະຖາບັນການທະນາຄານ) ພາກປົກກະຕິ', 0, 1, 'C');
        $pdf->SetFont('phetsarath_ot', 'I', 14);
       
        
        $pdf->SetFont('phetsarath_ot', 'I', 14);
        $pdf->Cell(0, 10, 'ວິຊາທີສອນ.......................................................................ປະຈຳເດືອນ.....................ປີ '.date("Y").'   ຈຳນວນຫ້ອງທີ່ສອນ:..................ຫ້ອງ', 0, 1, '/n');
        $pdf->SetFont('phetsarath_ot', 'I', 12);


// data loading
$data = $pdf->LoadData();

// print colored table
$pdf->ColoredTable($header, $data);

// ---------------------------------------------------------

// close and output PDF document
$pdf->Output('pdf_maker.php', 'I');

//============================================================+
// END OF FILE
//============================================================+
?>