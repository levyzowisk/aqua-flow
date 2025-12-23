<?php 
    $feedback = null;
    require_once './models/utils/auth.php';
    exigirLogin();

    if(isset($_SESSION["feedback"])) {
        $feedback = $_SESSION["feedback"];

        unset($_SESSION["feedback"]);
    }   
    require_once './models/vendaModel.php';
    $listaDeVendas = listarVenda();

    require_once "./models/funcionarioModel.php";
    require_once "./models/produtoModel.php";
    require_once './views/layouts/header.php';
    require_once './views/vendas/listar.php';
    require_once './views/layouts/footer.php';
?>

