<!DOCTYPE html>
<html lang="pt-br">

<?php
$caminhoBanco = "database/chaninhas_game_db.sqlite";
$conexao = new PDO("sqlite:" . $caminhoBanco);
$conexao->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chaninhas Game | Ranking</title>
</head>

<body>
    <header>
        <a href="index.html">Game</a>
        <h1 class="title">Ranking</h1>
    </header>
    <main>
        <section>
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
                    $consulta = $conexao->query("SELECT * FROM partidas;");
                    $partidas = $consulta->fetchAll();

                    foreach ($partidas as $p) :
                    ?>
                        <tr>
                            <td><?= $p->id ?></td>
                            <td><?= $p->nome ?></td>
                            <td><?= $p->qntdAcertos ?></td>
                            <td><?= $p->qntdErros ?></td>
                            <td><?= $p->dataehora ?></td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                </tbody>
            </table>
        </section>
    </main>
</body>

</html>