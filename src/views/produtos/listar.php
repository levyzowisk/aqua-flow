<?php 
    include_once 'editar.php';
    include_once 'cadastrar.php';
?>

<div class="card">
    <div class="card-header  d-flex justify-content-between">
        <h3>Gerenciamento de Produtos</h3>
        <button data-bs-toggle="modal" data-bs-target="#modalProduto" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalNovo">
            Novo Produto
        </button>
    </div>
    <div class="card-body">
        <table class="table table-hover w-100">
            <thead>
                <tr>
                    <th class="text-center px-3">ID</th>
                    <th class="text-center px-3">Nome</th>
                    <th class="text-center px-3">Valor Unitário</th>
                    <th class="text-center px-3">Estoque</th>
                    <th class="text-center px-3">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listaDeProdutos as $user): ?>
                <tr>
                    
                    <td class="text-center px-3"><?= htmlspecialchars($user['id']) ?></td>
                    <td class="text-center px-3"><?= htmlspecialchars($user['nome']) ?></td>
                    <td class="text-center px-3"><?= htmlspecialchars($user['valor']) ?></td>
                    <td class="text-center px-3"><?= htmlspecialchars($user['estoque']) ?></td>
                    <td class="text-center px-3">
                        <button type="button" 
                            class="btn btn-sm btn-warning" 
                            data-bs-toggle="modal" 
                            data-bs-target="#modalEditar"
                            data-id="<?= htmlspecialchars($user['id']) ?>">
                            Editar
                        </button>
                        <a href="excluir_usuario.php?id=<?= $user['id'] ?>" class="btn btn-sm btn-danger">Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>