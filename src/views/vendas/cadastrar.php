<div class="modal fade" id="modalUsuario" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Cadastrar Venda</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form action="teste.php"> 
                    <div class="mb-3">
                        <label class="form-label">Funcionario</label>
                        <select class="form-select" required aria-label="Default select example">
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Data de Venda</label>
                        <input type="date" name="data" required  class="form-control">
                    </div>  

                    <div class="mb-3">
                       <label class="form-label">Produtos</label>

                    <div class="d-flex align-items-center mb-2">
                        <span class="me-3">Produto A</span>
                        <input
                        type="number"
                        min="0"
                        class="form-control w-25"
                        name="produtos[1]"
                        placeholder="Qtd"
                        />
                    </div>

                    <div class="d-flex align-items-center mb-2">
                        <span class="me-3">Produto B</span>
                        <input
                        type="number"
                        min="0"
                        class="form-control w-25"
                        name="produtos[2]"
                        placeholder="Qtd"
                        />
                    </div>

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>