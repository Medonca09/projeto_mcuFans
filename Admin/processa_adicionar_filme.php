<?php
include '../conexao.php';

if (!$conn) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

if (isset($_POST['titulo'], $_POST['descricao'], $_POST['data_lancamento'], $_POST['diretor'], $_POST['genero'])) {

    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $data_lancamento = $_POST['data_lancamento'];
    $diretor = $_POST['diretor'];
    $genero = $_POST['genero'];

    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $imagem = $_FILES['imagem']['name'];
        $caminho_imagem = '../Assets/' . basename($imagem);

        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminho_imagem)) {
            $sql = "INSERT INTO filmes (titulo, descricao, data_lancamento, diretor, genero, imagem) 
                    VALUES ('$titulo', '$descricao', '$data_lancamento', '$diretor', '$genero', '$caminho_imagem')";

            if (mysqli_query($conn, $sql)) {
                echo '
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/sucesso.css">
    <link rel="shortcut icon" href="../Assets/marvelLogo.png" type="image/x-icon">
    <title>Sucesso!</title>
</head>

<body>
    <div class="container">
        <div class="fundoDark"></div>
        <div class="formulario">
            <h1>Filme adicionado com sucesso!</h1>
            <h3><a href="../Admin/listar_filmes.php">Ver filmes disponiveis</a></h3>
        </div>
    </div>
</body>

</html>';
            } else {
                echo "Erro ao adicionar filme: " . mysqli_error($conn);
            }
        } else {
            echo "Erro ao fazer upload da imagem.";
        }
    } else {
        echo "Erro: Nenhuma imagem enviada.";
    }
} else {
    echo "Por favor, preencha todos os campos.";
}
