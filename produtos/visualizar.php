<?php 
require_once"../src/funcoes-produtos.php";
require_once"../src/funcoes-utilitarias.php";

$listaDeProdutos = listarProdutos($conexao);

$quantidade = count($listaDeProdutos);

?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Visualização</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-2 shadow-lg rounded pb-1">
        <h1><a class="btn btn-dark btn-lg" href="../index.php">Home</a> Produtos | SELECT</h1>

        <hr>
        <h2>Lendo e carregando todos os produtos.</h2>

        <p><a class="btn btn-primary btn-sm" href="inserir.php">Inserir novo produto</a></p>



        <div class="row g-1">

<?php foreach ($listaDeProdutos as $produto){?>
            <div class="col-sm-6">
                <article class="bg-body-secondary p-2">
                    <h3><?=$produto["produto"]?></h3>
                    <h4><?=$produto["fabricante"]?></h4>
                    <!-- inclui formatarPreco da pagina de função utilitaria.php, formar de chamar a função é diferente -->
                    <p><b>Preço: <?=formatarPreco($produto["preco"])?> </b> </p>
                    <p><b>Quantidade: <?=$produto["quantidade"]?> </b></p>
                    <p><b>Total:</b> <?=formatarPreco($produto["preco"] * $produto["quantidade"])?> </p>

                    <!-- Incluindo Link dinâmico -->
                    <a class="btn btn-warning btn-sm" href="atualizar.php?id=<?=$produto['id']?>">Atualizar produto</a>

                    <a class="btn btn-danger btn-sm"  href="excluir.php?id=<?=$produto['id']?>">Excluir</a> 
                </article>
            </div>

<?php } ?>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>