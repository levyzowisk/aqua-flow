<?php 
    require_once "conexao.php";

    function listarMeta(){
        $query = conexao()->prepare("SELECT m.id, m.mes_meta, m.valor_meta, func.nome
                                        FROM meta m
                                        INNER JOIN funcionario func
                                        ON m.id_funcionario = func.id;
                                        ");

        $query->execute();

        return $query->fetchAll();
    }

    function deletarMeta($id) {
        $query = conexao()->prepare("DELETE FROM meta WHERE id = :id");

        $query->execute([
            ":id" => $id
        ]);

    }


    function cadastrarMeta($idFuncionario, $mes, $valor) {
        $query = conexao()->prepare("INSERT INTO meta (
            id_funcionario, mes_meta, valor_meta
        )
        VALUES (:id_funcionario, :mes_meta, :valor_meta)
        ");

        $query->execute([
            ":id_funcionario" => $idFuncionario,
            ":mes_meta" => $mes,
            ":valor_meta" => $valor,
        ]);
    }
?>