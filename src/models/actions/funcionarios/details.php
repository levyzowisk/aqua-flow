<?php
    require_once __DIR__ . '/../../utils/sessionsFeedbacks.php';
    require_once __DIR__ . '/../../funcionarioModel.php';

    header('Content-Type: application/json');


    $id = $_GET["id"] ?? "";

    if(!$id) {
        echo json_encode(['erro' => 'ID não informado na requisição.']);
        exit();
    }
    $detailsFuncionario = buscarFuncionarioPorId($id);
    // var_dump($detailsFuncionario);
    // exit();

    if(!$detailsFuncionario) {
        echo json_encode(['erro' => 'Usuário não existente']);
        exit();
    }


    $detailsMeta = buscarMetaPorFuncionario($id);

    $detailsVenda = buscarDetalhesDeVendaPorUsuario($id);

    $totalVendido = 0;
    foreach ($detailsVenda as $item) {
        $totalVendido += $item['total_item'];
    }

    $response = [
        'nome' => $detailsFuncionario['nome'], 
        'cpf' => $detailsFuncionario['cpf'],
        'admissao' => date('d/m/Y', strtotime($detailsFuncionario['data_contratacao'])),
        'status' => ($detailsFuncionario['data_admissao'] === null) ? 'Ativo' : 'Demitido',
        'meta' => $detailsMeta["valor_meta"] ?? 0,
        'vendido' => $totalVendido,
        'produtos' => $detailsVenda ?? []
    ];

    echo json_encode($response);
?>  