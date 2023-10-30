$(document).ready(function () {

    const elementoCenario = $('#jogo_cenario');
    const elementoAlvo = $('#cenario_alvo');
    const elementoAcertos = $('#status_acertos');
    const elementoErros = $('#status_erros');
    const elementoTentativas = $('#status_tentativas');
    const elementoTempo = $('#status_tempo');
    const elementoBtnIniciar = $('#botoes_botao-iniciar');
    const elementoBtnRanking = $('#botoes_botao-ranking');

    let miado = new Audio("assets/audio/miado.mp3");

    let acertos = 0;
    let erros = 0;
    let tentativas = 0;
    let acertou = false;

    let tempoDecorrido = 20;
    let tempoTotal = tempoDecorrido * 1000;
    let checagemTempoDecorrido = 0;
    let cronometroTempoTotal = 0;

    elementoBtnIniciar.on("click", iniciarPartida);

    function iniciarPartida() {
        elementoBtnIniciar.attr("disabled", true);
        elementoBtnRanking.attr("disabled", true);

        elementoCenario.on("click", ouvinteCliqueMouse);

        checagemTempoDecorrido = setInterval(decrescerTempo, 1000);
        cronometroTempoTotal = setTimeout(pararPartida, tempoTotal);
    }

    function ouvinteCliqueMouse(event) {
        let mouseX = event.clientX;
        let mouseY = event.clientY;
        let alvoRect = elementoAlvo[0].getBoundingClientRect();

        if (mouseX >= alvoRect.left &&
            mouseX <= alvoRect.right &&
            mouseY >= alvoRect.top &&
            mouseY <= alvoRect.bottom) {
            acertou = true;
            atualizarPlacar();
            alterarPosicaoAlvo();

            miado.play();
        }
        else {
            acertou = false;
            atualizarPlacar();
        }
    }

    function decrescerTempo() {
        tempoDecorrido--;
        elementoTempo.text(tempoDecorrido);
    }

    function pararPartida() {
        elementoCenario.off("click", ouvinteCliqueMouse);

        clearInterval(checagemTempoDecorrido);
        clearTimeout(cronometroTempoTotal);

        exibirPopup();
    }

    function exibirPopup() {
        $('#modal').modal('show');
        $('#modal-input-qntd-acertos').val(acertos);
        $('#modal-input-qntd-erros').val(erros);
    }

    function alterarPosicaoAlvo() {
        const cWidth = elementoCenario.width();
        const cHeight = elementoCenario.height();

        const aWidth = elementoAlvo.width();
        const aHeight = elementoAlvo.height();

        elementoAlvo.css("left", Math.floor(Math.random() * (cWidth - aWidth)) + 'px');
        elementoAlvo.css("top", Math.floor(Math.random() * (cHeight - aHeight)) + 'px');
    }

    function atualizarPlacar() {
        tentativas++;
        elementoTentativas.text(tentativas);

        if (acertou) {
            acertos++;
            elementoAcertos.text(acertos);
        }
        else {
            erros++;
            elementoErros.text(erros);
        }
    }

});