$(document).ready(function () {

    const elementoCenario = $('#cenario');
    const elementoAlvo = $('#alvo');
    const elementoQtdqtdAcertos = $('#qtdAcertos');
    const elementoQtdqtdErros = $('#qtdErros');
    const elementoQtdTiros = $('#qtdTiros');
    const elementoBtnIniciar = $('#controles_btn-iniciar');
    const elementoTempo = $('#tempo');

    let qtdAcertos = 0;
    let qtdErros = 0;
    let qtdTiros = 0;
    let intervaloChecagemTempo = 0;

    elementoBtnIniciar.on("click", iniciarJogo);

    function iniciarJogo() {
        elementoBtnIniciar.attr("disabled", true);

        elementoCenario.on("click", ouvinteCliqueMouse);

        intervaloChecagemTempo = setInterval(function () {
            let tempo = parseInt(elementoTempo.text());
            tempo--;
            elementoTempo.text(tempo);
        }, 1000);

        setTimeout(pararJogo, 15000);
    }

    function pararJogo() {
        clearInterval(intervaloChecagemTempo);
        elementoCenario.off("click", ouvinteCliqueMouse);
        elementoBtnIniciar.removeAttr("disabled");
    }

    function ouvinteCliqueMouse(event) {
        let mouseX = event.clientX;
        let mouseY = event.clientY;
        let alvoRect = elementoAlvo[0].getBoundingClientRect();

        if (mouseX >= alvoRect.left &&
            mouseX <= alvoRect.right &&
            mouseY >= alvoRect.top &&
            mouseY <= alvoRect.bottom) {
            atualizarPlacar(true);
            alterarPosicaoAlvo();
        }
        else {
            atualizarPlacar(false);
        }
    }

    function alterarPosicaoAlvo() {
        const cWidth = elementoCenario.width();
        const cHeight = elementoCenario.height();

        const aWidth = elementoAlvo.width();
        const aHeight = elementoAlvo.height();

        elementoAlvo.css("left", Math.floor(Math.random() * (cWidth - aWidth)) + 'px');
        elementoAlvo.css("top", Math.floor(Math.random() * (cHeight - aHeight)) + 'px');
    }

    function atualizarPlacar(acertou) {
        qtdTiros++;
        elementoQtdTiros.text(qtdTiros);

        if (acertou) {
            qtdAcertos++;
            elementoQtdqtdAcertos.text(qtdAcertos);
        }
        else {
            qtdErros++;
            elementoQtdqtdErros.text(qtdErros);
        }
    }

});