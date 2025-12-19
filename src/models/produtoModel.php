<?php 
    require_once "conexao.php";

    function produtoExiste($nome) {
        $query = conexao()->prepare("SELECT * FROM produto WHERE nome = :nome");

        $query->execute([
            ":nome" => $nome,
        ]);

        return $query->rowCount() > 0;
    }

    function listarProduto() {
        $query = conexao()->prepare("SELECT * FROM produto");

        $query->execute();

        return $query->fetchAll();
    }

    function criarProduto($nome, $valor, $estoque) {
        $query = conexao()->prepare("INSERT INTO produto (nome, valor, estoque)
            VALUES(:nome, :valor, :estoque)
        ");

        $query->execute([
            ":nome" => $nome,
            ":valor" => $valor,
            ":estoque" => $estoque
        ]);
    }

    function zerarEstoque($id) {
        $query = conexao()->prepare("UPDATE produto SET estoque = 0
            WHERE id = :id
        ");

        $query->execute([
            ":id" => $id
        ]);
    }

?>