<?php
    require_once __DIR__ . "/sessionsFeedbacks.php";

function exigirLogin() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION['usuario'])) {
        sessionError("Não autenticado, faça o login!", "./aqua-flow/src/login.php");
    }
}
?>