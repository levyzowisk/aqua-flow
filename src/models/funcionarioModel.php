<?php 
    require_once "conexao.php";

    function funcionarioExiste($cpf) {
        $query = conexao()->prepare("SELECT * FROM funcionario WHERE cpf = :cpf");

        $query->execute([
            ":cpf" => $cpf
        ]);

        return $query->rowCount() > 0;
    }

    function listarFuncionario() {
        $query =  conexao()->prepare("SELECT * FROM funcionario");

        $query->execute();

        return $query->fetchAll();
    }

    function criarFuncionario($cpf, $nome, $data_contratacao) {
        $query = conexao()->prepare("INSERT INTO funcionario (cpf, nome, data_contratacao)
            VALUES(:cpf, :nome, :data_contratacao)
            ");

        $query->execute([
            ":cpf" => $cpf,
            ":nome" => $nome,
            ":data_contratacao" => $data_contratacao
            ]);
    }

    function demitirFuncionario($id) {
        $query = conexao()->prepare("UPDATE funcionario SET data_admissao = CURDATE()
            WHERE id = :id
        ");

        $query->execute([
            ":id" => $id
        ]);
    }

    function ativarFuncionario($id) {
        $query = conexao()->prepare("UPDATE funcionario SET data_admissao = NULL
            WHERE id = :id
        ");

        $query->execute([
            ":id" => $id 
        ]);
    }
?>