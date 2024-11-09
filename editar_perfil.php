<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.html");
    exit();
}

include 'conexao.php';

$usuario_id = $_SESSION['usuario_id'];

$sql = "SELECT nome, email, foto FROM usuarios_comuns WHERE id = $usuario_id";
$result = mysqli_query($conn, $sql);
$usuario = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    if (!empty($_FILES['foto']['name'])) {
        $foto_nome = $_FILES['foto']['name'];
        $foto_temp = $_FILES['foto']['tmp_name'];
        $diretorio = "Assets/";
        $caminho_foto = $diretorio . $foto_nome;
        move_uploaded_file($foto_temp, $caminho_foto);
    } else {
        $caminho_foto = $usuario['foto'];
    }
    $sql_update = "UPDATE usuarios_comuns SET nome = '$nome', email = '$email', foto = '$caminho_foto' WHERE id = $usuario_id";
    if (mysqli_query($conn, $sql_update)) {
        $_SESSION['nome'] = $nome;
        $_SESSION['foto'] = $caminho_foto;
        echo "Dados atualizados com sucesso!";
    } else {
        echo "Erro ao atualizar os dados: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Editar Perfil</title>
    <link rel="stylesheet" href="CSS/editar_perfil.css">
</head>

<body>
    <div class="container">
        <div class="fundoDark"></div>
        <div class="formulario">
            <h2>Editar Perfil</h2>
            <form action="editar_perfil.php" method="POST" enctype="multipart/form-data">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="<?php echo $usuario['nome']; ?>" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $usuario['email']; ?>" required>

                <div class="foto-atual">
                    <?php if (!empty($usuario['foto'])): ?>
                        <img src="<?php echo $usuario['foto']; ?>" alt="Foto Atual" width="100" height="100">
                    <?php else: ?>
                        <p>Foto não definida</p>
                    <?php endif; ?>
                </div>

                <input type="file" id="foto" name="foto" accept="image/*">

                <input type="submit" value="Salvar Alterações">
            </form>
            <button onclick="window.location.href='bem_vindo.php'">Cancelar</button>
        </div>
    </div>
</body>

</html>