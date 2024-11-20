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
                <img src="<?php echo $_SESSION['foto']; ?>" alt="Foto de Perfil" id="foto-perfil" style="cursor: pointer;">
                <a href="./bem_vindo.php">Home</a>
                <a href="./fases.html">Fases</a>
                <a href="logout.php">Sair</a>
            </div>
        </nav>
    </header>
    <div class="text">
        <h3>Catálogo de Filmes</h3>
    </div>
    <div class="container">
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($filme = mysqli_fetch_assoc($result)) {
                echo "<div class='card'>";
                echo "<div class='card-content'>";
                echo "<img src='Assets/" . $filme['imagem'] . "' alt='Imagem do filme'>";
                echo "<div class='overlay'>";
                echo "<h3>" . $filme['titulo'] . "</h3>";
                echo "<button onclick=\"location.href='avaliar_filme.php?id=" . $filme['id'] . "'\">Avaliar Filme</button>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<p>Nenhum filme disponível.</p>";
        }
        ?>
    </div>

    <div id="modal-foto" class="modal">
        <div class="modal-content">
            <img src="<?php echo $_SESSION['foto']; ?>" alt="Foto do Usuário em Tamanho Grande">
            <div class="modal-buttons">
                <button onclick="fecharModal()">Cancelar</button>
                <button onclick="location.href='editar_perfil.php'">Editar Perfil</button>
            </div>
        </div>
    </div>

    <script src="JS/modalFotoUsuario.js"></script>
</body>

</html>