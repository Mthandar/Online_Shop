<?php include('part/header.php'); ?>

<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql1 = "SELECT * FROM product WHERE id=$id";
        $res1 = mysqli_query($conn, $sql1);
        $row1 = mysqli_fetch_assoc($res1);
        $title = $row1['title'];
        $price = $row1['price'];
        $current_image = $row1['image_name'];
        $current_category = $row1['category_id'];
        $active = $row1['active'];

    }else{
        header('location:'.SITE.'admin/product.php');
    }
?>
<div class="main-content">
    <div class="wrappeer">
        <h1>Update Product</h1><br>

        <form action="" method="post" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title</td>
                    <td>
                        <input type="text" name="title" placeholder="Title" value="<?php echo $title; ?>" class="tld">
                    </td>
                </tr>
                <tr>
                    <td>Current Image</td>
                    <td>
                        <?php
                            if($current_image==""){
                                echo "<div class='error'>Image Not Avaliable.</div>";
                            }else{
                                ?>
                                <img src="<?php echo SITE; ?>image/product/<?php echo $current_image; ?>"
                                width='75px' heigth='100px'>
                                <?php
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Select New Image</td>
                    <td>
                        <input type="file" name="image" class="tld">
                    </td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td>
                        <input type="text" name="price" placeholder="Price" value="<?php echo $price; ?>" class="tld">Ks
                    </td>
                </tr>
                <tr>
                    <td>Category</td>
                    <td>
                        <select name="category" class="tld">
                            <?php
                                $sql = "SELECT * FROM category WHERE active='Yes'";
                                $res = mysqli_query($conn, $sql);
                                $count = mysqli_num_rows($res);
                                if($count>0){
                                    while($row = mysqli_fetch_assoc($res)){
                                        $category_title = $row['title'];
                                        $category_id = $row['id'];
                                        ?>
                                        <option <?php if($current_category==$current_image){echo "selected"; } ?> value="<?php echo $category_id;?>"><?php echo $category_title; ?></option>
                                        <?php
                                        
                                    }
                                }else{
                                    echo "<option value='0'>Category Not Avalivable</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Active</td>
                    <td>
                        <input <?php if($active=="Yes"){echo "checked";}?> type="radio" name="active" value="Yes">Yes
                        <input <?php if($active=="No"){echo "checked";}?> type="radio" name="active" value="No">No
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="submit" name="submit" value="Update Product" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

        <?php
            if(isset($_POST['submit'])){
                $id = $_POST['id'];
                $title = $_POST['title'];
                $price = $_POST['price'];
                $current_image = $_POST['current_image'];
                $category = $_POST['category'];
                $active = $_POST['active'];
                if(isset($_FILES['image']['name'])){
                    $image_name = $_FILES['image']['name'];
                    if($image_name!=""){
                        $ext = end(explode('.',$image_name));
                        $image_name = "Fashion_Prod_".rand(000,999).'.'.$ext;
                        $path = $_FILES['image']['tmp_name'];
                        $des = "../image/product/".$image_name;
                        $upd = move_uploaded_file($path, $des);
                        if($upd==false){
                            $_SESSION['upload'] = "<div class='error'>Failed to upload.</div>";
                            header('location:'.SITE.'admin/product.php');
                            die();
                        }
                        if($current_image!=""){
                            $remove_path = "../image/product/".$current_image;
                            $remove = unlink($remove_path);
                            if($remove==false){
                                $_SESSION['remove-fail'] = "<div class='error'>Failed to remove image.</div>";
                                header('location'.SITE.'admin/product.php');
                                die();
                            }
                        }
                    }else{
                        $image_name = $current_image;
                    }
                }else{
                    $image_name = $current_image;
                }
                $sql3 = "UPDATE product SET
                            title = '$title',
                            price = $price,
                            image_name = '$image_name',
                            category_id = '$category',
                            active = '$active'
                            WHERE id=$id";
                    $res3 = mysqli_query($conn, $sql3);
                    if($res3==true){
                        $_SESSION['update'] = "<div class='success'>Product Upload Successfully.</div>";
                        header('location:'.SITE.'admin/product.php');
                    }else{
                        $_SESSION['update'] = "<div class='error'>Failed to upload Product.</div>";
                        header('location:'.SITE.'admin/product.php');
                    }
            }
        ?>
    </div>
</div>
<?php include('part/footer.php'); ?>