<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Filme</title>
    <link rel="stylesheet" href="../CSS/addFilme.css">
    <link rel="shortcut icon" href="../Assets/marvelLogo.png" type="image/x-icon">
</head>

<body>
    <div class="container">
        <div class="fundoDark"></div>
        <form action="processa_adicionar_filme.php" method="POST" enctype="multipart/form-data">
            <div class="titulo">
                <h2>Adicionar Novo Filme</h2>
                <div class="barra"></div>
            </div>
            <div class="campos-input">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" required>
            </div>

            <div class="campos-input">
                <label for="descricao">Descrição:</label>
                <textarea id="descricao" name="descricao" rows="4" required></textarea>
            </div>

            <div class="campos-input">
                <label for="data_lancamento">Data de Lançamento:</label>
                <input type="date" id="data_lancamento" name="data_lancamento" required>
            </div>

            <div class="campos-input">
                <label for="diretor">Diretor:</label>
                <input type="text" id="diretor" name="diretor" required>
            </div>

            <div class="campos-input">
                <label for="genero">Gênero:</label>
                <input type="text" id="genero" name="genero" required>
            </div>

            <div class="campos-input">
                <label for="imagem">Imagem do Filme:</label>
                <input type="file" id="imagem" name="imagem" accept="image/*">
            </div>

            <div class="adicionar">
                <input type="submit" value="Adicionar Filme">
            </div>
        </form>
    </div>

</body>

</html>