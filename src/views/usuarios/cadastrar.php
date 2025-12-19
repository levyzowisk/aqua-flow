<div class="modal fade" id="modalUsuario" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Cadastrar Usuário</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form action="../src/models/actions/usuarios/insert.php" method="post"> 
                    <div class="mb-3">
                        <label class="form-label">Email *</label>
                        <input type="email" name="email" placeholder="Chiquim@email.com" id="emailUsuario" maxlength="100" required class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Senha *</label>
                        <input type="password" name="senha" placeholder="Informe uma senha" required minlength="4" maxlength="8" class="form-control">
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
  const modalUsuario = document.getElementById('modalUsuario');

  modalUsuario.addEventListener('shown.bs.modal', () => {
    document.getElementById('emailUsuario').focus();
  });
</script>