
<html>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
   <input type="date" name="fromdate">
  <input type="submit">
</form>

<!-- <?php
include('../includes/dbconn.php');
$todate=$_POST['fromdate'];
$sql="INSERT INTO tblleaves (fromdate) VALUES(:fromdate)";
$query = $dbh->prepare($sql);
$query->bindParam(':fromdate',$todate,PDO::PARAM_STR);
$query->execute();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field
  $name = $_POST['fromdate'];
  if (empty($name)) {
    echo "Name is empty";
  } else {
    echo $name;
  }
}
?> -->

</body>
</html>