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
            <tbody>
                <?php if (count($listaDeUsuarios) > 0): ?>
                 <?php foreach ($listaDeUsuarios as $user): ?>
                    <tr class="">
                        <td class="text-center px-3"><?= $user['id'] ?></td>
                        <td class="text-center px-3"><?= htmlspecialchars($user['email']) ?></td>
                        <td class="text-center px-3">
                            <button type="button" 
                                class="btn btn-sm btn-warning" 
                                data-bs-toggle="modal" 
                                data-bs-target="#modalEditar"
                                data-id="<?= $user['id'] ?>" 
                                data-login="<?= htmlspecialchars($user['email']) ?>">
                                Editar
                            </button>
                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="prepararExclusao(<?= $user['id'] ?>)">
                                Excluir
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?> 

                <?php else: ?>

                    <tr >
                        <td colspan="3" class="text-center">Sem dados cadastrados.</td>
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
        <h1 class="modal-title fs-5" id="exampleModalLabel">Excluir Usuário</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Tem certeza que deseja excluir este usuário? Esta ação não pode ser desfeita.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <a href="#" id="btnConfirmarExclusao" class="btn btn-danger">Sim, Excluir</a>
      </div>
    </div>
  </div>
</div>

<script>
function prepararExclusao(idUsuario) {
        const btnConfirmar = document.getElementById('btnConfirmarExclusao');
        
        btnConfirmar.href = "./models/actions/usuarios/delete.php?id=" + idUsuario;
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