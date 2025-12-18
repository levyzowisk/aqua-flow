<?php 
    require_once __DIR__  . "/../../funcionarioModel.php";
    require_once __DIR__ . "/../../utils/sessionsFeedbacks.php";

    $id = $_GET["id"] ?? "";

    if(!$id) {
        sessionError("Dados inválidos", "funcionarios.php");
    }

    ativarFuncionario($id);
    sessionSucess("Operação bem sucedida.", "funcionarios.php");

?>