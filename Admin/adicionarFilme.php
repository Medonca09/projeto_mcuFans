<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Filme</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <h2>Adicionar Novo Filme</h2>
    <form action="processa_adicionar_filme.php" method="POST" enctype="multipart/form-data">
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" required><br><br>

        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao" rows="4" required></textarea><br><br>

        <label for="data_lancamento">Data de Lançamento:</label>
        <input type="date" id="data_lancamento" name="data_lancamento" required><br><br>

        <label for="diretor">Diretor:</label>
        <input type="text" id="diretor" name="diretor" required><br><br>

        <label for="genero">Gênero:</label>
        <input type="text" id="genero" name="genero" required><br><br>

        <label for="imagem">Imagem do Filme:</label>
        <input type="file" id="imagem" name="imagem" accept="image/*"><br><br>

        <input type="submit" value="Adicionar Filme">
    </form>
</body>
</html>
