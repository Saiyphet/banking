<?php 
include '../includes/dbconnect.php';
$EmpId = $_GET['EmpId'];

// get info from database with user_id
$query_info = "SELECT * FROM v_report_pdf WHERE EmpID = '$EmpId'";
$result_info = mysqli_query($conn, $query_info);

if ($result_info) {
    $row_info = mysqli_fetch_assoc($result_info);
    if ($row_info) {
        $EmpId = isset($row_info['EmpId']) ? $row_info['EmpId'] : '';
        $FirstName = isset($row_info['FirstName']) ? $row_info['FirstName'] : '';
        $LastName = isset($row_info['LastName']) ? $row_info['LastName'] : '';
        $LeaveType = isset($row_info['LeaveType']) ? $row_info['LeaveType'] : '';
        $Fromdate = isset($row_info['Fromdate']) ? $row_info['Fromdate'] : '';
        $timestart = isset($row_info['timestart']) ? $row_info['timestart'] : '';
        $endtime = isset($row_info['endtime']) ? $row_info['endtime'] : '';
        $classroom = isset($row_info['classroom']) ? $row_info['classroom'] : '';
        $class = isset($row_info['class']) ? $row_info['class'] : '';
        $Description = isset($row_info['Description']) ? $row_info['Description'] : '';
        $Status = isset($row_info['stats']) ? $row_info['stats'] : '';
    } else {
        echo "No data found for the specified EmpID.";
        exit;
    }
} else {
    echo "Error in executing query: " . mysqli_error($conn);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>print report</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <style>
        body {
            font-family: 'Phetsarath OT';
        }

        .nation_logo {
            margin-top: 20px;
            margin-bottom: 10px;
            text-align: center;
        }

        .head_title {
            text-align: center;
            font-size: 12pt;
            font-weight: 800;
        }

        .text_title {
            font-size: 16pt;
            font-weight: bolder;
        }

        .text_no {
            margin-top: 20px;
        }

        .line {
            line-height: 1.8;
        }
    </style>
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
    echo htmlspecialchars($FirstName . " " . htmlspecialchars($LastName));
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
                                                    <!-- <th width="70">ໝາຍເຫດ</th> -->
                                                    <!-- <th width="120">ໝາຍເຫດ</th> -->
                                                </tr>
    
   
   <tbody>
   <?php
                   $query = "SELECT * FROM v_report_pdf ORDER BY EmpId";
            $result = mysqli_query($conn, $query);
            $result_num = mysqli_num_rows($result);
            if ($result_num > 0) {
                foreach ($result as $row) {
                    $LeaveType = isset($row['LeaveType']) ? $row['LeaveType'] : '';
                    $Fromdate = isset($row['Fromdate']) ? $row['Fromdate'] : '';
                    $timestart = isset($row['timestart']) ? $row['timestart'] : '';
                    $endtime = isset($row['endtime']) ? $row['endtime'] : '';
                    $classroom = isset($row['classroom']) ? $row['classroom'] : '';
                    $class = isset($row['class']) ? $row['class'] : '';
                    $Description = isset($row['Description']) ? $row['Description'] : '';
                    $Status = isset($row['Status']) ? $row['Status'] : '';
        ?>
                        <tr>
                            <td class="text-center"><?= $LeaveType ?></td>
                            <td class="text-start"><?= $Fromdate ?></td>
                            <td class="text-start"><?= $timestart ?></td>
                            <td class="text-center"><?= $endtime ?></td>
                            <td class="text-start"><?= $classroom ?></td>
                            <td class="text-start"><?= $class ?></td>
                            <td class="text-center"><?= $Description ?></td>
                            
                            <td class="text-center">
                                <?php
                                 
                                 if ($Status == 1) {
                                     ?>
                                     <span style="color: green">ຍືນຍັນ</span>
                                 <?php }
                                 if ($Status == 2) { ?>
              
                                     <span style="color: red">ບໍ່ຮັບການຍືນຍັນ</span>
                                 <?php }
                                 if ($Status == 0) { ?>
              
                                     <span style="color: blue">ກຳລັງຍືນຍັງ</span>
                                 <?php } ?>
                            
                            </td>
                           
                            
                        </tr>
                <?php
                    }
                } else {
                    $sms = "ບໍ່ມີຂໍ້ມູນທີ່ບັນທຶກ";
                    echo '<tr>
                    <td colspan="6" align="center">' . $sms . '</td>
                    </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>