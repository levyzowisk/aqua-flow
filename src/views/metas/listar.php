<?php 
    include_once 'cadastrar.php';
    include_once 'editar.php';  
?>

<div class="card">
    <div class="card-header  d-flex justify-content-between">
        <h3>Gerenciamento de Metas</h3>
        <button data-bs-toggle="modal" data-bs-target="#modalCadastrar" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalNovo">
            Nova Meta
        </button>
    </div>
    <div class="card-body d-flex justify-content-center">
        <table class="table table-striped table-hover w-full">
            <thead>
                <tr class="">
                    <th class="text-center px-3">ID</th>
                    <th class="text-center px-3">Funcionário</th>
                    <th class="text-center px-3">Mês-Referência</th>
                    <th class="text-center px-3">Valor da Meta</th>
                    <th class="text-center px-3">Ações</th>
                </tr>
            </thead>
            <tbody >
                <?php foreach ($listaDeMetas as $metas): ?>
                <tr class="">
                    <td class="text-center px-3"><?= $metas['id'] ?></td>
                    <td class="text-center px-3"><?= htmlspecialchars($metas['funcionario']) ?></td>
                    <td class="text-center px-3"><?= htmlspecialchars($metas['mesReferencia']) ?></td>
                    <td class="text-center px-3"><?= htmlspecialchars($metas['meta']) ?></td>
                    <td class="text-center px-3">
                        <button type="button" 
                            class="btn btn-sm btn-warning" 
                            data-bs-toggle="modal" 
                            data-bs-target="#modalEditar"
                                data-id="<?= htmlspecialchars($metas['id']) ?>">
                            Editar
                        </button>
                        <a href="excluir_usuario.php?id=<?= $metas['id'] ?>" class="btn btn-sm btn-danger">Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>