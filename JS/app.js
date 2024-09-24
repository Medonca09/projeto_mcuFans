function mostrarFormulario(tipo) {
    document.getElementById('formulario-usuario').style.display = 'none';
    document.getElementById('formulario-admin').style.display = 'none';
    document.querySelector('.cadastro-form').style.display = 'none';
    document.querySelector('.container h2').style.display = 'none';
    document.querySelectorAll('.container .btn').forEach(btn => {
        btn.style.display = 'none';
    });

    if (tipo === 'usuario') {
        document.getElementById('formulario-usuario').style.display = 'block';
    } else if (tipo === 'admin') {
        document.getElementById('formulario-admin').style.display = 'block';
    }
    configurarEventos();
}

function configurarEventos() {
    document.querySelector('.cadastro p a').addEventListener('click', function (e) {
        e.preventDefault();
        mostrarCadastro();
    });

    document.querySelector('.cadastro-form .btn.voltar').addEventListener('click', function (e) {
        e.preventDefault();
        voltarAoLogin();
    });
}

function mostrarCadastro() {
    document.getElementById('formulario-usuario').style.display = 'none';
    document.getElementById('formulario-admin').style.display = 'none';
    document.querySelector('.cadastro-form').style.display = 'block';
}

function voltarAoLogin() {
    document.querySelector('.cadastro-form').style.display = 'none';
    document.querySelector('.container h2').style.display = 'none';
    document.querySelectorAll('.container .btn').forEach(btn => {
        btn.style.display = 'inline-block';
    });
}
