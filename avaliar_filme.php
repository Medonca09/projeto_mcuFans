<?php
session_start();
include 'conexao.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.html");
    exit();
}

if (!isset($_GET['id'])) {
    echo "Filme não encontrado.";
    exit();
}

$id_filme = $_GET['id'];
$id_usuario = $_SESSION['usuario_id'];

$sql_filme = "SELECT * FROM filmes WHERE id = $id_filme";
$result_filme = mysqli_query($conn, $sql_filme);
$filme = mysqli_fetch_assoc($result_filme);

if (!$filme) {
    echo "Filme não encontrado.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nota']) && isset($_POST['comentario'])) {
    $nota = $_POST['nota'];
    $comentario = mysqli_real_escape_string($conn, $_POST['comentario']);

    $sql_insert = "INSERT INTO avaliacoes (id_usuario, id_filme, nota, comentario) VALUES ($id_usuario, $id_filme, $nota, '$comentario')";
    if (mysqli_query($conn, $sql_insert)) {
        echo "Avaliação adicionada com sucesso!";
    } else {
        echo "Erro ao adicionar avaliação: " . mysqli_error($conn);
    }
}

$sql_avaliacoes = "SELECT u.nome, a.nota, a.comentario, a.data_avaliacao FROM avaliacoes a JOIN usuarios_comuns u ON a.id_usuario = u.id WHERE a.id_filme = $id_filme ORDER BY a.data_avaliacao DESC";
$result_avaliacoes = mysqli_query($conn, $sql_avaliacoes);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Avaliar Filme</title>
    <link rel="stylesheet" href="CSS/avaliarFilme.css">
    <link rel="shortcut icon" href="Assets/marvelLogo.png" type="image/x-icon">
    <link rel="stylesheet" href="./CSS/avaliarFilme.css">
</head>

<body>
    <header>
        <h2>Avaliação do Filme: <?php echo $filme['titulo']; ?></h2>
    </header>

    <div class="filme-detalhes">
        <img src="Assets/<?php echo $filme['imagem']; ?>" alt="Imagem do filme">
        <p><?php echo $filme['descricao']; ?></p>
    </div>

    <div class="avaliacao-form">
        <form action="" method="POST">
            <label for="comentario">Comentário:</label>
            <textarea name="comentario" id="comentario" placeholder="Escreva seu comentário aqui..."></textarea>

            <label>Avaliação:</label>
            <div class="rating">
                <span class="star" data-value="1">&#9733;</span>
                <span class="star" data-value="2">&#9733;</span>
                <span class="star" data-value="3">&#9733;</span>
                <span class="star" data-value="4">&#9733;</span>
                <span class="star" data-value="5">&#9733;</span>
            </div>

            <input type="hidden" name="nota" id="nota" value="0">
            <button type="submit" name="submit">Enviar Avaliação</button>
        </form>
    </div>

    <div class="comentarios">
        <h3>Comentários:</h3>
        <?php
        if (mysqli_num_rows($result_avaliacoes) > 0) {
            while ($avaliacao = mysqli_fetch_assoc($result_avaliacoes)) {
                echo "<div class='comentario'>";
                echo "<strong>" . $avaliacao['nome'] . "</strong> ";
                echo "<span>(" . $avaliacao['nota'] . " Estrelas)</span>";
                echo "<p>" . $avaliacao['comentario'] . "</p>";
                echo "<small>" . date('d/m/Y H:i', strtotime($avaliacao['data_avaliacao'])) . "</small>";
                echo "</div>";
            }
        } else {
            echo "<p>Nenhum comentário para este filme.</p>";
        }
        ?>
    </div>
</body>
<script src="./JS/avaliacaoFilme.js"></script>

</html>