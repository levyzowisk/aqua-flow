<?php 
  require_once __DIR__ . "/../../produtoModel.php";
  require_once __DIR__ . "/../../utils/sessionsFeedbacks.php" ;
  require_once __DIR__ . "/../../utils/validations.php";

  $nome = $_POST["nome"];
  $valor = $_POST["valor"];
  $estoque = $_POST["estoque"];

  if(!required($nome) || !required($valor) || !required($estoque) || !checkNumber($estoque) || !checkNumber($valor)) {
    sessionError("Dados inválidos.", "produtos.php");
  }

  if(produtoExiste($nome)) {
    sessionError("Produto já existente.");
  }

  criarProduto($nome, $valor, $estoque);
  sessionSucess("Produto cadastrado.", "produtos.php");

?>