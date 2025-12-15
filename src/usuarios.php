<?php 
    $listaDeUsuarios = [
        [
            'id' => 1, 
            'usuario' => 'admin.master', 
            'senha' => '123456'
        ],
        [
            'id' => 2, 
            'usuario' => 'joao.silva', 
            'senha' => 'abcde'
        ],
        [
            'id' => 3, 
            'usuario' => 'maria.souza', 
            'senha' => 'senha123'
        ],
    ];
    require_once './views/layouts/header.php';
    require_once './views/usuarios/listar.php';
    require_once './views/layouts/footer.php';
?>