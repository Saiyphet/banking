<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details Pdf</title>
</head>
<body>
    <p style="text-align: center;">User Details</p>
    <center>
        <p>ສາທາລະນະລັດ ປະຊາທິປະໄຕປະຊາຊົນລາວ<br>
             ສັນຕິພາບ ເອກະລາດ ປະຊາທິປະໄຕ ເອກະລາດ ວັດທະນາຖາວອນ</p> 
             <p>ໃບຕິດຕາມຂຶ້ນຫ້ອງສອນ ຂອງຄູ-ອາຈານປະຈຳ ແລະ ຮັບເຊີນ ຢູ່ ສທຄ (ພາກປົກກະຕິ) ສຳລັບວິຊາ 3 ໜ່ວຍກິດ</p>
        
    </center>
    <table  width="100%" border="1">
        <tr>
            <td><b>Name:</b></td>
            <td><?= $user['employee_name'] ?></td>
            <td><b>Email:</b></td>
            <td><?= $user['employee_salary'] ?></td>
        </tr>
        <tr>
            <td><b>Mobile:</b></td>
            <td><?= $user['employee_age'] ?></td>
            <td><b>Address:</b></td>
          
        </tr>
    </table>
</body>
<style>
@font-face {
    font-family:Phetsarath;
    src: url(Phetsarath.ttf);
  }  
body{
    font-family:Phetsarath ;
    fon-size: 14 px;
}
</style>
</html>