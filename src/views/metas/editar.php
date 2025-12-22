<div class="modal fade" id="modalEditar" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Editar Meta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form id="formMetaUp" method="post">
                    <div class="mb-3">
                        <label class="form-label">Funcionario</label>
                        <select name="" disabled class="form-select" id="selectFunUp">
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mes de Referência</label>
                        <input type="date" name="mesRef" readonly id="mesRef" required class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Meta (R$)</label>
                        <input type="number" id="valor" step="0.05" name="meta" required class="form-control">
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

  modalEditar.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;
    const formMetaUp = document.getElementById("formMetaUp");
    
    const nome = button.getAttribute('data-funcionario');
    const data = button.getAttribute('data-mes');
    const valor = button.getAttribute('data-valor');
    const id = button.getAttribute('data-id');
    formMetaUp.action = "./models/actions/metas/update.php?id=" + id
    
    const inpuNome = modalEditar.querySelector('.modal-body #selectFunUp');
    const inputData = modalEditar.querySelector('.modal-body #mesRef');
    const inputValor = modalEditar.querySelector('.modal-body #valor');

    const novaOpcao = document.createElement('option');
    novaOpcao.textContent = nome;
    novaOpcao.hidden = true;
    novaOpcao.selected = true;
    inpuNome.appendChild(novaOpcao);
    console.log(novaOpcao);
    inputData.value = data;
    inputValor.value = valor;
    

  })
</script>