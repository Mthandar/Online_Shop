<?php include("part/header.php"); ?>

        <div class="main-content">
            <div class="wrapper">
                <h1>Add Product</h1>
                <br><br>
                <?php
                    if(isset($_SESSION['upload'])){
                        echo $_SESSION['upload'];
                        unset($_SESSION['upload']);
                    }
                ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <table class="tbl-30">
                        <tr>
                            <td>Title</td>
                            <td>
                                <input type="text" name="title" placeholder="Title" class="tld">
                            </td>
                        </tr>
                        <tr>
                            <td>Image</td>
                            <td>
                                <input type="file" name="image">
                            </td>
                        </tr>
                        <tr>
                            <td>Price</td>
                            <td>
                                <input type="text" name="price" placeholder="Price" class="tld">Ks
                            </td>
                        </tr>
                        <tr>
                            <td>Products</td>
                            <td>
                                <select name="product" class="tld">
                                    <?php
                                        $sql = "SELECT * FROM category WHERE active='Yes'";
                                        $res = mysqli_query($conn, $sql);
                                        $count = mysqli_num_rows($res);

                                        if($count>0){
                                            while($row=mysqli_fetch_assoc($res)){
                                                $id = $row['id'];
                                                $title = $row['title'];
                                                ?>
                                                <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                                                <?php
                                            }
                                        }else{
                                            ?>
                                            <option value="0">No Products Found</option>
                                            <?php
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Active</td>
                            <td>
                                <input type="radio" name="active" value="Yes"> Yes
                                <input type="radio" name="active" value="No"> No
                            </td>
                        </tr><br>
                        <tr>
                            <td colspan="2">
                                <input type="submit" name="submit" value="Add product" class="btn-secondary">
                            </td>
                        </tr>
                    </table>
                </form>

                <?php
                    if(isset($_POST['submit'])){
                        $title = $_POST['title'];
                        $price = $_POST['price'];
                        $category = $_POST['product'];
                        if(isset($_POST['active'])){
                            $active = $_POST['active'];
                        }else{
                            $active = "No";
                        }
                        if(isset($_FILES['image']['name'])){
                            $image_name = $_FILES['image']['name'];
                            
                            if($image_name!=""){
                                $ext = end(explode('.',$image_name));
                                $image_name = "Fashion-Prod-" .rand(000,999).'.'.$ext;
                                $src = $_FILES['image']['tmp_name'];
                                $dst = "../image/product/".$image_name;
                                $upd = move_uploaded_file($src, $dst);

                                if($upd == false){
                                    $_SESSION['upload'] = "<div class='error'>Failed to Upload Image.</div>";
                                    header('location:'.SITE.'admin/addproduct.php');
                                    die();
                                }
                            }

                        }else{
                            $image_name = "";
                        }

                        $sql2 = "INSERT INTO product SET 
                            title='$title',
                            price='$price',
                            image_name='$image_name',
                            category_id = '$category',
                            active='$active'
                        ";
                        $res2 = mysqli_query($conn, $sql2);

                        if($res2==true){
                            $_SESSION['add'] = "<div class='success'>Product Added Successfully.</div>";
                            header('location:' .SITE.'admin/product.php');
                        }else{
                            $_SESSION['add'] = "<div class='error'>Product Added Successfully.</div>";
                            header('location:' .SITE.'admin/product.php');
                        }
                    }
                ?>
            </div>
        </div>
        
<?php include("part/footer.php"); ?>