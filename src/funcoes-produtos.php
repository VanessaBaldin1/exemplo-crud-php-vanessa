<?php
require_once "conecta.php";

function listarProdutos(PDO $conexao):array {
  //$sql = "SELECT * FROM produtos";

  //linha que seria incluida no SELECT abaixo para fazer o exercicio
  //(produtos.preco * produto.quantidade) As total,
  //a chamada na pagina visualizar.php fica =formatarPreco($produto["total"])


  $sql = "SELECT 
            produtos.id, produtos.nome AS produto,
            produtos.preco, produtos.quantidade,
            fabricantes.nome AS fabricante
          FROM produtos INNER JOIN fabricantes
          ON produtos.fabricante_id = fabricantes.id
          ORDER BY produto";

  

  try {
    $consulta = $conexao->prepare($sql);
    $consulta->execute();
    return $consulta->fetchAll(PDO::FETCH_ASSOC);


  } catch (Exception $erro) {
    die("Erro ao carregar produtos: ".$erro->getMessage());
  }

}
