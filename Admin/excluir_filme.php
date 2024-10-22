<?php
if (isset($_GET['id'])) {
    $filme_id = $_GET['id'];

    include '../conexao.php';

    $sql = "SELECT imagem FROM filmes WHERE id = $filme_id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $filme = mysqli_fetch_assoc($result);
        $imagem = $filme['imagem'];
        $caminho_imagem = '../Assets/' . $imagem;

        $sql = "DELETE FROM filmes WHERE id = $filme_id";
        if (mysqli_query($conn, $sql)) {
            if (file_exists($caminho_imagem)) {
                unlink($caminho_imagem);
            }
            echo "Filme excluído com sucesso!";
        } else {
            echo "Erro ao excluir o filme: " . mysqli_error($conn);
        }
    } else {
        echo "Filme não encontrado.";
    }

    mysqli_close($conn);
} else {
    echo "ID do filme não fornecido.";
}
