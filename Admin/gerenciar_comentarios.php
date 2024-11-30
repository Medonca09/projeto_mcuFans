<?php
include '../conexao.php';

$sql = "
    SELECT 
        u.nome AS nome_usuario,
        u.foto AS foto_usuario,
        a.comentario,
        a.data_avaliacao,
        f.titulo AS nome_filme
    FROM 
        avaliacoes a
    JOIN 
        usuarios_comuns u ON a.id_usuario = u.id
    JOIN 
        filmes f ON a.id_filme = f.id
    ORDER BY 
        a.data_avaliacao DESC";

$resultado = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comentários dos Usuários</title>
    <link rel="stylesheet" href="../CSS/adm_comentario.css">
    <link rel="shortcut icon" href="../Assets/marvelLogo.png" type="image/x-icon">
</head>

<body>
    <header>
        <h2 class="logo">MCU Fans</h2>

        <nav class="navegacao">
            <a href="../Admin/adm_dashboard.php">Voltar</a>
        </nav>
    </header>
    <div class="comentarios-container">
        <h2>Comentários dos Usuários</h2>
        <?php
        if (mysqli_num_rows($resultado) > 0) {
            while ($row = mysqli_fetch_assoc($resultado)) {
        ?>
                <div class="comentario">
                    <img src="../<?php echo $row['foto_usuario']; ?>" alt="Foto do usuário">
                    <div class="comentario-info">
                        <h4><?php echo $row['nome_usuario']; ?></h4>
                        <p>
                            comentou no filme: <span class="filme"><?php echo $row['nome_filme']; ?></span>
                        </p>
                        <p>"<?php echo $row['comentario']; ?>"</p>
                        <span class="data"><?php echo date('d/m/Y H:i', strtotime($row['data_avaliacao'])); ?></span>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "<p>Não há comentários para exibir.</p>";
        }

        mysqli_close($conn);
        ?>
    </div>
</body>

</html>