// Selecionando os elementos
const btnLogin = document.querySelector('.navegacao .btn');
const formFundoLogin = document.querySelector('.fundo_login');
const iconeSair = document.querySelector('.icone-sair');
const btnCadastrar = document.querySelector('.cadastro a');
const loginForm = document.querySelector('.formulario.login-link');
const cadastroForm = document.querySelector('.formulario.registrar');

// Função para abrir o formulário de login
btnLogin.addEventListener('click', () => {
    formFundoLogin.classList.add('active-btn');
});

// Função para fechar o formulário de login
iconeSair.addEventListener('click', () => {
    formFundoLogin.classList.remove('active-btn');
});

// Alternar entre o formulário de login e cadastro
btnCadastrar.addEventListener('click', (e) => {
    e.preventDefault(); // Previne o comportamento padrão do link
    loginForm.style.transform = 'translateX(-400px)';
    cadastroForm.style.transform = 'translateX(0)';
});

// Função para voltar ao formulário de login a partir do cadastro
const linkVoltarLogin = document.querySelector('.formulario.registrar .cadastro p a');
linkVoltarLogin.addEventListener('click', (e) => {
    e.preventDefault(); // Previne o comportamento padrão do link
    loginForm.style.transform = 'translateX(0)';
    cadastroForm.style.transform = 'translateX(400px)';
});
