<?php 
include_once 'cadastrar.php';
?>

<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h3>Gerenciamento de Funcionários</h3>
        <button data-bs-toggle="modal" data-bs-target="#modalUsuario" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalNovo">
            Novo Funcionário
        </button>
    </div>
    <div class="card-body">
        <table class="table table-hover w-100">
            <thead>
                <tr>
                    <th class="text-start">CPF</th>
                    <th class="text-center px-3">Nome</th>
                    <th class="text-center px-3">Admissão</th>
                    <th class="text-center px-3">Demissão</th>
                    <th class="text-center">Status</th>
                    <th class="text-end px-3">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listaDeFuncionarios as $user): ?>
                <tr>
                    <td class="text-start"><?= $user['cpf'] ?></td>
                    <td class="text-center px-3"><?= htmlspecialchars($user['nome']) ?></td>
                    <td class="text-center px-3"><?= htmlspecialchars($user['data_contratacao']) ?></td>
                    <td class="text-center px-3"><?= htmlspecialchars($user['data_demissao']) ?></td>
                    <td class="text-center   px-3"><?= htmlspecialchars($user['status']) ?></td>
                    <td class="text-end  px-3">
                        <a href="#" class="btn btn-sm btn-warning">Editar</a>
                        <a href="excluir_usuario.php?id=<?= $user['id'] ?>" class="btn btn-sm btn-danger">Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>