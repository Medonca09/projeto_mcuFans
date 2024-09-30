<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrador - MCU Fans</title>
    <link rel="shortcut icon" href="../Assets/marvelLogo.png" type="image/x-icon">
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<body>
    <video autoplay loop muted>
        <source src="../Assets/aberturaMarvel.mp4" type="video/mp4">
    </video>

    <div class="fundoDark"></div>

    <header>
        <h2 class="logo">MCU Fans</h2>

        <nav class="navegacao">
            <a href="../index.html">Inicio</a>
        </nav>
    </header>
    <div class="container">
        <h2>Login Administrador</h2>
        <form action="processa_adm_login.php" method="POST">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Digite o email de adm" required><br><br>

            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" placeholder="Digite a senha de adm" required><br><br>

            <input type="submit" value="Entrar">
        </form>
    </div>
</body>

</html>