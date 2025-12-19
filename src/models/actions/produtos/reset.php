<?php 
    require_once __DIR__ . "/../../utils/sessionsFeedbacks.php";

    require_once __DIR__ . "/../../produtoModel.php";

    $id = $_GET["id"] ?? "";
    $estoque = $_GET["estoque"] ?? "";

    if(!$id || $estoque <= "0") {
        sessionError("Dados inválidos!", "produtos.php");
    }



    zerarEstoque($id);
    sessionSucess("Operação bem sucedida!", "produtos.php");

?>