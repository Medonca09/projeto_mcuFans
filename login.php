<?php
session_start();
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $senha = $_POST['senha'];

    // Consultar o banco de dados para verificar as credenciais
    $sql = "SELECT * FROM usuarios_comuns WHERE email='$email'";
    $resultado = mysqli_query($conn, $sql);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $usuario = mysqli_fetch_assoc($resultado);

        // Verificar a senha
        if (password_verify($senha, $usuario['senha'])) {
            // Armazenar os dados do usuário na sessão
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['foto'] = $usuario['foto'];

            // Redirecionar para a página de boas-vindas
            header("Location: bem_vindo.php");
            exit();
        } else {
            echo "Senha incorreta!";
        }
    } else {
        echo "Usuário não encontrado!";
    }
}

mysqli_close($conn);
?>
