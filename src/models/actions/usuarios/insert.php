<?php 

    require_once __DIR__ . '/../../usuarioModel.php';
    require_once __DIR__ . '/../../utils/validations.php';
    require_once __DIR__ . '/../../utils/sessionsFeedbacks.php';

    $email = $_POST["email"] ?? "";
    $password = $_POST["senha"] ?? "";

    if(!required($email) || !required($password) || !maxLength($password, 8)) {
        sessionError("Dados inválidos!");
    }

    if(usuarioExiste($email)) {
        sessionError("Usuário já existente!");
    }

    $password = applyHash($password);

    criarUsuario($email, $password);

    sessionSucess();
    
?>