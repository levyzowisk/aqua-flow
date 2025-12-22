<?php 
    require_once 'conexao.php';

    function listarVenda() {
        $query = conexao()->prepare("SELECT v.id, f.nome as nome_funcionario, p.nome as nome_produto, vp.quantidade, p.valor, v.data_venda  FROM venda v INNER JOIN  funcionario f ON v.id_funcionario = f.id  INNER JOIN venda_produto vp ON vp.id_venda = v.id INNER JOIN produto p ON p.id = vp.id_produto");

        $query->execute();

        return $query->fetchAll();
    }

    function criarVenda($idFuncionario, $data) {
        $pdo = conexao();
        
        $query = $pdo->prepare("INSERT INTO venda (id_funcionario, data_venda)
            VALUES (:idFuncionario, :data_venda)
        ");

        $query->execute([
            ":idFuncionario" => $idFuncionario,
            ":data_venda" => $data
        ]);

        return $pdo->lastInsertId();
    }


?>