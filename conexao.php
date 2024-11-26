<?php
$dbhost = "mysql_db";
$dbname = "fisicaonline";
$dbuser = "root";
$dbpass = "root";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname, 3306);

if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}
?>
