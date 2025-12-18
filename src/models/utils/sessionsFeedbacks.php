<?php 
session_start();

function sessionSucess($text = "Usuário cadastrado com sucesso.") {
    $_SESSION['feedback'] = [
        'cor1' => '#34801aff',
        'cor2' => '#00ff62ff',
        'msg' => "$text",
    ];
    header('Location: ../../../usuarios.php');
    exit;
}

function sessionError($text = "Não foi possível cadastrar o usuário.") {
    $_SESSION['feedback'] = [
        'cor1' => '#7d1e01ff',
        'cor2' => '#ff0000ff',
        'msg' => "$text"
    ];
    header('Location: ../../../usuarios.php');
    exit;
}
?>