<?php 
    $listaDeFuncionarios = listarFuncionarioAtivo();
?>

<div class="modal fade" id="modalCadastrarMeta" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Cadastrar Meta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form action="../src/models/actions/metas/insert.php" method="post">
                    <div class="mb-3">
                        <label class="form-label">Funcionario</label>
                        <select required name="funcionario" id="selectMeta" class="form-select" aria-label="Default select example">
                            <option value="" selected disabled hidden>Selecione um funcionário</option>
                                <?php foreach($listaDeFuncionarios as $func): ?>
                                    <option  value="<?= $func["id"]?>"><?=$func["nome"]?></option>
                                <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mes de Referência</label>
                        <input type="date" name="mesRef" required class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Meta</label>
                        <input type="number" min="1" name="meta" required class="form-control">
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button class="btn btn-primary">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const modalUsuario = document.getElementById('modalCadastrarMeta');

    modalUsuario.addEventListener('shown.bs.modal', () => {
    document.getElementById('selectMeta').focus();
  });

</script>