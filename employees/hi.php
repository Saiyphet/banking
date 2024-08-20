<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php
   
   define('FPDF_FONTPATH','../fpdf186/font/');
    require("./fpdf186/fpdf.php");
    $pdf = new FPDF('P', 'mm', array(100,150));
   
    $pdf->AddPage('L');
    $pdf->AddFont('SaysetthaWeb','','saysettha_web.php');
    $pdf->AddFont('SaysetthaWeb','B','saysettha_web.php');

    $pdf->SetFont('SaysetthaWeb','',16);
    $pdf->Cell(190,20,iconv('utf-8','cp874','ສະບາຍດີ'),1,1,'C');
    
    
    $pdf->Cell(0,10,"Registration Details",1,1,'C');
    

    
    $pdf->output();
    
    
    
?> -->

