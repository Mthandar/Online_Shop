<?php
    session_start();
    include("../connect.php");
    $id = $_GET['id'];
    $sql = "DELETE FROM admintb WHERE id=$id";

    $res = mysqli_query($conn, $sql);

    if($res==TRUE){
        $_SESSION['delete'] = '<div class="success">Admin Deleted Successfully</div>';
        header('location:' .SITE.'admin/admin.php');
    }else{
        $_SESSION['delete'] = '<div class="success">Failed! Try Again!</div>';
        header('location:' .SITE. 'admin/admin.php');
    }
?>