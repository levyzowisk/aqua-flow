<div class="modal fade" id="modalCadastrar" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Cadastrar Meta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Funcionario</label>
                        <select class="form-select" aria-label="Default select example">
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mes de Referência</label>
                        <input type="date" name="mesRef" required class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Meta</label>
                        <input type="number" name="meta" required class="form-control">
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