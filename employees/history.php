<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>asdasd</p>
<?php
include("../includes/dbconn.php");

 if (isset($_GET['EmpId'])) {
    // Retrieve the ID from the query string
    $id = $_GET['EmpId'];
    
$sql = "SELECT LeaveType,FromDate,Description,PostingDate,AdminRemarkDate,AdminRemark,Status,timestart,endtime,classroom,class from tblleaves where empid=$id order by ID desc";
$result = $mysqli->query($sql);
if ($result && $result->num_rows > 0) {

    echo "<p><tr><td> {$row['LeaveType']}</td></tr></p>";
}
 }
?>
</body>
</html>