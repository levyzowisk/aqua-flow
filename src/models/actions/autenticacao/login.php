<?php 
    require_once __DIR__ . "/../../usuarioModel.php";
    require_once __DIR__ . "/../../utils/validations.php";
    require_once __DIR__ . "/../../utils/sessionsFeedbacks.php";
    session_start();

    $email = $_POST["email"] ?? "";
    $password = $_POST["password"] ?? "";

    if(!required($email) || !maxLength($password, 8)) {
        sessionError("Dados inválidos", "login.php");
    }

    $usuario = buscarUsuarioPorEMail($email);
    if(!$usuario) {
        sessionError("Usuário não existente", "login.php");
    }
    $senhaBanco = $usuario["password"];

    if (!password_verify($password, $senhaBanco)) {
        sessionError("Credenciais inválidas", "login.php");
    }

    $_SESSION['usuario'] = [
    'id' => $usuario['id'],
    'nome' => $usuario['nome'],
    ];
    sessionSucess("Login efetuado", "usuarios.php");
?>
