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
        <table class="table table-striped table-hover w-100">
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
                <?php if(count($listaDeProdutos) > 0): ?>
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
                                data-id="<?= htmlspecialchars($user['id']) ?>"
                                data-valor="<?= htmlspecialchars($user['valor']) ?>"
                                data-estoque="<?= htmlspecialchars($user['estoque']) ?>"
                                data-nome="<?= htmlspecialchars($user['nome']) ?>">
                                Editar
                            </button>
                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="prepararZerarEstoque(<?= $user['id'] ?>, <?= $user['estoque'] ?>)">
                                Zerar Estoque
                            </button>
                            </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center px-3">Sem dados cadastrados.</td>
                        </tr>
                    <?php endif; ?>
            </tbody>
        </table>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">    
        <h1 class="modal-title fs-5" id="exampleModalLabel">Zerar Estoque</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Tem certeza que deseja <b>zerar estoque ?</b></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <a href="#" id="btnConfirmarExclusao" class="btn btn-danger">Sim, Zerar</a>
      </div>
    </div>
  </div>
</div>

<script>
function prepararZerarEstoque(id, estoque) {
        const btnConfirmar = document.getElementById('btnConfirmarExclusao');
        
        btnConfirmar.href = "./models/actions/produtos/reset.php?id=" + id + "&estoque=" + estoque;
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
    </div>
</div>