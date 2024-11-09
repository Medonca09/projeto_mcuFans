// Abre o modal ao clicar na foto do perfil
document.getElementById("foto-perfil").onclick = function() {
    document.getElementById("modal-foto").style.display = "flex";
};

// Fecha o modal
function fecharModal() {
    document.getElementById("modal-foto").style.display = "none";
}