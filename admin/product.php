<?php include("part/header.php"); ?>

        <div class="main-content">
            <div class="wrapper">
                <h1>Products</h1><br><br>

                <?php
                    if(isset($_SESSION['add'])){
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }
                    if(isset($_SESSION['delete'])){
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }
                    if(isset($_SESSION['upload'])){
                        echo $_SESSION['upload'];
                        unset($_SESSION['upload']);
                    }
                    if(isset($_SESSION['unauthorized'])){
                        echo $_SESSION['unauthorized'];
                        unset($_SESSION['unauthorized']);
                    }
                    if(isset($_SESSION['update'])){
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                ?>
                <br><br>
                <a href="<?php echo SITE; ?>admin/addproduct.php" class="btn-primary">Add Products</a><br><br>
                <table class="tbl-full">
                    <tr>
                        <th>No.</th>
                        <th>Title</th>
                        <th>Image Name</th>
                        <th>Price</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                        $sql = "SELECT * FROM product";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);
                        $i = 1;
                        if($count>0){
                            while($row=mysqli_fetch_assoc($res)){
                                $id = $row['id'];
                                $title = $row['title'];
                                $image_name = $row['image_name'];
                                $price = $row['price'];
                                $active = $row['active'];
                                ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $title; ?></td>
                                    <td>
                                        <?php
                                            if($image_name==""){
                                                echo "<div class='error'>Image not Added.</div>";
                                            }else{
                                                ?>
                                                <img src="<?php echo SITE; ?>image/product/<?php echo $image_name;?>"
                                                width='75px' heigth='100px'>
                                                <?php
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $price; ?>Ks</td>

                                    <td><?php echo $active; ?></td>
                                    <td>
                                        <a href="<?php echo SITE;?>admin/update_product.php?id=<?php echo $id; ?>" class="btn-secondary">Update</a>|
                                        <a href="<?php echo SITE; ?>admin/delete_product.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete</a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }else{
                            echo "<tr><td colspan='7' class='error'>Product Not Add Yet.</td></tr>";
                        }
                    ?>
                </table>
            </div>
        </div>
        
<?php include("part/footer.php"); ?>