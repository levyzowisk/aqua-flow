<?php 
    require_once __DIR__ . '/../../utils/sessionsFeedbacks.php';
    require_once __DIR__ . '/../../utils/validations.php';
    require_once __DIR__ . '/../../usuarioModel.php';

    $id = $_GET["id"] ?? "";
    $email = $_POST["email"] ?? "";
    $password = $_POST["senha"] ?? "";

    
    if(!required($email) || !required($password) || !maxLength($password, 8) || !required($id)) {
        sessionError("Dados inválidos!");
    }

    if(!buscarUsuarioPorId($id)) {
        sessionError("Usuário não existente");
    }

    $password = applyHash($password);

    atualizarUsuario($id, $email, $password);

    sessionSucess();


?>