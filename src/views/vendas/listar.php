<?php 
    include_once 'cadastrar.php';
    include_once 'editar.php';
?>

<div class="card">
    <div class="card-header  d-flex justify-content-between">
        <h3>Gerenciamento de Vendas</h3>
        <button data-bs-toggle="modal" data-bs-target="#modalUsuario" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalNovo">
            Nova Venda
        </button>
    </div>
    <div class="card-body d-flex justify-content-center">
        <table class="table table-striped table-hover w-full">
            <thead>
                <tr class="">
                    <th class="text-center px-3">ID</th>
                    <th class="text-center px-3">Funcionário</th>
                    <th class="text-center px-3">Data de Operação</th>
                    <th class="text-center px-3">Produtos Vendidos</th>
                    <th class="text-center px-3">Ações</th>
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
                    <td class="text-center px-3">
                        <button type="button" 
                            class="btn btn-sm btn-warning" 
                            data-bs-toggle="modal" 
                            data-bs-target="#modalEditar"
                            data-id="<?= $venda['id'] ?>" 
                            data-login="<?= htmlspecialchars($venda['id']) ?>">
                            Editar
                        </button>
                        <a href="excluir_usuario.php?id=<?= $venda['id'] ?>" class="btn btn-sm btn-danger">Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>