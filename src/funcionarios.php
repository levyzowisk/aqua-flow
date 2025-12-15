<?php 
    $listaDeFuncionarios = [
        [
            'id' => 101,
            'cpf' => '123.456.789-00',
            'nome' => 'Carlos Pereira',
            'data_contratacao' => '2023-01-15',
            'data_demissao' => null, // NULL significa ATIVO,
            'status' => true
        ],
        [
            'id' => 102,
            'cpf' => '987.654.321-99',
            'nome' => 'Ana Costa',
            'data_contratacao' => '2023-06-10',
            'data_demissao' => '2024-11-30', // Tem data, então está DEMITIDO
            'status' => false
        ],
        [
            'id' => 103,
            'cpf' => '456.789.123-44',
            'nome' => 'Roberto Santos',
            'data_contratacao' => '2024-02-01',
            'data_demissao' => null,
            'status' => false
        ],
    ];
    require_once './views/layouts/header.php';
    require_once './views/funcionarios/listar.php';
    require_once './views/layouts/footer.php';
?>