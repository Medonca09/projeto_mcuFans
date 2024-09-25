<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.html"); // Redirecionar para o login se não estiver logado
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Bem-vindo</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <header>
        <h2>Bem-vindo, <?php echo $_SESSION['nome']; ?>!</h2>
        <img src="<?php echo $_SESSION['foto']; ?>" alt="Foto de Perfil" style="width: 50px; height: 50px;">
        <nav>
            <a href="#">Home</a>
            <a href="#">Avaliações</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>
    <div>
        <h3>Conteúdo da Tela de Boas-Vindas</h3>
        <!-- Aqui você pode adicionar mais conteúdo -->
    </div>
</body>
</html>
