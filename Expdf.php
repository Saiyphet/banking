<?php 
session_start();
error_reporting(0);

include('includes/dbconn.php');
require 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();

$eid=$_SESSION['eid'];

$sql = "SELECT DISTINCT * FROM `v_report_user` WHERE v_report_user.idEmp=:eid order by ID desc";
$query = $dbh->prepare($sql);
$query->bindParam(':eid', $eid, PDO::PARAM_STR);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
$cnt = 1;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
ob_start();
require('export.php');
$html =ob_get_contents();
ob_get_clean();

$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'Landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('print-details.pdf',['Attachment'=>false]);

?>