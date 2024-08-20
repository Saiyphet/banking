<?php

session_start();
error_reporting(0);
include('includes/dbconn.php');

if (strlen($_SESSION['emplogin']) == 0) {
    header('location:../index.php');
} else {
    $eid=$_GET['EmpId'];
    $sql = "SELECT * from v_report_pdf where EmpId=:eid ";
    $query = $dbh -> prepare($sql);
    $query->bindParam(':eid', $eid, PDO::PARAM_STR);
    $query->execute();
    $data=$query->fetchAll(PDO::FETCH_OBJ);

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Details Pdf</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/icon/favicon.ico">
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="../assets/css/themify-icons.css">
        <link rel="stylesheet" href="../assets/css/metisMenu.css">
        <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="../assets/css/slicknav.min.css">
        <!-- amchart css -->
        <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css"
            media="all" />
        <!-- Start datatable css -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" type="text/css"
            href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
        <link rel="stylesheet" type="text/css"
            href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
        <!-- others css -->
        <link rel="stylesheet" href="../assets/css/typography.css">
        <link rel="stylesheet" href="../assets/css/default-css.css">
        <link rel="stylesheet" href="../assets/css/styles.css">
        <link rel="stylesheet" href="../assets/css/responsive.css">
        <link rel="stylesheet" href="../assets/css/fonts.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Lao&display=swap" rel="stylesheet">
        <!-- modernizr css -->
        <script src="../assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body onload="window.print()">
<div>
    
    <center>
        <p>ສາທາລະນະລັດ ປະຊາທິປະໄຕປະຊາຊົນລາວ<br>
             ສັນຕິພາບ ເອກະລາດ ປະຊາທິປະໄຕ ເອກະລາດ ວັດທະນາຖາວອນ</p> 
             <p>ໃບຕິດຕາມຂຶ້ນຫ້ອງສອນ ຂອງຄູ-ອາຈານປະຈຳ ແລະ ຮັບເຊີນ ຢູ່ ສທຄ (ພາກປົກກະຕິ) ສຳລັບວິຊາ 3 ໜ່ວຍກິດ</p> 
    </center>
    
    <p> ຊື່ ແລະ ນາມສະກຸນ 
    <?php 
    $FirstName = $_SESSION['FirstName'];
    $LastName = $_SESSION['LastName'];
    echo ($FirstName." ".$LastName);
    ?>
     </p>
        <p>ວິຊາທີ່ສອນ..............................ປະຈຳເດືອນ...........ປີ<?php echo date("Y")?>           ຈຳນວນຫ້ອງທີ່ສອນ........ຫ້ອງ</p>

    <table   border="1" class="table table-hover progress-table text-center"  >

    <tr>
                                                    <th width="80">ສາຂາ</th>
                                                    <th width="50">ວັນ/ເດືອນ/ປີ</th>
                                                    <th width="30">ເວລາເລີ່ມສອນ</th>
                                                    <th width="30">ຈົບເວລາສອນ</th>
                                                    <th width="30">ເບີຫ້ອງທີ່ໃຊ້ສອນ</th>
                                                    <th width="30">ຫ້ອງສອນນັກສຶກສາ</th>
                                                    <th width="120">ເນື້ອໃນການສອນ</th>
                                                    <th width="70">ໝາຍເຫດ</th>
                                                    
                                                    <!-- <th width="120">ໝາຍເຫດ</th> -->
                                                </tr>
    
   
   <tbody>
   <?php
   $eid=$_SESSION['eid'];
   $sql = "SELECT LeaveType,FromDate,Description,PostingDate,AdminRemarkDate,AdminRemark,Status,timestart,endtime,classroom,class from tblleaves where empid=:eid order by ID desc";
   $query = $dbh->prepare($sql);
   $query->bindParam(':eid', $eid, PDO::PARAM_STR);
   $query->execute();
   $results = $query->fetchAll(PDO::FETCH_OBJ);
   $cnt = 1;

   if ($query->rowCount() > 0) {
       foreach ($results as $result) { ?>

           <tr>
              
               <td>
                   <?php echo htmlentities($result->LeaveType); ?>
               </td>

               <td>
                   <?php echo htmlentities($result->FromDate); ?>
               </td>
               <td>
                   <?php echo htmlentities($result->timestart); ?>
               </td>
               <td>
                   <?php echo htmlentities($result->endtime); ?>
               </td>
               <td>
                   <?php echo htmlentities($result->classroom); ?>
               </td>
               <td>
                   <?php echo htmlentities($result->class); ?>
               </td>
               <td>
                   <?php echo htmlentities($result->Description); ?>
               </td>
               <td> <?php echo htmlentities(($result->AdminRemark)); ?></td>

           </tr>

           <?php $cnt++;
       }
   } ?>

</tbody>
        
    </table>
</body>
<style>
 @font-face {
    font-family:Phetsarath;
    src: url(Phetsarath.ttf) 
  }

  
body{
    font-family:'Phetsarath','times new roman' ;
    font-size: 12 px;
}
.font{
    
   
    font-family: 'Phetsarath';

}
table {
  font-family: 'Phetsarath';
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}
tr:nth-child(even){background-color: #f2f2f2}

</style>
</html>
<?php } ?>