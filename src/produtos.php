<?php
    $feedback = null;
    require_once './models/utils/auth.php';
    exigirLogin();

    if(isset($_SESSION["feedback"])) {
        $feedback = $_SESSION["feedback"];

        unset($_SESSION["feedback"]);
    }   
    require_once './models/produtoModel.php';

    $listaDeProdutos = listarProduto();
    require_once './views/layouts/header.php';
    require_once './views/produtos/listar.php';
    require_once './views/layouts/footer.php';
?>