<?php 
$listaDeMetas = [
    [
        'id' => 1,
        'funcionario' => 'Carlos Pereira',
        'id_funcionario' => 101,
        'mesReferencia' => '2024-11-01', 
        'meta' => 5000.00
    ],
    [
        'id' => 2,
        'funcionario' => 'Ana Costa',
        'id_funcionario' => 102,
        'mesReferencia' => '2024-11-01',
        'meta' => 5500.50
    ],
    [
        'id' => 3,
        'funcionario' => 'Carlos Pereira',
        'id_funcionario' => 101,
        'mesReferencia' => '2024-12-01',
        'meta' => 6000.00
    ],
    [
        'id' => 4,
        'funcionario' => 'Roberto Santos',
        'id_funcionario' => 103,
        'mesReferencia' => '2024-12-01',
        'meta' => 4200.00
    ]
];
require_once './views/layouts/header.php';
require_once './views/metas/listar.php';
require_once './views/layouts/footer.php';
?>