<?php 
include_once 'cadastrar.php';
include_once 'editar.php';

?>

<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h3>Gerenciamento de Funcionários</h3>
        <button data-bs-toggle="modal" data-bs-target="#modalFuncionario" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalNovo">
            Novo Funcionário
        </button>
    </div>
    <div class="card-body">
        <table class="table table-striped table-hover w-100">
            <thead>
                <tr>
                    <th class="text-center px-3">ID</th>
                    <th class="text-center px-3">CPF</th>
                    <th class="text-center px-3">Nome</th>
                    <th class="text-center px-3">Admissão</th>
                    <th class="text-center px-3">Demissão</th>
                    <!-- <th class="text-center px-3">Status</th> -->
                    <th class="text-center px-3">Ações</th>
                </tr>
            </thead>
            <tbody>

            <?php if(count($listaDeFuncionarios) > 0): ?>
                <?php foreach ($listaDeFuncionarios as $user): ?>

                <tr>
                    <td class="text-center px-3"><?= $user['id'] ?></td>
                    <td class="text-center pc-3"><?= preg_replace('/(\d{3})\.\d{3}\.\d{3}-(\d{2})/', '$1.***.***-$2', $user['cpf']) ?></td>
                    <td class="text-center px-3"><?= htmlspecialchars($user['nome']) ?></td>
                    <td class="text-center px-3"><?= htmlspecialchars($user['data_contratacao']) ?></td>
                    <?php if($user["data_admissao"] === null): ?>
                    <td class="text-center px-3"><?= "-"?></td>
                        <?php else: ?>
                        <td class="text-center px-3"><?= htmlspecialchars($user['data_admissao'])?></td>
                        <?php endif; ?>

                    <!-- <td class="text-center px-3"><?= htmlspecialchars($user['status']) ?></td> -->
                    <td class="text-center p-3 ">
                        <?php if($user["data_admissao"]): ?>
     
                        <?php else: ?>
                        <button class="btn btn-sm btn-info text-white shadow fw-normal" 
                            data-bs-toggle="modal" 
                            data-bs-target="#modalVerMais"
                            title="Ver detalhes"
                            onclick='carregarDetalhes(<?= $user["id"] ?>)'
                            >
                         + Informações
                        </button>
                        <?php endif; ?>
                        

                        <button type="button" 
                            class="btn btn-sm btn-warning text-white shadow fw-normal" 
                            data-bs-toggle="modal" 
                            data-bs-target="#modalEditarFuncionario"
                            data-cpf="<?= htmlspecialchars($user['cpf']) ?>"
                            data-nome="<?= $user['nome'] ?>"
                            data-dateContratacao="<?= $user["data_contratacao"] ?>"
                            data-id="<?= $user["id"] ?>"
                            >
                            Editar
                        </button>
                        <?php if($user["data_admissao"] === null): ?>
   
                            <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="prepararDemissao(<?= $user['id'] ?>)">
                                Demitir
                            </button>

                        <?php else: ?>

                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalAtivar" onclick="prepararAtivar(<?= $user['id'] ?>)">
                                Ativar
                            </button>
                        <?php endif; ?>
                        
                    </td>
                </tr>
                <?php endforeach; ?>

                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center px-3">Sem dados cadastrados.</td>
                    </tr>

                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php if ($feedback): ?>    
    <script>
        Toastify({
        text: "<?= $feedback["msg"] ?>",
        duration: 3000,
        destination: "https://github.com/apvarun/toastify-js",
        newWindow: true,
        close: true,
        gravity: "top",
        position: "right", 
        stopOnFocus: true, 
        style: {
            background: "linear-gradient(to right, <?= $feedback['cor1'] ?>, <?= $feedback['cor2'] ?>)",  },
        }).showToast();
    </script>

<?php endif; ?> 

