<div class="modal fade" id="modalEditar" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Editar Usuário</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Login</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Senha</label>
                        <input type="password" class="form-control">
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button class="btn btn-primary">Salvar</button>
            </div>

        </div>
    </div>
</div>

<script>
  // Seleciona o modal pelo ID
  const modalEditar = document.getElementById('modalEditar')

  // Adiciona um "ouvinte" para quando o modal for exibido
  modalEditar.addEventListener('show.bs.modal', function (event) {
    // Botão que acionou o modal
    const button = event.relatedTarget

    // Extrai informações dos atributos data-*
    const id = button.getAttribute('data-id')
    const login = button.getAttribute('data-login')

    // Atualiza o conteúdo dos inputs do modal
    const inputId = modalEditar.querySelector('.modal-body #edit_id')
    const inputLogin = modalEditar.querySelector('.modal-body #edit_login')

    inputId.value = id
    inputLogin.value = login
  })
</script>