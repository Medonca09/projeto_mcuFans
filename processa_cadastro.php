<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);
    
    $foto = $_FILES['foto']['name'];
    $target_dir = "assets/";
    $target_file = $target_dir . basename($foto);
    move_uploaded_file($_FILES['foto']['tmp_name'], $target_file);

    $sql = "INSERT INTO usuarios_comuns (nome, email, senha, foto) VALUES ('$nome', '$email', '$senha', '$target_file')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Cadastro realizado com sucesso!";
        header("Location: index.html");
        exit();
    } else {
        echo "Erro: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
