<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.html");
    exit();
}
include 'conexao.php';

$sql = "SELECT * FROM filmes";
$result = mysqli_query($conn, $sql);
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
            <h2>Bem-vindo, <?php echo $_SESSION['nome']; ?>!</h2>
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
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($filme = mysqli_fetch_assoc($result)) {
                echo "<div class='card'>";
                echo "<h3>" . $filme['titulo'] . "</h3>";
                echo "<img src='assets/" . $filme['imagem'] . "' alt='Imagem do filme'><br>";
                echo "<button onclick=\"location.href='avaliar_filme.php?id=" . $filme['id'] . "'\">Avaliar Filme</button>";
                echo "</div>";
            }
        } else {
            echo "<p>Nenhum filme disponível.</p>";
        }
        ?>
    </div>
</body>

</html>
