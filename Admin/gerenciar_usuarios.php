<?php
include '../conexao.php';

$query = "
    SELECT u.foto, u.nome, u.data_cadastro, COUNT(a.id) AS comentarios
    FROM usuarios_comuns u
    LEFT JOIN avaliacoes a ON u.id = a.id_usuario
    GROUP BY u.id
";
$result = mysqli_query($conn, $query);

if (!$result) {
    echo "Erro ao buscar dados: " . mysqli_error($conn);
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Usuários</title>
    <link rel="stylesheet" href="../CSS/gerenciarUsuarios.css">
    <link rel="shortcut icon" href="../Assets/marvelLogo.png" type="image/x-icon">
</head>

<body>
    <header>
        <h2>MCU Fans</h2>
        <nav class="navegacao">
            <a href="./adm_dashboard.php">Voltar</a>
        </nav>
    </header>

    <h1>Usuários da Plataforma</h1>
    <div class="usuarios-container">
        <?php while ($usuario = mysqli_fetch_assoc($result)) : ?>
            <div class="usuario-card">
                <img src="../<?php echo $usuario['foto'] ?: 'default.png'; ?>" alt="Foto do usuário">
                <h3><?php echo htmlspecialchars($usuario['nome']); ?></h3>
                <p>Data de Cadastro: <?php echo date('d/m/Y', strtotime($usuario['data_cadastro'])); ?></p>
                <p>Quantidade de Comentários: <?php echo $usuario['comentarios']; ?></p>
            </div>
        <?php endwhile; ?>
    </div>
</body>

</html>