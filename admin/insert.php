<?php include("part/header.php"); ?>

        <div class="main-content">
            <div class="wrapper">
                <h1>Categories</h1><br><br>

                <?php
                    if(isset($_SESSION['add'])){
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }
                    if(isset($_SESSION['remove'])){
                        echo $_SESSION['remove'];
                        unset($_SESSION['remove']);
                    }
                    if(isset($_SESSION['delete'])){
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }
                    if(isset($_SESSION['no-category'])){
                        echo $_SESSION['no-category'];
                        unset($_SESSION['no-category']);
                    }
                    if(isset($_SESSION['update'])){
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                    if(isset($_SESSION['upload'])){
                        echo $_SESSION['upload'];
                        unset($_SESSION['upload']);
                    }
                    if(isset($_SESSION['Failed-remove'])){
                        echo $_SESSION['Failed-remove'];
                        unset($_SESSION['Failed-remove']);
                    }
                ?>
                <br><br>
                <a href="<?php echo SITE; ?>admin/insert_category.php" class="btn-primary">Add Category</a><br><br>
                <table class="tbl-full">
                    <tr>
                        <th>No.</th>
                        <th>Title</th>
                        <th>Image Name</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                        $sql = "SELECT * FROM category";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);
                        $i=1;
                        if($count>0){
                            while($row = mysqli_fetch_assoc($res)){
                                $id = $row['id'];
                                $title = $row['title'];
                                $image_name = $row['image_name'];
                                $active = $row['active'];
                    ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $title; ?></td>

                                <td>
                                    <?php
                                        if($image_name!=""){
                                    ?>
                                            <img src="<?php echo SITE; ?>image/category/<?php echo $image_name;?>"
                                            width='75px' heigth='100px'>
                                    <?php
                                        }else{
                                            echo "<div class='error'>Image not added.</div>";
                                        }
                                    ?>
                                </td>

                                <td><?php echo $active; ?></td>
                                <td>
                                    <a href="<?php echo SITE;?>admin/update_category.php?id=<?php echo $id; ?>" class="btn-secondary">Update</a>|
                                    <a href="<?php echo SITE; ?>admin/delete_category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete</a>
                                </td>
                            </tr>
                    <?php
                            }
                        }else{
                    ?>
                    <tr>
                        <td colspan="5"><div class="error">No Product Add.</div></td>
                    </tr>
                    <?php
                        }
                    ?>
                </table>
            </div>
        </div>
        
<?php include("part/footer.php"); ?>