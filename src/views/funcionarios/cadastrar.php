<div class="modal fade" id="modalFuncionario" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Cadastrar Funcionário</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form action="../src/models/actions/funcionarios/insert.php" method="post">
                    <div class="mb-3">
                        <label class="form-label">Nome Completo *</label>
                        <input type="text" name="nome" required oninput="validaNome(this)" id="nomeFunc" placeholder="Chiquin da silva" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">CPF *</label>
                        <input type="text" name="cpf" required oninput="mascaraCPF(this)" maxlength="14" placeholder="000.000.000-00" pattern="[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Data de admissão *</label>
                        <input type="date" name="data_admissao" required class="form-control">
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
  const modalUsuario = document.getElementById('modalFuncionario');

  modalUsuario.addEventListener('shown.bs.modal', () => {
    document.getElementById('nomeFunc').focus();
  });

    function validaNome(input) {
        let nome = input.value;

        nome = nome.replace(/[^a-zA-Z\u00C0-\u00FF ]/g, "");

        input.value = nome;
    }

    function mascaraCPF(input) {
        let cpf = input.value;

        cpf = cpf.replace(/\D/g, "");

        cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2");

        cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2");

        cpf = cpf.replace(/(\d{3})(\d{1,2})$/, "$1-$2");

        input.value = cpf;
    }
</script>