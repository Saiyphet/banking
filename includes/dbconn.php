<?php 
    define('DB_HOST','localhost');
    define('DB_USER','root');
    define('DB_PASS','');
    define('DB_NAME','employeeleavedb');
    
    try
    {
        $dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    }
        catch (PDOException $e)
    {
        echo "Looks like you don't have any database/connection for this project. Please check your Database Connection and Try Again! </br>";
        exit("Error: " . $e->getMessage());
    }
?>

<?php
$hostname = "localhost";
$username = "root";
$password = "";  
$database = "employeeleavedb";   
$connect=mysqli_connect($hostname,$username,$password,$database);  



  

?> 
<?php 
define('HOST','localhost');
define('DBUSER','root');
define('DBPASSWORD','');
define('DB','employeeleavedb');

$con =mysqli_connect(HOST,DBUSER,DBPASSWORD,DB);
if($con->connect_errno)
{
    echo 'database connection error';
}
 ?>