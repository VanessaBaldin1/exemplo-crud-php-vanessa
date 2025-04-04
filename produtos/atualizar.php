<?php
require_once "../src/funcoes-produtos.php";

//fazer a conexão com a funções fabricantes para configurar a lista suspensa na pagina de visualizar.php/produtos
require_once "../src/funcoes-fabricantes.php";
//fazer a conexão com a lista de fabricantes para aparecer na lista suspensa junto com  produtos
$listaDeFabricantes = listarFabricantes($conexao);

/* Obtendo o valor do parâmetro via URL - links dinâmico*/
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

/* Chamando a função para carregar os dados de um produto */
$produto = listarUmProduto($conexao, $id);

//var_dump($produto);
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Atualização</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-2 shadow-lg rounded pb-1">
        <h1><a class="btn btn-outline-dark" href="visualizar.php">&lt; Voltar</a> Produtos | SELECT/UPDATE</h1>
        <hr>

        <form action="" method="post" class="w-50">
            <div class="mb-3">
                <label class="form-label" for="nome">Nome:</label>
                <input value="<?=$produto['nome']?>"    class="form-control" type="text" name="nome" id="nome" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="preco">Preço:</label>
                <input value="<?=$produto['preco']?>"   class="form-control" type="number" min="10" max="10000" step="0.01" name="preco" id="preco" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="quantidade">Quantidade:</label>
                <input  value="<?=$produto['quantidade']?>"   class="form-control" type="number" min="1" max="100" name="quantidade" id="quantidade" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="fabricante">Fabricante:</label>
                <select class="form-select" name="fabricante" id="fabricante" required>
                    
                    <!-- Manter sempre um Option vazio para que a lista se inicie sem opção selecionada -->
                    <option value=""></option>


                    <!-- configurando a LISTA SUSPENSA de fabricantes, utilizando foreach somente no OPtion para executar a chamada de nome do fabricante usando ID (chave primária no value)  e Nome na chamada dentreo do Option-->
                    <?php foreach($listaDeFabricantes as $fabricante): ?>
                    <option value="<?=$fabricante['id']?>"><?=$fabricante['nome']?></option>
                    <?php endforeach; ?>


                </select>
            </div>
            <div class="mb-3">
                <label   class="form-label" for="descricao">Descrição:</label> <br>
                <textarea  class="form-control" name="descricao" id="descricao" cols="30" rows="3" ><?=$produto['descricao']?></textarea>
            </div>
            <button class="btn btn-warning" type="submit" name="atualizar">Atualizar produto</button>
        </form>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>