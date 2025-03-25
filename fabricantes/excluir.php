<?php

/*Acessando as funções de fabricantes */
require_once "../src/funcoes-fabricantes.php";

/* Obtendo o valor do parâmetro via URL - links dinâmico*/
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);






?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes - Exclusão</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-2 shadow-lg rounded pb-1">
    <h1>Fabricantes | DELETE</h1>
    <hr>

    <div class="alert alert-danger w-50">
        <p> Deseja realmente excluir este fabricante?</p>
        
        <a href="visualizar.php" class="btn btn-secondary">Não</a>

        <a href="visualizar.php" class="btn btn-danger">Sim</a>       
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

