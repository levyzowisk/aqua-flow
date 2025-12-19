<?php 

    require_once __DIR__ . "/../../metaModel.php";
    require_once __DIR__ . "/../../utils/sessionsFeedbacks.php";

    $id = $_GET["id"] ?? "";

    if(!$id) {
        sessionError("Dados inválidos.", "metas.php");
    }

    deletarMeta($id);
    sessionSucess("Operação bem sucedida!", "metas.php");

?>