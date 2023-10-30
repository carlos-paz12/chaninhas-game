<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="script.js" defer></script>
    <script src="navigation.js" defer></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Chaninhas Game | Game </title>
</head>

<body>
    <main>
        <header>
            <ul id="placar">
                <li>
                    <span id="tempo" class="placar-value">15</span><br>
                    <p class="placar-label">Segundos</p>
                </li>
                <li>
                    <span id="acertos" class="placar-value">0</span><br>
                    <p class="placar-label">Acertos</p>
                </li>
                <li>
                    <span id="erros" class="placar-value">0</span><br>
                    <p class="placar-label">Erros</p>
                </li>
                <li>
                    <span id="total" class="placar-value">0</span><br>
                    <p class="placar-label">Tiros</p>
                </li>
            </ul>
        </header>
    
        <section id="cenario">
            <img id="alvo" src="chaninha.png" alt="target" draggable="false">
        </section>
    
        <section id="controles">
            <button id="btn-iniciar" class="btn">Iniciar</button>
            <button id="btn-ranking" class="btn">Ranking</button>
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

    <footer>
        <section>
            <article>
                <h3 class="footer-titulo">ATIVIDADE</h3>
                <p class="footer-paragrafo">
                    Disciplina: Programação para Internet <br>
                    Professor: Marcelo Figueiredo Barbosa Junior <br>
                    IFRN <i>campus</i> Santa Cruz/RN
                </p>
            </article>
            <article>
                <h3 class="footer-titulo">DESENVOLVIDO POR</h3>
                <p class="footer-paragrafo">
                    José Carlos da Paz Silva <br>
                    Júlia Katllyn Ayres da Costa <br>
                    Welida Souza Silva
                </p><br>
            </article>
        </section>
        <section>
            <p class="footer-paragrafo">Todos os direitos reservados ⓒ</p>
        </section>
    </footer>
</body>

</html>
