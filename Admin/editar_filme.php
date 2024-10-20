<?php
include '../conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM filmes WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $filme = mysqli_fetch_assoc($result);
    } else {
        echo "Filme não encontrado.";
        exit;
    }
} else {
    echo "ID do filme não fornecido.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $data_lancamento = $_POST['data_lancamento'];
    $diretor = $_POST['diretor'];
    $genero = $_POST['genero'];
    $imagem = $filme['imagem'];

    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $nova_imagem = $_FILES['imagem']['name'];
        $caminho_imagem = 'Assets/' . basename($nova_imagem);

        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminho_imagem)) {
            $imagem = $nova_imagem;
        } else {
            echo "Erro ao fazer upload da nova imagem.";
        }
    }

    $sql_update = "UPDATE filmes SET titulo='$titulo', descricao='$descricao', data_lancamento='$data_lancamento', 
                   diretor='$diretor', genero='$genero', imagem='$imagem' WHERE id=$id";

    if (mysqli_query($conn, $sql_update)) {
        echo "Filme atualizado com sucesso!";
        header("Location: listar_filmes.php");
        exit;
    } else {
        echo "Erro ao atualizar filme: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Filme</title>
</head>
<body>

<h2>Editar Filme</h2>

<form action="editar_filme.php?id=<?php echo $filme['id']; ?>" method="post" enctype="multipart/form-data">
    <label for="titulo">Título:</label>
    <input type="text" name="titulo" value="<?php echo $filme['titulo']; ?>" required><br><br>

    <label for="descricao">Descrição:</label>
    <textarea name="descricao" required><?php echo $filme['descricao']; ?></textarea><br><br>

    <label for="data_lancamento">Data de Lançamento:</label>
    <input type="date" name="data_lancamento" value="<?php echo $filme['data_lancamento']; ?>" required><br><br>

    <label for="diretor">Diretor:</label>
    <input type="text" name="diretor" value="<?php echo $filme['diretor']; ?>" required><br><br>

    <label for="genero">Gênero:</label>
    <input type="text" name="genero" value="<?php echo $filme['genero']; ?>"><br><br>

    <label for="imagem">Imagem do Filme:</label>
    <input type="file" name="imagem"><br><br>
    <img src="Assets/<?php echo $filme['imagem']; ?>" width="150"><br><br>

    <button type="submit">Salvar Alterações</button>
</form>

<a href="listar_filmes.php">Voltar à Lista de Filmes</a>

</body>
</html>
