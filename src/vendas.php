<?php 
    $listaDeVendas = [
        [
            'id' => 1,
            'funcionario' => 'Carlos Pereira',
            'data' => '2024-12-14',
            'produtos' => [
                ['nome' => 'Tubo PVC 100mm', 'qtd' => 2],
                ['nome' => 'Cola PVC', 'qtd' => 1]
            ]
        ],
        [
            'id' => 2,
            'funcionario' => 'Ana Costa',
            'data' => '2024-12-15',
            'produtos' => [
                ['nome' => 'Luva de Correr', 'qtd' => 4]
            ]
        ],
        [
            'id' => 3,
            'funcionario' => 'Carlos Pereira',
            'data' => '2024-12-15',
            'produtos' => [
                ['nome' => 'Joelho 90 Graus', 'qtd' => 10],
                ['nome' => 'Tubo PVC 100mm', 'qtd' => 5],
                ['nome' => 'Registro Esfera', 'qtd' => 2]
            ]
        ]
    ];
    require_once './views/layouts/header.php';
    require_once './views/vendas/listar.php';
    require_once './views/layouts/footer.php';
?>