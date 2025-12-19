<?php 
include_once 'cadastrar.php';
include_once 'editar.php';

?>

<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h3>Gerenciamento de Funcionários</h3>
        <button data-bs-toggle="modal" data-bs-target="#modalFuncionario" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalNovo">
            Novo Funcionário
        </button>
    </div>
    <div class="card-body">
        <table class="table table-striped table-hover w-100">
            <thead>
                <tr>
                    <th class="text-center px-3">ID</th>
                    <th class="text-center px-3">CPF</th>
                    <th class="text-center px-3">Nome</th>
                    <th class="text-center px-3">Admissão</th>
                    <th class="text-center px-3">Demissão</th>
                    <!-- <th class="text-center px-3">Status</th> -->
                    <th class="text-center px-3">Ações</th>
                </tr>
            </thead>
            <tbody>

            <?php if(count($listaDeFuncionarios) > 0): ?>
                <?php foreach ($listaDeFuncionarios as $user): ?>

                <tr>
                    <td class="text-center px-3"><?= $user['id'] ?></td>
                    <td class="text-center pc-3"><?= preg_replace('/(\d{3})\.\d{3}\.\d{3}-(\d{2})/', '$1.***.***-$2', $user['cpf']) ?></td>
                    <td class="text-center px-3"><?= htmlspecialchars($user['nome']) ?></td>
                    <td class="text-center px-3"><?= htmlspecialchars($user['data_contratacao']) ?></td>
                    <?php if($user["data_admissao"] === null): ?>
                    <td class="text-center px-3"><?= "-"?></td>
                        <?php else: ?>
                        <td class="text-center px-3"><?= htmlspecialchars($user['data_admissao'])?></td>
                        <?php endif; ?>

                    <!-- <td class="text-center px-3"><?= htmlspecialchars($user['status']) ?></td> -->
                    <td class="text-center px-3">
                        <button type="button" 
                            class="btn btn-sm btn-warning" 
                            data-bs-toggle="modal" 
                            data-bs-target="#modalEditar"
                            data-cpf="<?= htmlspecialchars($user['cpf']) ?>">
                            Editar
                        </button>
                        <?php if($user["data_admissao"] === null): ?>
                        <a href="./models/actions/funcionarios/dismiss.php?id=<?= $user['id'] ?>" class="btn btn-sm btn-secondary">Demitir</a>

                        <?php else: ?>
                        <a href="./models/actions/funcionarios/activate.php?id=<?= $user['id'] ?>" class="btn btn-sm btn-primary">Ativar</a>
                        <?php endif; ?>
                        
                    </td>
                </tr>
                <?php endforeach; ?>

                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center px-3">Sem dados cadastrados.</td>
                    </tr>

                <?php endif; ?>
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