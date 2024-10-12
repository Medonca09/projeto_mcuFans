<?php
include 'C:/xampp/htdocs/pidw/mcuFans/conexao.php';

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
        $caminho_imagem = '../assets/' . basename($imagem);

        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $imagem)) {
            $sql = "INSERT INTO filmes (titulo, descricao, data_lancamento, diretor, genero, imagem) 
                    VALUES ('$titulo', '$descricao', '$data_lancamento', '$diretor', '$genero', '$imagem')";

            if (mysqli_query($conn, $sql)) {
                echo "Filme adicionado com sucesso!";
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
