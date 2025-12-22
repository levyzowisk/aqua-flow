<?php 
    require_once 'conexao.php';
    function criarVendaProduto($idVenda, $produtos, $quantidade) {
        $query = conexao()->prepare("INSERT INTO venda_produto(id_venda, id_produto, quantidade) VALUES (:idVenda, :idProduto, :quantidade)");

        for ($i = 0; $i < count($produtos); $i++) {
            
            $idProduto = $produtos[$i];
            $quantidade = $quantidade[$i];     

            $query->execute([
              ":idVenda"  => $idVenda, 
              ":idProduto"  => $idProduto,
              ":quantidade"  => $quantidade,
            ]);
        }
    }

?>