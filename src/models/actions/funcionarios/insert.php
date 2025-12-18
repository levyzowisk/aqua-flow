<?php 

    require_once __DIR__ . '/../../funcionarioModel.php';
    require_once __DIR__ . '/../../utils/sessionsFeedbacks.php';
    require_once __DIR__ . '/../../utils/validations.php';

    $cpf = $_POST["cpf"] ?? "";
    $nome = $_POST["nome"] ?? "";
    $data_admissao = $_POST["data_admissao"] ?? "";

    // var_dump($cpf);
    // var_dump(checkCPF($cpf));
    // exit();
    var_dump($nome);
    var_dump($data_admissao);
    // exit();


    if(!required($cpf) || !required($nome) || !required($data_admissao) || !checkCPF($cpf)) {
        sessionError("Dados inválidos", 'funcionarios.php');
    }

    if(funcionarioExiste($cpf)) {
        sessionError("Usuário já existente!", 'funcionarios.php');
    }

    criarFuncionario($cpf, $nome, $data_admissao);

    sessionSucess("Funcionario cadastrado com sucesso!", 'funcionarios.php');

?>