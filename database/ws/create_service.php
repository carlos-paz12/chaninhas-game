<?php
date_default_timezone_set('America/Fortaleza');

$caminhoBanco = "../chaninhas_game_db.sqlite";
$conexao = new PDO("sqlite:".$caminhoBanco);
$conexao->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

$nome = $_POST["modal-input-nome"];
$qntdErros = $_POST["modal-input-qntd-erros"];
$qntdAcertos = $_POST["modal-input-qntd-acertos"];
$dataehora = date('d-m-Y H:i:s');

$sql = $conexao->prepare("INSERT INTO partidas (nome, qntdErros, qntdAcertos, dataehora) VALUES (:nome, :qntdErros, :qntdAcertos, :dataehora)");

$sql->bindParam(":nome", $nome);
$sql->bindParam(":qntdErros", $qntdErros);
$sql->bindParam(":qntdAcertos", $qntdAcertos);
$sql->bindParam(":dataehora", $dataehora);

$sql->execute();

header("Location:../../ranking.php");