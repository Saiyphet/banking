<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Font Table</title>
    <link rel="stylesheet" href="../EmployeeLeaveSystem-PHP/assets/css/fonts.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Lao&display=swap" rel="stylesheet">
    <style>
        @font-face {
    font-family:Phetsarath;
    src: url(./Phetsarath.ttf);
  }  
  body{
    font-family:'Phetsarath' ;
    font-size: 12 px;
}
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
  
    </style>
</head>
<body>
<p class="f">ສະບາຍດີ</p>
<?php
// Array of fonts
$fonts = array("ັຫກ", "Times New Roman");

// Number of rows and columns in the table
$rows = 5;
$cols = 3;

echo "<table>";

// Header row
echo "<tr>";
for ($j = 1; $j <= $cols; $j++) {
    echo "<th>Column ຫວກເ $j</th>";
}
echo "</tr>";

// Data rows
for ($i = 1; $i <= $rows; $i++) {
    echo "<tr>";

    // Populate cells with random fonts
    for ($j = 1; $j <= $cols; $j++) {
        $randomFont = $fonts[array_rand($fonts)];
        echo "<td style=\"font-family: $randomFont;\">$randomFont</td>";
    }

    echo "</tr>";
}

echo "</table>";
?>

</body>

</html>