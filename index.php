<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="assets/js/script.js" defer></script>
    <script src="assets/js/navigation.js" defer></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/stylesheets/index.css"><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,1,-25" />
    <title>Chaninhas Game | Game </title>
</head>

<body>
    <main id="jogo">
        <ul id="jogo_placar">
            <li class="placar_status">
                <span class="material-symbols-outlined" id="status_icon-tempo">schedule</span>
                <span id="status_tempo" class="status_valor">30</span>
            </li>

            <li class="placar_status">
                <span class="material-symbols-outlined" id="status_icon-acertos">done</span>
                <span id="status_acertos" class="status_valor">0</span>
            </li>

            <li class="placar_status">
                <span class="material-symbols-outlined" id="status_icon-erros">close</span>
                <span id="status_erros" class="status_valor">0</span>
            </li>

            <li class="placar_status">
                <span class="material-symbols-outlined" id="status_icon-total">emoji_flags</span>
                <span id="status_tentativas" class="status_valor">0</span>
            </li>
        </ul>

        <section id="jogo_cenario">
            <img id="cenario_alvo" src="assets/images/chaninha.png" draggable="false">
        </section>

        <section id="jogo_botoes">
            <button id="botoes_botao-iniciar" class="botao material-symbols-rounded">play_arrow</button>
            <button id="botoes_botao-ranking" class="botao material-symbols-rounded">groups</button>
        </section>

        <div class="modal fade" id="modal" role="dialog" data-backdrop="static">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Parabéns, jogador!</h5>
                    </div>
                    <div class="modal-body">
                        <form action="database/ws/create_service.php" method="post">
                            <div class="form-group">
                                <label for="modal-input-name" class="col-form-label">Informe seu nome:</label>
                                <input type="text" class="form-control" id="modal-input-name" name="modal-input-nome">
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="modal-input-qntd-acertos" name="modal-input-qntd-acertos">
                                <input type="hidden" class="form-control" id="modal-input-qntd-erros" name="modal-input-qntd-erros">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer id="footer">
        <section class="footer_section">
            <article class="footer_article">
                <h3 class="footer-titulo">Atividade</h3>
                <p class="footer-paragrafo">
                    Disciplina: Programação para Internet <br>
                    Professor: Marcelo Figueiredo Barbosa Junior <br>
                    IFRN <i>campus</i> Santa Cruz/RN
                </p>
            </article>
            <article class="footer_article">
                <p class="footer-paragrafo">Todos os direitos reservados ⓒ</p>
            </article>
            <article class="footer_article">
                <h3 class="footer-titulo">Desenvolvido por</h3>
                <p class="footer-paragrafo">
                    José Carlos da Paz Silva <br>
                    Júlia Katllyn Ayres da Costa <br>
                    Welida Souza Silva
                </p>
            </article>
        </section>
    </footer>
</body>

</html>