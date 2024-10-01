<?php 

$host = 'localhost';
$dbname = 'projeto_mcu_fans';
$username = 'root';
$password = '';

$conn = mysqli_connect($host, $username, $password, $dbname);

if(!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}
?>