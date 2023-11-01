<?php include('part/header.php'); ?>

<div class="main-content">
            <div class="wrapper">
                <h1>Add Category</h1><br>

                <?php
                    if(isset($_SESSION['add'])){
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }
                    if(isset($_SESSION['upload'])){
                        echo $_SESSION['upload'];
                        unset($_SESSION['upload']);
                    }
                ?>
                <br>
                <form action="" method="post" enctype="multipart/form-data">
                    <table class="tbl-30">
                        <tr>
                            <td>Title :</td>
                            <td><input type="text" name="title" placeholder="Title" class="tld"></td>
                        </tr>
                        <tr>
                            <td>Select Image :</td>
                            <td><input type="file" name="image"></td>
                        </tr>
                        <tr>
                            <td>Active :</td>
                            <td>
                                <input type="radio" name="active" value="Yes">Yes
                                <input type="radio" name="active" value="No">No
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" name="submit" value="Add Category" class="btn-info">
                            </td>
                        </tr>
                    </table>
                </form>

                <?php
                    if(isset($_POST['submit'])){
                        $title = $_POST['title'];
                        if(isset($_POST['active'])){
                            $active = $_POST['active'];
                        }else{
                            $active = "No";
                        }
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
                            }

                        }else{
                            $image_name = "";
                        }

                        $sql = "INSERT INTO category SET 
                            title='$title',
                            image_name='$image_name', 
                            active='$active'
                        ";
                        $res = mysqli_query($conn, $sql);

                        if($res==TRUE){
                            $_SESSION['add'] = "<div class='success'>Product Added Successfully.</div>";
                            header('location:' .SITE.'admin/insert.php');
                        }else{
                            $_SESSION['add'] = "<div class='error'>Product Added Successfully.</div>";
                            header('location:' .SITE.'admin/insert_category.php');
                        }
                    }
                ?>

            </div>
        </div>

<?php include('part/footer.php'); ?>