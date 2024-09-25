<?php 

$host = 'localhost';
$dbname = 'mcu_fans_php';
$username = 'root';
$password = '';

$conn = mysqli_connect($host, $username, $password, $dbname);

if(!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}
?>