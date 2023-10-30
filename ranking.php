<!DOCTYPE html>
<html lang="pt-br">

<?php
require_once "model/Partida.php";

$caminhoBanco = "database/chaninhas_game_db.sqlite";
$conexao = new PDO("sqlite:" . $caminhoBanco);
$conexao->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="navigation.js" defer></script>
    <link rel="stylesheet" href="ranking.css">
    <title>Chaninhas Game | Ranking</title>
</head>

<body>
    <main>
        <header>
            <button id="btn-home">
                < Home</button>
                    <h1 class="title">Ranking</h1>
        </header>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>NOME</th>
                    <th>ACERTOS</th>
                    <th>ERROS</th>
                    <th>DATA/HORA</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $consulta = $conexao->query("SELECT * FROM partidas ORDER BY qntdAcertos DESC, qntdErros ASC, dataehora DESC;");
                $partidas = $consulta->fetchAll(PDO::FETCH_CLASS, "Partida");

                foreach ($partidas as $p) :
                ?>
                    <tr>
                        <td><?= $p->id ?></td>
                        <td><?= $p->getNome(); ?></td>
                        <td><?= $p->getQntdAcertos(); ?></td>
                        <td><?= $p->getQntdErros(); ?></td>
                        <td><?= $p->getDataehora(); ?></td>
                    </tr>
                <?php
                endforeach;
                ?>
            </tbody>
        </table>
    </main>
</body>

</html>