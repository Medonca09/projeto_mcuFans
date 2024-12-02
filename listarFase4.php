<?php

include './conexao.php';

$ids_filmes = [25, 26, 27, 28, 29, 30, 31];

$ids_filmes_str = implode(',', $ids_filmes);

$sql_filmes = "SELECT * FROM filmes WHERE id IN ($ids_filmes_str)";
$result_filmes = mysqli_query($conn, $sql_filmes);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmes em Destaque</title>
    <link rel="shortcut icon" href="Assets/marvelLogo.png" type="image/x-icon">
    <link rel="stylesheet" href="./CSS/faseListagem.css">
</head>

<body>
    <header>
        <h2 class="logo">MCU Fans</h2>

        <nav class="navegacao">
            <a href="./fases.html">Voltar</a>
        </nav>
    </header>
    <div class="filmes-container">
        <?php
        if (mysqli_num_rows($result_filmes) > 0) {
            while ($filme = mysqli_fetch_assoc($result_filmes)) {
                echo "<div class='filme-card'>";
                echo "<img src='Assets/{$filme['imagem']}' alt='Imagem do filme' class='filme-imagem'>";
                echo "<h3>{$filme['titulo']}</h3>";
                echo "<a href='avaliar_filme.php?id={$filme['id']}' class='btn-detalhes'>Ver Detalhes</a>";
                echo "</div>";
            }
        } else {
            echo "<p>Nenhum filme encontrado.</p>";
        }
        ?>
    </div>

</body>

</html>