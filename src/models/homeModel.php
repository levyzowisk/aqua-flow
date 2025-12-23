<?php 
    require_once "conexao.php"; 

    function buscarQuantidadeDeVendas() {
        $query = conexao()->prepare("SELECT COUNT(*) FROM produto");

        $query->execute([

        ]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    function faturamentoDoMes() {
        $query = conexao()->prepare("SELECT COALESCE(SUM(p.valor * vp.quantidade), 0) as total
                   FROM venda v
                   JOIN venda_produto vp ON v.id = vp.id_venda
                   JOIN produto p ON vp.id_produto = p.id");

        $query->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    }

    
    function buscarQuantidadeDeFuncionariosAtivos() {
        $query = conexao()->prepare("SELECT COUNT(*) FROM funcionario WHERE data_admissao IS NULL");
        
        $query->execute();
        
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    function buscarUltimasVendas() {
        $query = conexao()->prepare("SELECT v.id, f.nome as vendedor, v.data_venda 
                FROM venda v 
                JOIN funcionario f ON v.id_funcionario = f.id 
                ORDER BY v.id DESC 
                LIMIT 5");

        $query->execute();

        return $query->fetchAll();
    }
?>