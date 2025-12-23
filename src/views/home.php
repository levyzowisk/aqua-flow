<?php 
    $countVenda = buscarQuantidadeDeVendas();
    $faturamento = faturamentoDoMes();
    $funcionariosAtivos = buscarQuantidadeDeFuncionariosAtivos();
    $ultimasVendas = buscarUltimasVendas();

    // var_dump($ultimasVendas);
    // exit();
?>

<div class="container-fluid p-4">
        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-dark">Dashboard</h2>
            <span class="text-muted">Visão geral do sistema</span>
        </div>

        <div class="row g-3 mb-4">
            
            <div class="col-12 col-sm-6 col-xl-4">
                <div class="card shadow-sm border-0 border-start border-4 border-primary h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <span class="text-muted small text-uppercase fw-bold">Total de vendas</span>
                                <h3 class="mb-0 fw-bold text-primary"><?= $countVenda["COUNT(*)"] ?></h3>
                            </div>
                            <div class="bg-primary bg-opacity-10 p-3 rounded-circle text-primary">
                                <i class="fas fa-shopping-cart fa-lg"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-4">
                <div class="card shadow-sm border-0 border-start border-4 border-success h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <span class="text-muted small text-uppercase fw-bold">Faturamento Total</span>
                                <h3 class="mb-0 fw-bold text-success"><?= $faturamento["total"] ?> R$</h3>
                            </div>
                            <div class="bg-success bg-opacity-10 p-3 rounded-circle text-success">
                                <i class="fas fa-dollar-sign fa-lg"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-4">
                <div class="card shadow-sm border-0 border-start border-4 border-info h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <span class="text-muted small text-uppercase fw-bold">Funcionários</span>
                                <h3 class="mb-0 fw-bold text-info"><?= $funcionariosAtivos["COUNT(*)"]?></h3>
                            </div>
                            <div class="bg-info bg-opacity-10 p-3 rounded-circle text-info">
                                <i class="fas fa-users fa-lg"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-3">
            
            <div class="col-12"> <div class="card shadow-sm border-0 h-100">
                    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                        <h6 class="m-0 fw-bold text-dark"><i class="fas fa-history me-2 text-secondary"></i>Vendas Recentes</h6>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-4 text-center">ID</th>
                                    <th class="text-center">Vendedor</th>
                                    <th class="text-center">Data</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(count($ultimasVendas) > 0): ?>
                                    <?php foreach($ultimasVendas as $venda): ?>
                                        <tr>
                                            <td class="ps-4 text-center fw-bold"><?= $venda["id"]?></td>
                                            <td class="ps-4 text-center fw-bold"><?= $venda["vendedor"]?></td>
                                            <td class="ps-4 text-center fw-bold"><?= $venda["data_venda"]?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td class="ps-4 fw-bold text-center" colspan="3">Sem registros de vendas!</td>
                                        </tr>
                                    <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

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