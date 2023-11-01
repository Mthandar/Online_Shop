<?php
    session_start();
    
    define('SITE', 'http://127.0.0.1/clothing_online_shop/');

    $conn = mysqli_connect('localhost', 'root', '', 'momiji') or die(mysqli_error());
?>