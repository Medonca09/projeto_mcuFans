<?php
include '../conexao.php';

$queryDetalhes = "SELECT filmes.titulo, AVG(avaliacoes.nota) AS media 
                  FROM filmes
                  LEFT JOIN avaliacoes ON filmes.id = avaliacoes.id_filme
                  GROUP BY filmes.titulo";

$resultDetalhes = mysqli_query($conn, $queryDetalhes);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes das Avaliações</title>
    <link rel="stylesheet" href="../CSS/mediaAvaliacao.css">
</head>

<body>
    <header>
        <h2>Bem-vindo, Administrador</h2>
        <nav class="navegacao">
            <a href="./adm_dashboard.php">Voltar</a>
        </nav>
    </header>

    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Filmes</th>
                    <th>Média de Avaliações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($resultDetalhes)) {
                    echo "<tr>";
                    echo "<td>" . $row['titulo'] . "</td>";
                    echo "<td>" . ($row['media'] !== null ? number_format($row['media'], 2) : "Sem avaliações") . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>