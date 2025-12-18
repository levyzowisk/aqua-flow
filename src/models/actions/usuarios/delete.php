<?php 
    require_once __DIR__ . '/../../usuarioModel.php';
    require_once __DIR__ . '/../../utils/sessionsFeedbacks.php';
            
    $id = $_GET["id"] ?? "";

    if($id === "") {
        sessionError("Não foi possível deletar usuário!");
    }

    deletarUsuario($id);
    sessionSucess("Usuário deletado com sucesso!");


?>