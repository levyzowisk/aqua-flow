<?php 
    require_once './models/vendaModel.php';
    $listaDeVendas = listarVenda();

    // var_dump($listaDeVendas);
    
    require_once './views/layouts/header.php';
    require_once './views/vendas/listar.php';
    require_once './views/layouts/footer.php';
?>

