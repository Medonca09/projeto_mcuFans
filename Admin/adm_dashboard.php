<?php

include '../conexao.php';

$queryUsuarios = "SELECT COUNT(*) AS total FROM usuarios_comuns";
$queryComentarios = "SELECT COUNT(*) AS total FROM avaliacoes";
$queryFilmes = "SELECT COUNT(*) AS total FROM filmes";

$resultUsuarios = mysqli_query($conn, $queryUsuarios);
$resultComentarios = mysqli_query($conn, $queryComentarios);
$resultFilmes = mysqli_query($conn, $queryFilmes);

$totalUsuarios = mysqli_fetch_assoc($resultUsuarios)['total'];
$totalComentarios = mysqli_fetch_assoc($resultComentarios)['total'];
$totalFilmes = mysqli_fetch_assoc($resultFilmes)['total'];
?>



<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Administrador - MCU Fans</title>
    <link rel="shortcut icon" href="../Assets/marvelLogo.png" type="image/x-icon">
    <link rel="stylesheet" href="../CSS/admDashboard.css">
</head>

<body>
    <header>
        <h2>Bem-vindo, Administrador</h2>
        <nav class="navegacao">
            <a href="./adicionarFilme.php">Adicionar Filme</a>
            <a href="./listar_filmes.php">Filmes</a>
            <a href="../Admin/gerenciar_comentarios.php">Comentários</a>
            <a href="logout_adm.php">Sair</a>
        </nav>
    </header>

    <div class="container">
        <div class="cards">
            <div class="card">
                <h4>Usuários</h4>
                <p id="total-usuarios"><?php echo $totalUsuarios; ?></p>
                <button onclick="location.href='./gerenciar_usuarios.php'">Gerenciar Usuários</button>
            </div>
            <div class="card">
                <h4>Comentários</h4>
                <p id="total-comentarios"><?php echo $totalComentarios; ?></p>
                <button onclick="location.href='./gerenciar_comentarios.php'">Gerenciar Comentários</button>
            </div>
            <div class="card">
                <h4>Filmes</h4>
                <p id="total-filmes"><?php echo $totalFilmes; ?></p>
                <button onclick="location.href='./listar_filmes.php'">Gerenciar Filmes</button>
            </div>
        </div>

    </div>

    </div>
</body>

</html>