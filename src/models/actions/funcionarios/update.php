<?php 

    require_once  __DIR__ . "/../../funcionarioModel.php";
    require_once __DIR__ . "/../../utils/sessionsFeedbacks.php";
    require_once __DIR__ . "/../../utils/validations.php";

    $id = $_GET["id"] ?? "";


    $nome = $_POST["nome"] ?? "";
    $cpf = $_POST["cpf"] ?? "";
    $data_admissao = $_POST["data_admissao"] ?? "";

    if(!required($nome) || !required($cpf) || !required($data_admissao) || !checkCPF($cpf)) {
        sessionError("Dados inválidos", "funcionarios.php");
    }

    if(!buscarFuncionarioPorId($id)) {
        sessionError("Usuário não existente!", 'funcionarios.php');
    }

    atualizarFuncionario($id, $nome, $cpf, $data_admissao);
    sessionSucess("Operação bem sucedida", "funcionarios.php");


?>