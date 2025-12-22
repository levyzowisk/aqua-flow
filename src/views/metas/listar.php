<?php 
    include_once 'cadastrar.php';
    include_once 'editar.php';  
?>

<div class="card">
    <div class="card-header  d-flex justify-content-between">
        <h3>Gerenciamento de Metas</h3>
        <?php if(count($listaDeFuncionarios) > 0): ?>
            <button data-bs-toggle="modal" data-bs-target="#modalCadastrarMeta" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalNovo">
                Nova Meta
            </button>
    </div>
        <?php else: ?>

            <button data-bs-toggle="modal" disabled data-bs-target="#modalCadastrarMeta" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalNovo">
                Nova Meta
            </button>  
        </div>
            <div class="alert alert-warning" role="alert">
                Não há funcionários ativos. Cadastre funcionários antes de criar metas.
            </div>
        <?php endif; ?>
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
                <?php if(count($listaDeMetas) > 0) : ?>
                    <?php foreach ($listaDeMetas as $metas): ?>
                    <tr class="">
                        <td class="text-center px-3"><?= $metas['id'] ?></td>
                        <td class="text-center px-3"><?= htmlspecialchars($metas['nome']) ?></td>
                        <td class="text-center px-3"><?= htmlspecialchars($metas['mes_meta']) ?></td>
                        <td class="text-center px-3"><?= htmlspecialchars($metas['valor_meta']) ?></td>
                        <td class="text-center px-3">
                            <button type="button"   
                                class="btn btn-sm btn-warning" 
                                data-bs-toggle="modal" 
                                data-bs-target="#modalEditar"
                                data-id="<?= $metas["id"] ?>"
                                data-mes="<?= $metas['mes_meta'] ?>"
                                data-valor="<?= $metas['valor_meta'] ?>"
                                data-funcionario="<?= htmlspecialchars($metas['nome']) ?>">
                                Editar
                            </button>
                            <!-- <a href="./models/actions/metas/delete.php?id=<?= $metas['id'] ?>" class="btn btn-sm btn-danger">Excluir</a> -->
                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="prepaparExcluirMeta(<?= $metas['id']?>)">
                                Excluir
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>

                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center">Sem dados cadastrados.</td>
                        </tr>
                    <?php endif; ?>    
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">    
        <h1 class="modal-title fs-5" id="exampleModalLabel">Excluir Meta</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Tem certeza que deseja <b>excluir meta?</b></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <a href="#" id="btnConfirmarExclusao" class="btn btn-danger">Sim, excluir</a>
      </div>
    </div>
  </div>
</div>

<script>
function prepaparExcluirMeta(id) {
        const btnConfirmar = document.getElementById('btnConfirmarExclusao');
        
        btnConfirmar.href = "./models/actions/metas/delete.php?id=" + id;
    }

</script>

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