<?php
include '../conexao.php'; // Inclui a conexão com o banco de dados

// Verifica se a conexão foi estabelecida corretamente
if (!$conexao) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

// Verifica se os campos foram preenchidos corretamente
if (isset($_POST['titulo'], $_POST['descricao'], $_POST['data_lancamento'], $_POST['diretor'], $_POST['genero'])) {
    
    // Coletar os dados do formulário
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $data_lancamento = $_POST['data_lancamento'];
    $diretor = $_POST['diretor'];
    $genero = $_POST['genero'];

    // Tratamento para o upload de imagem
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $imagem = $_FILES['imagem']['name'];
        $caminho_imagem = '../assets/' . basename($imagem); // Ajuste o caminho, se necessário
        
        // Mover o arquivo para o diretório uploads
        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $imagem)) {
            // Inserir os dados no banco de dados, incluindo o nome do arquivo da imagem
            $sql = "INSERT INTO filmes (titulo, descricao, data_lancamento, diretor, genero, imagem) 
                    VALUES ('$titulo', '$descricao', '$data_lancamento', '$diretor', '$genero', '$imagem')";
            
            if (mysqli_query($conexao, $sql)) {
                echo "Filme adicionado com sucesso!";
            } else {
                echo "Erro ao adicionar filme: " . mysqli_error($conexao);
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
?>
