<?php
    if(!isset($_SESSION['user'])){
        $_SESSION['no-login-message'] = "<div class='error'>Please Login Access.</div>";
        header('location:'.SITE.'admin/login.php');
    }
?>