$(document).ready(function () {

    const elementoCenario = $('#cenario');
    const elementoAlvo = $('#alvo');
    const elementoQtdAcertos = $('#acertos');
    const elementoQtdErros = $('#erros');
    const elementoQtdTiros = $('#total');
    const elementoBtnIniciar = $('#btn-iniciar');
    const elementoTempo = $('#tempo');
    let miado = new Audio("assets/audio/miado.mp3");

    let qtdAcertos = 0;
    let qtdErros = 0;
    let qtdTiros = 0;
    let intervaloChecagemTempo = 0;
    let tempo = 15; /* Medido em segundos */

    elementoBtnIniciar.on("click", iniciarJogo);

    function iniciarJogo() {
        elementoBtnIniciar.attr("disabled", true);

        elementoCenario.on("click", ouvinteCliqueMouse);

        intervaloChecagemTempo = setInterval(function () {
            tempo--;
            elementoTempo.text(tempo);
        }, 1000);

        setTimeout(pararJogo, tempo * 1000);
    }

    function pararJogo() {
        clearInterval(intervaloChecagemTempo);
        exibirPopup();
        elementoCenario.off("click", ouvinteCliqueMouse);
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
            miado.play();
        }
        else {
            atualizarPlacar(false);
        }
    }

    function exibirPopup() {
        $('#modal').modal('show');
        $('#modal-input-qntd-acertos').val(qtdAcertos);
        $('#modal-input-qntd-erros').val(qtdErros);
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
            elementoQtdAcertos.text(qtdAcertos);
        }
        else {
            qtdErros++;
            elementoQtdErros.text(qtdErros);
        }
    }

});