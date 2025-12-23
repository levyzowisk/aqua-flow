<?php 
    $feedback = null;
    require_once './models/utils/auth.php';
    exigirLogin();

    if(isset($_SESSION["feedback"])) {
        $feedback = $_SESSION["feedback"];

        unset($_SESSION["feedback"]);
    }

    require_once './models/usuarioModel.php';
    $listaDeUsuarios = (listarUsuarios());

    require_once './views/layouts/header.php';
    require_once './views/usuarios/listar.php';
    require_once './views/layouts/footer.php';
?>