<!-- <php
$dbHost = 'localhost';
$dbName = 'employeeleavedb';
$dbUser = 'root';
$dbPassword = '';

try {
    $pdo = new PDO(mysql:host=$dbHost;dbname=$dbName , $dbUser, $dbPassword)
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e)
 {
    die("Database connection failed: " . $e->getMessage());
}
?> -->

<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $database = "employeeleavedb";

    // create connection
    $conn = mysqli_connect($host, $user, $pass, $database);
    mysqli_set_charset($conn, "utf8");

    // check connection
    if ($conn->connect_error){
        die("connection failed: " . $conn->connect_error);
    }

    // echo "connected successfully";
?>