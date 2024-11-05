// Seleciona todas as estrelas e o campo oculto para nota
const stars = document.querySelectorAll('.star');
const notaInput = document.getElementById('nota');

// Adiciona eventos para cada estrela
stars.forEach((star) => {
	star.addEventListener('click', () => {
		const rating = star.getAttribute('data-value');
		notaInput.value = rating;

		// Remove a seleção de todas as estrelas
		stars.forEach((s) => s.classList.remove('selected'));

		// Adiciona a classe "selected" às estrelas até a escolhida
		for (let i = 0; i < rating; i++) {
			stars[i].classList.add('selected');
		}
	});

	// Altera a cor das estrelas ao passar o mouse
	star.addEventListener('mouseover', () => {
		stars.forEach((s) => s.classList.remove('selected'));
		for (let i = 0; i < star.getAttribute('data-value'); i++) {
			stars[i].classList.add('selected');
		}
	});

	// Restaura a seleção quando o mouse sai das estrelas
	star.addEventListener('mouseout', () => {
		const rating = notaInput.value;
		stars.forEach((s) => s.classList.remove('selected'));
		for (let i = 0; i < rating; i++) {
			stars[i].classList.add('selected');
		}
	});
});
