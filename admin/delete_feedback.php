<?php
    session_start();
    include("../connect.php");
    $id = $_GET['id'];
    $sql = "DELETE FROM feedback WHERE id=$id";

    $res = mysqli_query($conn, $sql);

    if($res==TRUE){
        $_SESSION['delete'] = '<div class="success">Feedback Successfully</div>';
        header('location:' .SITE.'admin/admin_feedback.php');
    }else{
        $_SESSION['delete'] = '<div class="success">Failed! Try Again!</div>';
        header('location:' .SITE. 'admin/admin_feedback.php');
    }
?>