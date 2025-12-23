<?php 
    require_once './models/utils/auth.php';
    $feedback = null;
    exigirLogin();

    if(isset($_SESSION["feedback"])) {
        $feedback = $_SESSION["feedback"];

        unset($_SESSION["feedback"]);
    }
    
    require_once './models/homeModel.php';
    require_once './views/layouts/header.php';
    require_once './views/home.php';
    require_once './views/layouts/footer.php';


    
?>