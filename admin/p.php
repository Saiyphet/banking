<?php include '../includes/dbconnect.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>list file</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Bootstrap 5 Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            font-family: 'Noto Sans Lao';
        }
    </style>
</head>

<body>
    <div class="fs-5 text-center mt-5 mb-3 fw-bold">
        <h3>ພິມໃບຢັ້ງຢືນທີ່ຢູ່</h3>
    </div>

    <div class="container-fluid">
        <div class="card-body text-end">
            <a href="user_add.php" type="button" class="btn btn-outline-success btn-sm"><i class="bi bi-file-earmark-plus me-1"></i>ເພີ່ມຂໍ້ມູນໃຫມ່</a>
        </div>
    </div>

    <div class="container-fluid">
        <table id="myTable" class="table table-bordered table-hover">
            <thead style="background-color: #FCF3CF;">
                <th class="text-center">ລະຫັດ</th>
                <th class="text-start">ຊື່</th>
                <th class="text-start">ນາມສະກຸນ</th>
                <th class="text-center">ເພດ</th>
                <th class="text-center">ວັນ/ເດືອນ/ປີເກີດ</th>
                <th class="text-center">ພິມໃບຢັ້ງຢືນ</th>
            </thead>

            <tbody>
                <?php
                $query = "SELECT * FROM v_report_pdf ORDER BY EmpId";
                $result = mysqli_query($conn, $query);
                $result_num = mysqli_num_rows($result);
                if ($result_num > 0) {
                    foreach ($result as $row) {
                        $EmpId = $row['EmpId'];
                        $FirstName = $row['FirstName'];
                        $LastName = $row['LastName'];
                        
                       
                ?>
                        <tr>
                            <td class="text-center"><?= $EmpId ?></td>
                            <td class="text-start"><?= $FirstName ?></td>
                            <td class="text-start"><?= $LastName ?></td>
                          
                         
                            <td class="text-center">
                                <a class="btn btn-outline-primary btn-sm" href="printexport.php?EmpId=<?= $EmpId ?>">
                                    <i class="bi bi-printer-fill"></i> ພິມໃບຢັ້ງຢືນ
                                </a>
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