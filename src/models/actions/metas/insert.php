<?php 
   require_once __DIR__ . "/../../metaModel.php";
   require_once __DIR__ . "/../../utils/sessionsFeedbacks.php";
   require_once __DIR__ . "/../../utils/validations.php";

   $idFuncionario = $_POST["funcionario"] ?? "";
   $mes = $_POST["mesRef"] ?? "";
   $valor = $_POST["meta"] ?? "";

   if(!required($idFuncionario) || !required($mes) || !required($valor) || !checkNumber($valor)) {
        sessionError("Dados inválidos", "metas.php");
   }

   cadastrarMeta($idFuncionario, $mes, $valor);
   sessionSucess("Meta cadastrada com sucesso", "metas.php");
?>