<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AquaFlow Navigation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
   <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    
</head>
<body class="bg-light overflow-hidden"> <div class="d-flex min-vh-100">
                <?php 
                $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
                // var_dump($url);
            ?>

        <div class="collapse collapse-horizontal show bg-dark text-white" id="sidebarMenu">
            
            <div style="width: 260px;" class="d-flex flex-column h-100 p-3">
                
                <div class="d-flex align-items-center mb-4 text-decoration-none text-white">
                    <i class="fas fa-tint text-info fs-4 me-2"></i>
                    <span class="fs-4 fw-bold">AquaFlow</span>
                </div>

                <ul class="nav nav-pills flex-column mb-auto">
                    
                    <li class="nav-item mb-2">
                        <small class="text-secondary text-uppercase fw-bold ps-3" style="font-size: 0.75rem;">Módulos</small>
                    </li>

                    <li class="nav-item">
                        <a href="dashboard.php" class="nav-link  d-flex align-items-center mb-1 <?php echo $url === '/aqua-flow/src/dashboard.php' ? 'active text-white' : 'text-white-50';  ?>">
                            <i class="fas fa-home me-3 text-center" style="width: 20px;"></i> 
                            Dashboard
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="usuarios.php" class="nav-link d-flex  align-items-center mb-1 <?php echo $url === '/aqua-flow/src/usuarios.php' ? 'active text-white' : 'text-white-50';  ?>">
                            <i class="fas fa-users me-3 text-center" style="width: 20px;"></i> 
                            Usuários
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="funcionarios.php" class="nav-link  d-flex align-items-center mb-1 hover-light <?php echo $url === '/aqua-flow/src/funcionarios.php' ? 'active text-white' : 'text-white-50';  ?>">
                            <i class="fas fa-user-tie me-3 text-center" style="width: 20px;"></i> 
                            Funcionários
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="produtos.php" class="nav-link  d-flex align-items-center mb-1 <?php echo $url === '/aqua-flow/src/produtos.php' ? 'active text-white' : 'text-white-50';  ?>">
                            <i class="fas fa-box-open me-3 text-center" style="width: 20px;"></i> 
                            Produtos
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="metas.php" class="nav-link  d-flex align-items-center mb-1 <?php echo $url === '/aqua-flow/src/metas.php' ? 'active text-white' : 'text-white-50';  ?>">
                            <i class="fas fa-bullseye me-3 text-center" style="width: 20px;"></i> 
                            Metas
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="vendas.php" class="nav-link  d-flex align-items-center mb-1 <?php echo $url === '/aqua-flow/src/vendas.php' ? 'active text-white' : 'text-white-50';  ?>">
                            <i class="fas fa-shopping-cart me-3 text-center" style="width: 20px;"></i> 
                            Vendas
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="flex-grow-1 d-flex flex-column min-vh-100 overflow-auto">
            
            <nav class="navbar navbar-expand bg-white shadow-sm border-bottom px-3 py-3">
                <div class="container-fluid">
                    
                    <button class="btn btn-outline-secondary border-0 me-3" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-expanded="true" aria-controls="sidebarMenu">
                        <i class="fas fa-bars fa-lg"></i>
                    </button>



                    <div class="ms-auto d-flex align-items-center">
                        <a href="../src/models/actions/autenticacao/logout.php" class="btn btn-sm btn-outline-danger d-flex align-items-center gap-2">
                            <i class="fas fa-sign-out-alt"></i> Sair
                        </a>
                    </div>
                </div>
            </nav>

            <div class="container-fluid p-4">

