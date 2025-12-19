<div class="modal fade" id="modalProduto" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Cadastrar Produto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form method="post" action="../src/models/actions/produtos/insert.php">
                    <div class="mb-3">
                        <label class="form-label">Nome *</label>
                        <input type="text" id="nomeProd" oninput="validaNome(this)" name="nome" required class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Valor *</label>
                        <input type="number" min="0" step="0.01" name="valor" required class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Estoque *</label>
                        <input type="number" min="0" step="1" name="estoque" required class="form-control">
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
    const modalUsuario = document.getElementById('modalProduto');

    modalUsuario.addEventListener('shown.bs.modal', () => {
    document.getElementById('nomeProd').focus();
  });

    function validaNome(input) {
        let nome = input.value;

        nome = nome.replace(/[^a-zA-Z\u00C0-\u00FF ]/g, "");

        input.value = nome;
    }

</script>