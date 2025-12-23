<?php 
    require_once __DIR__ . '/../../utils/sessionsFeedbacks.php';
// 1. Inicia a sessão (precisamos iniciá-la para poder destruí-la)
session_start();

// 2. Remove todas as variáveis de sessão (limpa os dados da memória)
$_SESSION = [];

// 3. Destrói a sessão completamente (rasga a "carteirinha")
session_destroy();

sessionSucess("Logout efetuado!", "login.php");
?>