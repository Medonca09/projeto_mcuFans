<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/listarFilmes.css">
    <link rel="shortcut icon" href="../Assets/marvelLogo.png" type="image/x-icon">
    <title>Lista de Filmes</title>
</head>

<body>

    <header class="nav">
        <h2>Lista de Filmes</h2>

        <nav class="navegacao">
            <a href="adm_dashboard.php">Voltar</a>
        </nav>
    </header>

    <div class="main">
        <div class="content">
            <?php
            include '../conexao.php';

            $sql = "SELECT * FROM filmes";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='filme-card'>";
                    echo "<img src='../Assets/" . $row['imagem'] . "' alt='" . $row['titulo'] . "'>";
                    echo "<div class='filme-info'>";
                    echo "<a href='editar_filme.php?id=" . $row['id'] . "'>Editar</a>";
                    echo "<a href='excluir_filme.php?id=" . $row['id'] . "'>Excluir</a>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "Nenhum filme cadastrado.";
            }
            ?>
        </div>
    </div>
</body>

</html>