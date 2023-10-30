/*
 * Recupera todos os elementos necessários 
 */
const cenarioElement = document.querySelector('#cenario');
const alvoElement = document.querySelector('#alvo');
const acertosElement = document.querySelector('#acertos');
const errosElement = document.querySelector('#erros');
const totalElement = document.querySelector('#total');
const btnIniciar = document.querySelector('#controles_btn-iniciar');

/*
 * Variáveis para controlar os status
 */
let acertos = 0;
let erros = 0;
let total = 0;

// Adicionar listener de click ao cenário
cenarioElement.addEventListener("click", (event) => {
    // Capturar posicao do mouse na hora do click
    let mouseX = event.clientX;
    let mouseY = event.clientY;
btnIniciar.addEventListener("click", iniciarJogo);

    // Capturar objeto DOMRect do elemento
    // Retorna oito propriedades: esquerda, superior, direita, inferior, x, y, largura, altura
function iniciarJogo() {
    btnIniciar.setAttribute("disabled", "true");

    cenarioElement.addEventListener("click", ouvinteClick);

    setTimeout(pararJogo, 30000);
}

function pararJogo() {
    cenarioElement.removeEventListener("click", ouvinteClick);
}

function ouvinteClick(MouseEvent) {
    let mouseX = MouseEvent.clientX;
    let mouseY = MouseEvent.clientY;
    let alvoRect = alvoElement.getBoundingClientRect();

    // Checar se o mouse está em cima do target
    if (mouseX >= alvoRect.left && mouseX <= alvoRect.right && mouseY >= alvoRect.top && mouseY <= alvoRect.bottom) {
        atualizarPlacar(true); // true como param pois o client acertou no alvo
        atualizarPlacar(true);
        alterarPosicaoAlvo();
    }
    else {
        atualizarPlacar(false); // false como param pois o client errou o alvo
        atualizarPlacar(false);
    }
});

// Alterar a posição do alvo
function alterarPosicaoAlvo() {
    // Capturar as dimensões visíveis do elemento
    const cWidth = cenarioElement.offsetWidth;
    const cHeight = cenarioElement.offsetHeight;

    const aWidth = alvoElement.offsetWidth;
    const aHeight = alvoElement.offsetHeight;
    alvoElement.style.left = Math.floor(Math.random() * (cWidth - aWidth)) + 'px';
    alvoElement.style.top = Math.floor(Math.random() * (cHeight - aHeight)) + 'px';
};

// Atualizar o placar
function atualizarPlacar(acertou) {
    total++;
    totalElement.innerHTML = total;
    if (acertou == true) {
        acertos++;
        acertosElement.innerHTML = acertos;
    }
    else {
        erros++;
        errosElement.innerHTML = erros;
    }
};