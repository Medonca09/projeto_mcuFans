function mostrarFormulario(tipo) {
    // Esconde ambos os formulários de login e o formulário de cadastro
    document.getElementById('formulario-usuario').style.display = 'none';
    document.getElementById('formulario-admin').style.display = 'none';
    document.querySelector('.cadastro-form').style.display = 'none';

    // Esconde a escolha de perfil (os botões)
    document.querySelector('.container h2').style.display = 'none'; // Esconde o título "Escolha seu perfil"
    document.querySelectorAll('.container .btn').forEach(btn => {
        btn.style.display = 'none'; // Esconde os botões
    });

    // Exibe o formulário de acordo com o botão clicado
    if (tipo === 'usuario') {
        document.getElementById('formulario-usuario').style.display = 'block';
    } else if (tipo === 'admin') {
        document.getElementById('formulario-admin').style.display = 'block';
    }

    // Adiciona eventos para os links de cadastro e voltar ao login
    configurarEventos();
}

function configurarEventos() {
    // Evento para abrir o formulário de cadastro
    document.querySelector('.cadastro p a').addEventListener('click', function (e) {
        e.preventDefault();
        mostrarCadastro();
    });

    // Evento para voltar ao formulário de login
    document.querySelector('.cadastro-form .btn.voltar').addEventListener('click', function (e) {
        e.preventDefault();
        voltarAoLogin();
    });
}

function mostrarCadastro() {
    document.getElementById('formulario-usuario').style.display = 'none'; // Esconde o formulário de login
    document.getElementById('formulario-admin').style.display = 'none'; // Esconde o formulário de admin
    document.querySelector('.cadastro-form').style.display = 'block'; // Mostra o formulário de cadastro
}

function voltarAoLogin() {
    document.querySelector('.cadastro-form').style.display = 'none'; // Esconde o formulário de cadastro
    document.querySelector('.container h2').style.display = 'none'; // Exibe o título "Escolha seu perfil"
    document.querySelectorAll('.container .btn').forEach(btn => {
        btn.style.display = 'inline-block'; // Mostra os botões de tipo de usuário
    });
}
