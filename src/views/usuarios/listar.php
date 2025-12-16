<?php 
    include_once 'cadastrar.php';
    include_once 'editar.php';
?>

<div class="card">
    <div class="card-header  d-flex justify-content-between">
        <h3>Gerenciamento de Usuários</h3>
        <button data-bs-toggle="modal" data-bs-target="#modalUsuario" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalNovo">
            Novo Usuário
        </button>
    </div>
    <div class="card-body d-flex justify-content-center">
        <table class="table table-striped table-hover w-full">
            <thead>
                <tr class="">
                    <th class="text-center px-3">ID</th>
                    <th class="text-center px-3">Usuário</th>
                    <th class="text-center px-3">Ações</th>
                </tr>
            </thead>
            <tbody >
                <?php foreach ($listaDeUsuarios as $user): ?>
                <tr class="">
                    <td class="text-center px-3"><?= $user['id'] ?></td>
                    <td class="text-center px-3"><?= htmlspecialchars($user['usuario']) ?></td>
                    <td class="text-center px-3">
                        <button type="button" 
                            class="btn btn-sm btn-warning" 
                            data-bs-toggle="modal" 
                            data-bs-target="#modalEditar"
                            data-id="<?= $user['id'] ?>" 
                            data-login="<?= htmlspecialchars($user['usuario']) ?>">
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