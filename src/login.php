<?php 
    session_start();
    $feedback = null;

    if(isset($_SESSION["feedback"])) {
        $feedback = $_SESSION["feedback"];

        unset($_SESSION["feedback"]);
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AquaFlow - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
   <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
       
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
   
</head>
<body class="d-flex align-items-center justify-content-center min-vh-100 bg-light-subtle">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-4">
                
                <div class="card border-0 shadow-lg rounded-4 p-4 bg-white">
                    <div class="card-body text-center">
                        
                        <div class="bg-primary bg-gradient text-white rounded-4 d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 65px; height: 65px;">
                            <i class="bi bi-droplet-fill fs-2"></i>
                        </div>
                        
                        <h2 class="fw-bold text-primary mb-0">AquaFlow</h2>
                        <p class="text-secondary small mb-4">Sistema de Gestão Empresarial</p>

                        <form class="text-start" method="post" action="./models/actions/autenticacao/login.php">
                            
                            <div class="mb-3">
                                <label for="usuario" class="form-label fw-semibold text-dark small">Email</label>
                                <input type="text" name="email" class="form-control bg-light border-light-subtle py-2" id="usuario" placeholder="Digite seu email">
                            </div>

                            <div class="mb-4">
                                <label for="senha" class="form-label fw-semibold text-dark small">Senha</label>
                                <div class="input-group">
                                    <input type="password" name="password" class="form-control bg-light border-light-subtle border-end-0 py-2" id="senha" placeholder="Digite sua senha">
                                    <span class="input-group-text bg-light border-light-subtle border-start-0" style="cursor: pointer;">
                                    </span>
                                </div>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary text-white fw-semibold py-2 rounded-3 shadow-sm">Entrar</button>
                            </div>

                        </form>

                        <p class="text-muted opacity-50 small mt-4 mb-0">Digite qualquer usuário e senha para acessar</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

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