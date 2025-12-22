<?php 
    require_once __DIR__ . '/../../produtoModel.php';
    require_once __DIR__ . '/../../utils/sessionsFeedbacks.php';
    require_once __DIR__ . '/../../utils/validations.php';

    $id = $_GET["id"] ?? "";
    $nome = $_POST["nome"] ?? "";
    $valor = $_POST["valor"] ?? "";
    $estoque = $_POST["estoque"] ?? "";

    if(!required($nome) || !required($valor) || !required($estoque) || !checkNumber($estoque) || !checkNumber($valor)) {
    sessionError("Dados inválidos.", "produtos.php");
    }

    $funcionario = buscarProdutoPorId($id);
    if(!$funcionario) {
        sessionError("Funcionário não existente", "produtos.php");
    }

    if($estoque < $funcionario["estoque"]) {
        sessionError("Não possível diminuir o estoque", "produtos.php");
    }

    atualizarProduto($id, $nome, $valor, $estoque);
    sessionSucess("Produto atualizado com sucesso", "produtos.php");
?>