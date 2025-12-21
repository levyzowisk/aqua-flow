<?php 
    require_once "conexao.php";

    function funcionarioExiste($cpf) {
        $query = conexao()->prepare("SELECT * FROM funcionario WHERE cpf = :cpf");

        $query->execute([
            ":cpf" => $cpf
        ]);

        return $query->rowCount() > 0;
    }

    function buscarFuncionarioPorId($id) {
        $query = conexao()->prepare("SELECT * FROM funcionario WHERE id = :id");

        $query->execute([
            ":id" => $id
        ]);

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    function listarFuncionario() {
        $query =  conexao()->prepare("SELECT * FROM funcionario");

        $query->execute();

        return $query->fetchAll();
    }

    function listarFuncionarioAtivo() {
        $query =  conexao()->prepare("SELECT * FROM funcionario WHERE data_admissao IS NULL");

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

    function buscarDetalhesDeVendaPorUsuario($id) {
        $query = conexao()->prepare("SELECT p.nome as produto_nome,
            vp.quantidade,
            (vp.quantidade * p.valor) as total_item
            FROM venda v 
            INNER JOIN venda_produto vp ON v.id = vp.id_venda
            INNER JOIN produto p ON vp.id_produto = p.id
            WHERE v.id_funcionario = :id
        ");

        $query->execute([
            ":id" => $id
        ]);

        return $query->fetchAll(PDO::FETCH_ASSOC);  
    }

    function buscarMetaPorFuncionario($id) {
        $query = conexao()->prepare("SELECT * FROM meta WHERE id_funcionario = :id");

        $query->execute([
            ":id" => $id
        ]);

        return $query->fetch();  
        
    }

    function atualizarFuncionario($id, $nome, $cpf, $data) {
        $query = conexao()->prepare("UPDATE funcionario SET nome = :nome, cpf = :cpf, data_contratacao = :data_contratacao
        WHERE id = :id
        ");

        $query->execute([
            ":id" => $id,
            ":nome" => $nome,
            ":cpf" => $cpf,
            ":data_contratacao" => $data
        ]);
    }

?>  