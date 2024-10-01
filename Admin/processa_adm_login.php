<?php
include '../conexao.php';

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM administradores WHERE email = '$email' AND senha = '$senha'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 1){
    header("Location: adm_dashboard.php");
} else {
    echo "Email ou senha incorretos";
}

mysqli_close($conn);
?>