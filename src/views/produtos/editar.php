<div class="modal fade" id="modalEditar" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Editar Produto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form action="" method="post" id="formProdUp">
                    <div class="mb-3">
                        <label class="form-label">Nome *</label>
                        <input type="text" id="nomeProdUp" name="nome" oninput="validaNome(this)" required class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Valor (R$) *</label>
                        <input type="number" step="0.5" id="valorProdUp" name="valor" required class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Estoque *</label>
                        <input type="number" step="1" name="estoque" id="estoqueProdUp" required class="form-control">
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button class="btn btn-primary">Atualizar</button>
                    </div>
                </form>
            </div>



        </div>
    </div>
</div>

<script>
  const modalEditar = document.getElementById('modalEditar');

  modalEditar.addEventListener('shown.bs.modal', function (event) {
    const button = event.relatedTarget;
    const formFuncUp = document.getElementById("formProdUp");

    const id = button.getAttribute('data-id');
    const nome = button.getAttribute('data-nome');
    const valor = button.getAttribute('data-valor');
    const estoque = button.getAttribute('data-estoque');


    const inputNome = modalEditar.querySelector('.modal-body #nomeProdUp');
    const inputValor = modalEditar.querySelector('.modal-body #valorProdUp');
    const inputEstoque = modalEditar.querySelector('.modal-body #estoqueProdUp');
    formFuncUp.action = "./models/actions/produtos/update.php?id=" + id;

    inputNome.value = nome;
    inputValor.value = valor;
    inputEstoque.value = estoque;   
    inputNome.focus();
    inputEstoque.min = estoque;
  })

      function validaNome(input) {
        let nome = input.value;

        nome = nome.replace(/[^a-zA-Z\u00C0-\u00FF ]/g, "");

        input.value = nome;
    }
</script>