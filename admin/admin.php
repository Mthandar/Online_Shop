<?php include("part/header.php"); ?>

        <div class="main-content">
            <div class="wrapper">
                <h1>Admin</h1>
                <br>

                <?php
                    if(isset($_SESSION['add'])){
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }
                    if(isset($_SESSION['delete'])){
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }
                    if(isset($_SESSION['update'])){
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                    if(isset($_SESSION['name'])){
                        echo $_SESSION['name'];
                        unset($_SESSION['name']);
                    }
                ?>
                <br><br>
                <a href="addadmin.php" class="btn-primary">Add Admin</a>
                <br><br><br>
                <table class="tbl-full">
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>

                    <?php
                        $sql = "SELECT * FROM tbladmin";
                        $res = mysqli_query($conn, $sql);
                        
                        if($res==TRUE){
                            $i=1;
                            $count = mysqli_num_rows($res);
                            if($count>0){
                                while($rows=mysqli_fetch_assoc($res)){
                                    $id = $rows['id'];
                                    $name = $rows['username'];
                                    $email = $rows['email'];
                        ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $name; ?></td>
                                        <td><?php echo $email; ?></td>
                                        <td>
                                            <a href="<?php echo SITE; ?>admin/updateadmin.php?id=<?php echo $id; ?>" class="btn-secondary">Update </a>|
                                            <a href="<?php echo SITE; ?>admin/deleteadmin.php?id=<?php echo $id; ?>" class="btn-danger">Delete</a>
                                        </td>
                                    </tr>
                    <?php
                                }
                            }else{
                        }
                        }
                    ?>
                </table>
            </div>
        </div>
        
<?php include("part/footer.php"); ?>
