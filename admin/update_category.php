<?php include('part/header.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Products</h1><br><br>

        <?php
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $sql = "SELECT * FROM category WHERE id=$id";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);

                if($count==1){
                    $row = mysqli_fetch_assoc($res);
                    $title = $row['title'];
                    $current_image = $row['image_name'];
                    $active = $row['active'];
                }else{
                    $_SESSION['no-category'] = "<div class='error'>Category not found.</div>";
                    header('location:'.SITE.'admin/insert.php');
                }
            }else{
                header('location:'.SITE.'admin/insert.php');
            }
        ?>

        <form action="" method="post" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title :</td>
                    <td><input type="text" name="title" value="<?php echo $title; ?>"></td>
                </tr>
                <tr>
                    <td>Current Image:</td>
                    <td>
                        <?php
                            if($current_image != ""){
                        ?>
                            <img src="<?php echo SITE; ?>image/category/<?php echo $current_image;?>" wdith="80px" height="100px">
                        <?php
                            }else{
                                echo "<div class='error'>Image Not Add.</div>";
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>New Image :</td>
                    <td><input type="file" name="image" class="tld"></td>
                </tr>
                <tr>
                    <td>Active</td>
                    <td>
                        <input <?php if($active=="Yes"){echo "checked";} ?> type="radio" name="active" value="Yes"> Yes
                        <input <?php if($active=="No"){echo "checked";} ?> type="radio" name="active" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update" class="btn-info">
                    </td>
                </tr>
            </table>
        </form>
        <?php
            if(isset($_POST['submit'])){
                $title = $_POST['title'];
                $id = $_POST['id'];
                $current_image = $_POST['current_image'];
                $active = $_POST['active'];

                if(isset($_FILES['image']['name'])){
                    $image_name = $_FILES['image']['name'];

                    if($image_name != ""){
                        $ext = end(explode('.',$image_name));
                        $image_name = "Fashion_Cloth_" .rand(000,999).'.'.$ext;
                        $sur = $_FILES['image']['tmp_name'];
                        $des = "../image/category/".$image_name;
                        $upd = move_uploaded_file($sur, $des);

                        if($upd == false){
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload Image.</div>";
                            header('location:'.SITE.'admin/insert_category.php');
                            die();
                        }

                        if($current_image != ""){
                            $path = "../image/category/".$current_image;
                            $remove = unlink($path);

                            if($remove==false){
                                $_SESSION['Failed-remove'] = "<div class='error'>Failed Remove Current Image.</div>";
                                header('location:'.SITE.'admin/insert.php');
                                die();
                            }
                        }
                    }else{
                        $image_name = $current_image;
                    }
                }else{
                    $image_name = $current_image;
                }
                $sql2 = "UPDATE category SET
                    title = '$title',
                    image_name = '$image_name',
                    active = '$active'
                    WHERE id=$id";
                
                $res2 = mysqli_query($conn, $sql2);

                if($res2==true){
                    $_SESSION['update'] = "<div class='success'>Product updated successfully.</div>";
                    header('location:'.SITE.'admin/insert.php');
                }else{
                    $_SESSION['update'] = "<div class='error'>Failed to update Product!</div>";
                    header('location:'.SITE.'admin/insert.php');
                }
            }
        ?>
    </div>
</div>

<?php include('part/footer.php'); ?>