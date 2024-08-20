<?php 
 include('./includes/dbconn.php');
require 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->set('chroot',realpath(''));
$options->set('defaultFont','Phetsarath');
$eid=$_GET['EmpId'];
    $sql = "SELECT * from v_report_pdf where EmpId=:eid ";
    $query = $dbh -> prepare($sql);
    $query->bindParam(':eid', $eid, PDO::PARAM_STR);
    $query->execute();
    $data=$query->fetchAll(PDO::FETCH_OBJ);
    $id = $_GET['EmpId'];
    $sql = mysqli_query($connect,"SELECT * FROM v_report_pdf WHERE EmpId='$id'");
    $user = mysqli_fetch_assoc($sql);
    
// instantiate and use the dompdf class
$dompdf = new Dompdf($options);
ob_start();
require('details.php');
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
