<!DOCTYPE html>
<html lang="pt-br">

<?php
require_once "models/Partida.php";

$caminhoBanco = "database/chaninhas_game_db.sqlite";
$conexao = new PDO("sqlite:" . $caminhoBanco);
$conexao->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="assets/js/script.js" defer></script>
    <script src="assets/js/navigation.js" defer></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/stylesheets/ranking.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Chaninhas Game | Ranking </title>
</head>

<body>
    <header id="cabecalho">
        <button id="cabecalho_botao-game" class="botao material-symbols-outlined">
            sports_esports
        </button>
        <h3 id="cabecalho_titulo">Ranking</h3>
    </header>
    <main>
        <table id="ranking_table">
            <tr class="table_header">
                <th>POSIÇÃO</th>
                <th>NOME</th>
                <th>ACERTOS</th>
                <th>ERROS</th>
                <th>DATA/HORA</th>
            </tr>
            <?php
            $consulta = $conexao->query("SELECT * FROM partidas ORDER BY qntdAcertos DESC, qntdErros ASC, dataehora DESC;");
            $partidas = $consulta->fetchAll(PDO::FETCH_CLASS, "Partida");

            $posicao = 1;
            foreach ($partidas as $p) :
            ?>
                <tr class="table_row">
                    <td><?= $posicao++ ?></td>
                    <td><?= $p->getNome(); ?></td>
                    <td><?= $p->getQntdAcertos(); ?></td>
                    <td><?= $p->getQntdErros(); ?></td>
                    <td><?= $p->getDataehora(); ?></td>
                </tr>
            <?php
            endforeach;
            ?>
        </table>
    </main>
</body>

</html>