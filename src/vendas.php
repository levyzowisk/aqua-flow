<?php 
    session_start();
    $feedback = null;

    if(isset($_SESSION["feedback"])) {
        $feedback = $_SESSION["feedback"];

        unset($_SESSION["feedback"]);
    }   
    require_once './models/vendaModel.php';
    $listaDeVendas = listarVenda();

    // var_dump($listaDeVendas);
    require_once "./models/funcionarioModel.php";
    require_once "./models/produtoModel.php";
    require_once './views/layouts/header.php';
    require_once './views/vendas/listar.php';
    require_once './views/layouts/footer.php';
?>

