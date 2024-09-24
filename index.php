<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Assets/marvelLogo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="CSS/style.css">
    <title>MCU Fans</title>
</head>

<body>
    <video autoplay loop muted>
        <source src="Assets/aberturaMarvel.mp4" type="video/mp4">
    </video>

    <div class="fundoDark"></div>

    <header>
        <h2 class="logo">MCU Fans</h2>

        <nav class="navegacao">
            <a href="#">Inicio</a>
            <a href="#">Informação</a>
            <a href="#">Filmes</a>
            <a href="#">Contatos</a>

            <button class="btn">Login</button>
        </nav>
    </header>

    <div class="fundo_login">
        <span class="icone-sair"><i class="fa-solid fa-xmark"></i></span>

        <div class="formulario login">
            <h2>Login</h2>
            <form action="login.php">
                <div class="campos-input">
                    <span class="icone"><i class="fa-solid fa-envelope"></i></span>
                    <input type="email" required>
                    <label for="email">Email</label>
                </div>

                <div class="campos-input">
                    <span class="icone"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" required>
                    <label for="senha">Senha</label>
                </div>

                <div class="lembrar-senha">
                    <label><input type="checkbox"> Lembrar senha</label>
                    <a href="#">Esqueceu a senha?</a>
                </div>

                <button type="submit" class="btn">Iniciar sessão</button>

                <div class="cadastro">
                    <p>Não possui uma conta? <a href="#" class="registrar-link">Criar conta</a></p>
                </div>
            </form>
        </div>

        <div class="formulario cadastrar">
            <h2>Registrar</h2>
            <form action="register.php">
                <div class="campos-input">
                    <span class="icone"><i class="fa-solid fa-user"></i></span>
                    <input type="text" required>
                    <label for="usuario">Usuário</label>
                </div>

                <div class="campos-input">
                    <span class="icone"><i class="fa-solid fa-envelope"></i></span>
                    <input type="email" required>
                    <label for="email">Email</label>
                </div>

                <div class="campos-input">
                    <span class="icone"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" required>
                    <label for="senha">Senha</label>
                </div>

                <button type="submit" class="btn">Cadastrar</button>

                <div class="registrar">
                    <p>Já tem uma conta? <a href="#" class="login-link">Iniciar sessão</a></p>
                </div>
            </form>
        </div>
    </div>

    <script src="JS/app.js"></script>
</body>

</html>
