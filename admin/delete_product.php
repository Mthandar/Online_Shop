<?php
include('../connect.php');
if(isset($_GET['id']) && isset($_GET['image_name'])){
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];
    if($image_name!=""){
        $path = "../image/product/".$image_name;
        $remove = unlink($path);
        if($remove==false){
            $_SESSION['upload'] = "<div class='error'>Failed remove image.</div>";
            header('location:'.SITE.'admin/product.php');
            die();
        }
    }
    $sql = "DELETE FROM product WHERE id=$id";
    $res = mysqli_query($conn, $sql);
    if($res==true){
        $_SESSION['delete'] = "<div class='success'>Product deleted successfully.</div>";
        header('location:'.SITE.'admin/product.php');
    }else{
        $_SESSION['delete'] = "<div class='error'>Product deleted successfully.</div>";
        header('location:'.SITE.'admin/product.php');
    }
}else{
    $_SESSION['unauthorized'] = "<div class='error'>Unauthorized Access</div>";
    header('location:'.SITE.'admin.product.php');
}
?>