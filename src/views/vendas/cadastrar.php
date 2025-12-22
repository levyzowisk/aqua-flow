<?php  

    $listaDeFuncionarios =  listarFuncionarioAtivo();

    $listaDeProdutos = listarProdutoComEstoque();

?>
<div class="modal fade" id="modalNovaVenda" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold">Nova Venda</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="../src/models/actions/vendas/insert.php" method="post" id="formVenda">
                <div class="modal-body">
                    
                    <div class="mb-4">
                        <label class="form-label fw-bold text-secondary">Funcionário</label>
                        <select name="id_funcionario" class="form-select" required>
                            <option value="" selected disabled hidden>Selecione o vendedor...</option>
                            <?php foreach ($listaDeFuncionarios as $func): ?>
                                <option value="<?= $func['id'] ?>"><?= $func['nome'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mes de Referência</label>
                        <input type="date" name="mesRef" required class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold text-secondary">Adicionar Produtos</label>
                        <div class="d-flex gap-2">
                            <select id="inputProduto" name="id_produto" class="form-select flex-grow-1" onchange="verificarSelecao()">
                                <option value="" disabled selected>Escolha um produto...</option>
                                <?php foreach ($listaDeProdutos as $prod): ?>
                                    <option value="<?= $prod['id'] ?>" 
                                            data-nome="<?= htmlspecialchars($prod['nome']) ?>"
                                            data-estoque="<?= $prod['estoque'] ?>"
                                            data-preco="<?= $prod['valor'] ?>">
                                        <?= htmlspecialchars($prod['nome']) ?> - R$ <?= number_format($prod['valor'], 2, ',', '.') ?> (<?= $prod['estoque'] ?> disp.)
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            
                            <input type="number" id="inputQtd" class="form-control" style="width: 80px;" placeholder="Qtd" min="1" value="1" disabled>
                            
                            <button type="button" id="btnAdicionar" class="btn btn-primary" onclick="adicionarItem()" disabled>
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card bg-light border-0 rounded-3" style="min-height: 150px;">
                        <div class="card-body p-0 d-flex flex-column justify-content-center">
                            
                            <div id="msgVazio" class="text-center py-4 text-muted">
                                <i class="fas fa-box-open fa-3x mb-3 opacity-25"></i>
                                <p class="mb-0 fw-bold">Nenhum produto adicionado</p>
                            </div>

                            <div id="areaItens" class="d-none w-100">
                                <table class="table table-borderless table-sm mb-0">
                                    <thead class="text-secondary border-bottom">
                                        <tr>
                                            <th class="ps-3">Produto</th>
                                            <th class="text-center">Qtd</th>
                                            <th class="text-end pe-3">Subtotal</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="listaItensBody"></tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-end mt-3">
                        <h5 class="fw-bold">Total: <span id="totalVendaTexto">R$ 0,00</span></h5>
                    </div>

                </div>

                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" id="btnFinalizar" disabled class="btn btn-primary text-white fw-bold">Finalizar Venda</button>
                </div>
            </form>

        </div>
    </div>
</div>

<script>
let totalVenda = 0;

function verificarSelecao() {
    const select = document.getElementById('inputProduto');
    const inputQtd = document.getElementById('inputQtd');
    const btnAdd = document.getElementById('btnAdicionar');

    if (select.value !== "") {
        inputQtd.disabled = false;
        btnAdd.disabled = false;
    } else {
        inputQtd.disabled = true;
        btnAdd.disabled = true;
    }
}

function adicionarItem() {
    const selectProd = document.getElementById('inputProduto');
    const inputQtd = document.getElementById('inputQtd');
    const btnAdd = document.getElementById('btnAdicionar');
    const tbody = document.getElementById('listaItensBody');
    const areaItens = document.getElementById('areaItens');
    const msgVazio = document.getElementById('msgVazio');
    
    const idProd = selectProd.value;
    if (!idProd) { return; }
    const qtd = parseInt(inputQtd.value);
    const option = selectProd.options[selectProd.selectedIndex];
    const nome = option.getAttribute('data-nome');
    const estoque = parseInt(option.getAttribute('data-estoque'));
    const preco = parseFloat(option.getAttribute('data-preco'));

    if (qtd < 1) { alert("Quantidade inválida"); return; }
    if (qtd > estoque) { alert("Estoque insuficiente!"); return; }

    document.getElementById('btnFinalizar').disabled = false;

    msgVazio.classList.add('d-none');
    areaItens.classList.remove('d-none');

    const subtotal = preco * qtd;
    totalVenda += subtotal;
    atualizarTotal();

    const novaLinha = document.createElement('tr');
    novaLinha.innerHTML = `
        <td class="ps-3 align-middle">
            <span class="fw-bold text-dark">${nome}</span>
            <input type="hidden" name="produtos[]" value="${idProd}">
            <input type="hidden" name="qtds[]" value="${qtd}">
        </td>
        <td class="text-center align-middle">${qtd}</td>
        <td class="text-end pe-3 align-middle">R$ ${subtotal.toFixed(2).replace('.', ',')}</td>
        <td class="text-end align-middle">
            <button type="button" class="btn btn-sm text-danger" onclick="removerItem(this, ${subtotal})">
                <i class="fas fa-trash"></i>
            </button>
        </td>
    `;

    tbody.appendChild(novaLinha);

    selectProd.value = "";
    inputQtd.value = 1;
    inputQtd.disabled = true;
    btnAdd.disabled = true;
}

function removerItem(botao, valorSubtotal) {
    botao.closest('tr').remove();
    totalVenda -= valorSubtotal;
    atualizarTotal();

    const tbody = document.getElementById('listaItensBody');
    
    if (tbody.children.length === 0) {
        document.getElementById('areaItens').classList.add('d-none');
        document.getElementById('msgVazio').classList.remove('d-none');
        
        document.getElementById('btnFinalizar').disabled = true;
    }
}

function atualizarTotal() {
    document.getElementById('totalVendaTexto').innerText = 
        totalVenda.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
}
</script>