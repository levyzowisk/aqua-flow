<?php 
   
   require_once __DIR__ . '/../../metaModel.php';
   require_once __DIR__ . '/../../utils/sessionsFeedbacks.php';
   require_once __DIR__ . '/../../utils/validations.php';

   $id = $_GET["id"] ?? "";

   $valor = $_POST["meta"] ?? "";



   if(!required($valor) || !checkNumber($valor) || !required($id)) {
    sessionError("Dados inválidos", "metas.php");
   }

   if(!buscarMetaPorId($id)) {
    sessionError("Meta inexistente!", "metas.php");
   }

   atualizarMeta($id, $valor);
   sessionSucess("Meta atualizada com sucesso!", "metas.php")
?>