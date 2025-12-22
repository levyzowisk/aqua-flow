<?php 
    require_once __DIR__ . "/../../vendaModel.php";
    require_once __DIR__ . "/../../utils/sessionsFeedbacks.php";
    require_once __DIR__ . "/../../utils/validations.php";
    require_once __DIR__ . "/../../funcionarioModel.php";
    require_once __DIR__ . "/../../vendaProdutoModel.php";
    require_once __DIR__ . "/../../produtoModel.php";

    $idFuncionario = $_POST["id_funcionario"] ?? "";
    $produtos = $_POST["produtos"] ?? "";
    $qtds = $_POST["qtds"] ?? "";
    $data = $_POST["mesRef"] ?? "";

    if(!$idFuncionario || (!is_array($produtos) || count($produtos) == 0) ||  (!is_array($qtds) || count($qtds) == 0) || !$data) {
    
        sessionError("Dados inválidos!", "vendas.php");
    }

    if(!buscarFuncionarioPorId($idFuncionario)) {
        sessionError("Funcionário inexistente!");
    }

    $idVenda = criarVenda($idFuncionario, $data);

    if(!$idVenda) {
        sessionError("Ocorreu um erro ao cadastrar venda!", "vendas.php");
    }

    criarVendaProduto($idVenda, $produtos, $qtds);
    abaterEstoque($produtos, $qtds);
    sessionSucess("Venda cadastrada com sucesso!", "vendas.php");
?>

<pre>
    var_dump($_POST);
</pre>