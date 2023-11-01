<?php
include('../connect.php');
if(isset($_GET['id']) && isset($_GET['image_name'])){
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    if($image_name != ""){
        $path = "../image/category/".$image_name;
        $remove = unlink($path);

        if($remove == false){
            $_SESSION['remove'] = "<div class='error'>Fail Remove Product Image.</div>";
            header('location:'.SITE.'admin/insert.php');
            die();
        }
    }
        $sql = "DELETE FROM category WHERE id=$id";
        $res = mysqli_query($conn, $sql);
        if($res == TRUE){
            $_SESSION['delete'] = "<div class='success'>Product deleted successfully.</div>";
            header('location:'.SITE.'admin/insert.php');
        }else{
            $_SESSION['delete'] = "<div class='error'>Product failed. Try Again!</div>";
            header('location:'.SITE.'admin/insert.php');
        }
}else{
    header('location:'.SITE.'admin/insert.php');
}
?>