<div class="modal fade" id="modalVerMais" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered"> <div class="modal-content border-0 shadow">
      
      <div class="modal-header bg-primary text-white position-relative" style="height: 100px;">
        <h5 class="modal-title">Detalhes do Funcionário</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body pt-0">

        <div class="text-center mt-3 mb-3">
            <h4 class="fw-bold text-dark" id="view_nome">Carregando...</h4> 
            <span class="badge bg-success rounded-pill" id="view_status">...</span>
        </div>

        <div class="row g-2 text-center mb-4">
            <div class="col-6">
                <div class="p-2 border rounded bg-light">
                    <small class="text-muted d-block" style="font-size: 0.75rem;">CPF</small>
                    <span class="fw-bold text-dark" id="view_cpf">...</span>
                </div>
            </div>
            <div class="col-6">
                <div class="p-2 border rounded bg-light">
                    <small class="text-muted d-block" style="font-size: 0.75rem;">Admissão</small>
                    <span class="fw-bold text-dark" id="view_admissao">...</span>
                </div>
            </div>
        </div>

        <div class="card border-0 bg-light mb-4">
            <div class="card-body p-3">
                <div class="d-flex justify-content-between align-items-end mb-1">
                    <div>
                        <small class="text-muted">Total Vendido</small>
                        <h5 class="mb-0 fw-bold text-success" id="view_vendido">R$ 0,00</h5>
                    </div>
                    <div class="text-end">
                        <small class="text-muted">Meta do Mês</small>
                        <h6 class="mb-0 fw-bold text-dark" id="view_meta">R$ 0,00</h6>
                    </div>
                </div>
                
                <!-- <div class="progress mt-2" style="height: 8px;">
                    <div id="view_progress" class="progress-bar bg-success" role="progressbar" style="width: 0%"></div>
                </div> -->
                <!-- <small class="text-muted mt-1 d-block text-center" id="view_porcentagem">0% atingido</small> -->
            </div>
        </div>

        <div>
            <h6 class="text-uppercase text-muted small fw-bold border-bottom pb-2">
                <i class="bi bi-cart3 me-1"></i> Histórico de Vendas (Produtos)
            </h6>
            
            <div style="max-height: 180px; overflow-y: auto;">
                <table class="table table-sm table-hover align-middle mb-0 table-striped">
                    <thead class="table-light sticky-top">
                        <tr>
                            <th scope="col" class="text-start">Produto</th>
                            <th scope="col" class="text-center">Qtd</th>
                            <th scope="col" class="text-end">Total</th>
                        </tr>
                    </thead>
                    <tbody id="lista_produtos">

                    </tbody>
                </table> 
                
            </div>
        </div>

      </div>
      
      <div class="modal-footer border-0 pt-0">
        <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>

</div>

<script>
    async function carregarDetalhes(id) {
        const response = await fetch(`./models/actions/funcionarios/details.php?id=${id}`);
        const dados = await response.json();
        console.log(dados);
        const titleNome = document.getElementById("view_nome");
        console.log(titleNome);
        const status = document.getElementById("view_status");
        const cpf = document.getElementById("view_cpf");
        const dataAdmissao = document.getElementById("view_admissao");
        const totalVendido = document.getElementById("view_vendido");
        const meta = document.getElementById("view_meta");
        const tbody = document.getElementById("lista_produtos");
        tbody.innerHTML = ''

        if(dados.produtos && dados.produtos.length > 0) {
            dados.produtos.forEach(item => {
                let linha = `
                      <tr>
                        <td class="text-stat">${item.produto_nome}</td>
                        <td class="text-center">${item.quantidade}</td>
                        <td class="text-end">${item.total_item}</td>
                     </tr>
                `;
                tbody.innerHTML += linha;
            });
        } else {
            tbody.innerHTML = `
                <tr>
                    <td colspan="3" class = "text-center"> Sem dados.</td>
                </tr>
            `
        }

        
        titleNome.innerText = dados.nome;
        status.innerText = dados.status;
        cpf.innerText = dados.cpf;
        dataAdmissao.innerText = dados.admissao;
        totalVendido.innerText = "R$" + dados.vendido;
        meta.innerText = "R$" + dados.meta



    }

    function prepararDemissao(idFuncionario) {
        const btnConfirmar = document.getElementById('btnConfirmarDemitir');
        
        btnConfirmar.href = "./models/actions/funcionarios/dismiss.php?id=" + idFuncionario;
    }

    function prepararAtivar(idFuncionario) {
        const btnConfirmar = document.getElementById('btnConfirmarAtivar');
        
        btnConfirmar.href = "./models/actions/funcionarios/activate.php?id=" + idFuncionario;
    }

</script>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">    
        <h1 class="modal-title fs-5" id="exampleModalLabel">Demitir Funcionário</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Tem certeza que deseja demitir este Funcionário? </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <a href="#" id="btnConfirmarDemitir" class="btn btn-danger">Sim, Demitir</a>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalAtivar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">    
        <h1 class="modal-title fs-5" id="exampleModalLabel">Ativar Funcionário</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Tem certeza que deseja ativar(admitir) este Funcionário? </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <a href="#" id="btnConfirmarAtivar" class="btn btn-primary">Sim, Admitir</a>
      </div>
    </div>
  </div>
</div>