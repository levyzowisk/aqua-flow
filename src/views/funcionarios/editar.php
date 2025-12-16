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
                        <label class="form-label">Usuário</label>
                        <input type="text" name="usuario" required class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Senha</label>
                        <input type="password" name="senha" required maxlength="8" class="form-control">
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
  const modalEditar = document.getElementById('modalEditar')

  modalEditar.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget

    const cpf = button.getAttribute('data-cpf')

    const inputId = modalEditar.querySelector('.modal-body #edit_id')
    const inputLogin = modalEditar.querySelector('.modal-body #edit_login')

    inputId.value = id
    inputLogin.value = login
  })
</script>