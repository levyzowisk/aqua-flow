<?php 
    include_once 'cadastrar.php';
    include_once 'editar.php';
    
    $listaDeFuncionarios = listarFuncionarioAtivo();
    // var_dump(count($listaDeFuncionarios) > 0);
    $listaDeProdutos = listarProdutoComEstoque();
    // var_dump($listaDeProdutos);
    // var_dump(count($listaDeProdutos) == 0);
?>

<div class="card">
    <div class="card-header  d-flex justify-content-between">
        <h3>Gerenciamento de Vendas</h3>
         <?php if(count($listaDeFuncionarios) == 0): ?>
                        <button data-bs-toggle="modal" disabled data-bs-target="#modalCadastrarMeta" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalNovo">
                Nova Meta
            </button>  
        </div>
            <div class="alert alert-warning" role="alert">
                Não há funcionários ativos. Cadastre funcionários antes de criar metas.
            </div>
      
    </div>
    <?php elseif (count($listaDeProdutos) == 0): ?>
                <button data-bs-toggle="modal" disabled data-bs-target="#modalCadastrarMeta" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalNovo">
                Nova Meta
            </button>  
        </div>
            <div class="alert alert-warning" role="alert">
                 Não há produtos em estoque. Cadastre os itens necessários antes de registrar vendas.
            </div>
        <?php else: ?>
      <button data-bs-toggle="modal" data-bs-target="#modalCadastrarMeta" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalNovo">
                Nova Meta
            </button>
    </div>

        <?php endif; ?>
    <div class="card-body d-flex justify-content-center">
        <table class="table table-striped table-hover w-full">
            <thead>
                <tr class="">
                    <th class="text-center px-3">ID</th>
                    <th class="text-center px-3">Funcionário</th>
                    <th class="text-center px-3">Data de Operação</th>
                    <th class="text-center px-3">Produtos Vendidos</th>
                    </tr>
            </thead>
            <tbody >
                <?php foreach ($listaDeVendas as $venda): ?>
                <tr class="">
                    <td class="text-center px-3"><?= $venda['id'] ?></td>
                    <td class="text-center px-3"><?= htmlspecialchars($venda['nome_funcionario']) ?></td>
                    <td class="text-center px-3"><?= htmlspecialchars($venda['data_venda']) ?></td>
                    <td class="text-center px-3">   
                            <span class="badge bg-light text-dark border mb-1">
                                <?= $venda['quantidade'] ?>x <?= $venda['nome_produto'] ?>
                            </span>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php if ($feedback): ?>    
    <script>
        Toastify({
        text: "<?= $feedback["msg"] ?>",
        duration: 3000,
        destination: "https://github.com/apvarun/toastify-js",
        newWindow: true,
        close: true,
        gravity: "top",
        position: "right", 
        stopOnFocus: true, 
        style: {
            background: "linear-gradient(to right, <?= $feedback['cor1'] ?>, <?= $feedback['cor2'] ?>)",  },
        }).showToast();
    </script>

<?php endif; ?> 