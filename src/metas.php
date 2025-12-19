<?php 
session_start();
$feedback = null;

if(isset($_SESSION["feedback"])) {
    $feedback = $_SESSION["feedback"];

    unset($_SESSION["feedback"]);
}

require_once "./models/metaModel.php";
require_once "./models/funcionarioModel.php";
$listaDeMetas = listarMeta();
require_once './views/layouts/header.php';
require_once './views/metas/listar.php';
require_once './views/layouts/footer.php';
?>