<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Assets/marvelLogo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            <a href="/">Inicio</a>
            <a href="#">Informação</a>
            <a href="#">Filmes</a>
        </nav>
    </header>

    <div class="container">
        <h2>Escolha seu perfil</h2>
        <button onclick="mostrarFormulario('usuario')" class="btn">Usuário Comum</button>
        <button onclick="mostrarFormulario('admin')" class="btn">Administrador</button>

        <!-- Formulário de Usuário Comum -->
        <div id="formulario-usuario" class="formulario login" style="display: none;">
            <h2>Login Usuário</h2>
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

                <div class="cadastro">
                    <p>Não possui uma conta? <a href="#">Criar uma?</a></p>
                </div>
            </form>
        </div>

        <!-- Formulário de Administrador -->
        <div id="formulario-admin" class="formulario login" style="display: none;">
            <h2>Login Administrador</h2>
            <form action="admin_login.php">
                <div class="campos-input">
                    <span class="icone"><i class="fa-solid fa-user-shield"></i></span>
                    <input type="text" required>
                    <label for="admin-usuario">Usuário Admin</label>
                </div>

                <div class="campos-input">
                    <span class="icone"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" required>
                    <label for="admin-senha">Senha</label>
                </div>

                <div class="cadastro">
                    <button type="submit" class="btn">Entrar</button>
                </div>


                <button type="submit" class="btn">Iniciar sessão</button>
            </form>
        </div>

        <form action="#" class="formulario cadastro-form" style="display: none;">
            <h2>Criar Conta</h2>
            <div class="campos-input">
                <input type="text" required>
                <label>Nome</label>
                <i class="fas fa-user icone"></i>
            </div>
            <div class="campos-input">
                <input type="email" required>
                <label>Email</label>
                <i class="fas fa-envelope icone"></i>
            </div>
            <div class="campos-input">
                <input type="password" required>
                <label>Senha</label>
                <i class="fas fa-lock icone"></i>
            </div>
            <div class="campos-input">
                <input type="password" required>
                <label>Confirmar Senha</label>
                <i class="fas fa-lock icone"></i>
            </div>
            <div class="campos-input">
                <input type="file" name="profile_photo" accept="image/*" required>
                <i class="fas fa-camera icone"></i>
            </div>
            <button type="submit" class="button-cadastro">Cadastrar</button>

            <!-- Botão para voltar ao login -->
            <div class="cadastro">
                <button type="button" class="btn voltar">Voltar ao Login</button>
            </div>
        </form>

    </div>

    <script src="JS/app.js"></script>
</body>

</html>