<?php 

$host = 'localhost';
$dbname = 'novo_banco_mcufans';
$username = 'root';
$password = '';

$conn = mysqli_connect($host, $username, $password, $dbname);

if(!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}
?>