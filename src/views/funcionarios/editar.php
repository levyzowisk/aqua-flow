<div class="modal fade" id="modalEditarFuncionario" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Editar Funcionário</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form action="" method="post" id="formFuncUp">
                    <div class="mb-3">
                        <label class="form-label">Nome Completo *</label>
                        <input type="text" name="nome" required oninput="validaNome(this)" id="nomeFuncUp" placeholder="Chiquin da silva" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">CPF *</label>
                        <input type="text" name="cpf" required id="cpfFuncUp" oninput="mascaraCPF(this)" maxlength="14" placeholder="000.000.000-00" pattern="[0-9]{3}\.[0-9]{3}\.[0-9]{3}-[0-9]{2}" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Data de admissão *</label>
                        <input type="date" name="data_admissao" id="dateFuncUp" required class="form-control">
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
  const modalEditar = document.getElementById('modalEditarFuncionario')

  modalEditar.addEventListener('shown.bs.modal', function (event) {
    const button = event.relatedTarget

    const cpf = button.getAttribute('data-cpf');
    const nome = button.getAttribute('data-nome');
    const dateAdmissao = button.getAttribute('data-dateContratacao');
    const id = button.getAttribute('data-id');
    const form = document.getElementById("formFuncUp");
    form.action = "./models/actions/funcionarios/update.php?id=" + id;
    

    const inputNome= modalEditar.querySelector('.modal-body #nomeFuncUp');
    const inputCpf = modalEditar.querySelector('.modal-body #cpfFuncUp');
    const inputData = modalEditar.querySelector('.modal-body #dateFuncUp');

    inputNome.value = nome;
    inputCpf.value = cpf;
    inputData.value = dateAdmissao;

    inputNome.focus();


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
  })
</script>