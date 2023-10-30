/*
 * Recupera todos os elementos necessários 
 */
const cenarioElement = document.querySelector('#cenario');
const alvoElement = document.querySelector('#alvo');
const acertosElement = document.querySelector('#acertos');
const errosElement = document.querySelector('#erros');
const totalElement = document.querySelector('#total');
const btnIniciar = document.querySelector('#controles_btn-iniciar');
const tempoElement = document.querySelector("#tempo");

/*
 * Variáveis para controlar os status
 */
let acertos = 0;
let erros = 0;
let total = 0;
let interval = 0;

btnIniciar.addEventListener("click", iniciarJogo);

function iniciarJogo() {
    btnIniciar.setAttribute("disabled", "true");

    cenarioElement.addEventListener("click", ouvinteClick);

    interval = setInterval(() => {
        let valTempo = tempoElement.innerHTML;
        --valTempo;
        tempoElement.innerHTML = valTempo;
    }, 1000);
    setTimeout(pararJogo, 15000);
}

function pararJogo() {
    clearInterval(interval);
    cenarioElement.removeEventListener("click", ouvinteClick);
}

function ouvinteClick(MouseEvent) {
    let mouseX = MouseEvent.clientX;
    let mouseY = MouseEvent.clientY;
    let alvoRect = alvoElement.getBoundingClientRect();

    if (mouseX >= alvoRect.left && mouseX <= alvoRect.right && mouseY >= alvoRect.top && mouseY <= alvoRect.bottom) {
        atualizarPlacar(true);
        atualizarPlacar(true);
        alterarPosicaoAlvo();
    }
    else {
        atualizarPlacar(false);
        atualizarPlacar(false);
    }
}

function alterarPosicaoAlvo() {
    const cWidth = cenarioElement.offsetWidth;
    const cHeight = cenarioElement.offsetHeight;

    const aWidth = alvoElement.offsetWidth;
    const aHeight = alvoElement.offsetHeight;
    alvoElement.style.left = Math.floor(Math.random() * (cWidth - aWidth)) + 'px';
    alvoElement.style.top = Math.floor(Math.random() * (cHeight - aHeight)) + 'px';
};

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