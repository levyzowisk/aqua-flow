<?php 
session_start();

function sessionSucess($text = "Usuário cadastrado com sucesso.", $page = 'usuarios.php') {
    $_SESSION['feedback'] = [
        'cor1' => '#34801aff',
        'cor2' => '#00ff62ff',
        'msg' => "$text",
    ];
    header("Location: ../../../$page");
    exit;
}

function sessionError($text = "Não foi possível cadastrar o usuário.", $page = 'usuarios.php') {
    $_SESSION['feedback'] = [
        'cor1' => '#7d1e01ff',
        'cor2' => '#ff0000ff',
        'msg' => "$text"
    ];
    header("Location: ../../../$page");
    exit;
}
?>