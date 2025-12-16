<?php
$listaDeProdutos = [
    [
        'id' => 1,
        'nome' => 'Tubo PVC 100mm (Barra 6m)',
        'valor' => 45.90,
        'estoque' => 50
    ],
    [
        'id' => 2,
        'nome' => 'Luva de Correr 100mm',
        'valor' => 12.50,
        'estoque' => 0
    ],
    [
        'id' => 3,
        'nome' => 'Registro de Esfera 3/4"',
        'valor' => 38.00,
        'estoque' => 15
    ],
    [
        'id' => 4,
        'nome' => 'Joelho 90 Graus Soldável',
        'valor' => 2.30,
        'estoque' => 200
    ]
]; 
    require_once './views/layouts/header.php';
    require_once './views/produtos/listar.php';
    require_once './views/layouts/footer.php';
?>