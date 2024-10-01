<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Bem-vindo</title>
    <link rel="shortcut icon" href="Assets/marvelLogo.png" type="image/x-icon">
    <link rel="stylesheet" href="CSS/bemVindo.css">
</head>

<body>
    <header>
        <nav>
            <h2>Bem-vindo,
                <?php echo $_SESSION['nome']; ?>!
            </h2>
            <div class="nav-links">
                <img src="<?php echo $_SESSION['foto']; ?>" alt="Foto de Perfil">
                <a href="./index.html">Home</a>
                <a href="#">Avaliações</a>
                <a href="logout.php">Logout</a>
            </div>
        </nav>
    </header>
    <h3>Conteúdo da Tela de Boas-Vindas</h3>
    <div class="contents">
        
    </div>
</body>

</html>