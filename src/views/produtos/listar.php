<div class="card">
    <div class="card-header  d-flex justify-content-between">
        <h3>Gerenciamento de Funcionários</h3>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalNovo">
            Novo Funcionário
        </button>
    </div>
    <div class="card-body">
        <table class="table table-hover w-100">
            <thead>
                <tr>
                    <th>CPF</th>
                    <th>Nome</th>
                    <th>Admissão</th>
                    <th>Demissão</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listaDeProdutos as $user): ?>
                <tr>
                    <td><?= $user['cpf'] ?></td>
                    <td><?= htmlspecialchars($user['nome']) ?></td>
                    <td><?= htmlspecialchars($user['data_contratacao']) ?></td>
                    <td><?= htmlspecialchars($user['data_demissao']) ?></td>
                    <td><?= htmlspecialchars($user['status']) ?></td>
                    <td>
                        <a href="#" class="btn btn-sm btn-warning">Editar</a>
                        <a href="excluir_usuario.php?id=<?= $user['id'] ?>" class="btn btn-sm btn-danger">Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>