<!-- 
// include '../EmployeeLeaveSystem-PHP/includes/dbconn.php';
// $query = mysqli_query($connect,"SELECT LeaveType,FromDate,Description,PostingDate,AdminRemarkDate,AdminRemark,Status,timestart,endtime,classroom,class from tblleaves  order by ID desc");//SET eid='".$empid."'
// 		$row = mysqli_fetch_assoc($query);
//          $id =$_GET['empid'];
//          echo ($id);
//  $query->bind_param("i", $id);
//  $query->execute();
// $result = $query->get_result();
// include '../EmployeeLeaveSystem-PHP/includes/dbconn.php';
//         $id = 'ASTR001245';
//         // $query = mysqli_query($connect,"SELECT * FROM v_report_pdf WHERE v_report_pdf.EmpId = '$id'");//SET eid='".$empid."'
//         $query = "SELECT * FROM v_report_pdf WHERE v_report_pdf.EmpId = '$id'";
//         $result = $connect->query($query);
//         //  $id =$_GET['empid'];
//         // $query = "SELECT * FROM  tblemployees ";
//         // $result = $connect->query($query);
        
//         echo '<ul>';
// while ($row = $result->fetch_assoc()) {
//     echo '<li>' . $row['EmpId'].   '</li>';
// }
// echo '</ul>';




<>
/*include '../EmployeeLeaveSystem-PHP/includes/logged.php';
htmlentities($result->EmpId) = $_SESSION['empIDbyPass'];
?>*/




     <?php
include('./includes/dbconn.php');
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap CSS -->
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Dynamic pdf generate</title>
</head>

<body>
  <div class="container">

  
  
  <h1 class="text-center">PDF Generate in Php</h1>

  <div class="card">
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            
            <th scope="col">#</th>
            <th scope="col">ຊື່</th>
            <th scope="col">ນາມສະກຸນ</th>
            <th scope="col">ໄອດີພະນັກງານ</th>
           
            <th scope="col">print</th>
          </tr>
        </thead>
        <tbody>
          <?php $query = mysqli_query($connect,"SELECT  DISTINCT(FirstName), EmpId, LastName FROM v_report_pdf "); 
          $i=1;
          while($row = mysqli_fetch_assoc($query))
          {
          ?>
          <tr>
            <th scope="row"><?=$i++?>.</th>
            <p>ຊື້ ແລະ ນາມສະກຸນ<?=$row['FirstName']?></p>
            <td><?=$row['LastName']?></td>
            <td><?=$row['EmpId']?></td>
            
            <td>
              <a target="_blank" href="./get_data.php?EmpId=<?=$row['EmpId']?>" class="btn btn-sm btn-primary"> <i class="fa fa-file-pdf-o"></i> Print  Details</a>
            </td>
          </tr>
         <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

  </div>












  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>