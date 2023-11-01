<?php include("part/header.php"); ?>

        <div class="main-content">
            <div class="wrapper">
                <h1>Feedback</h1><br><br>
                <?php
                    if(isset($_SESSION['update'])){
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                ?>
                <table class="tbl-full">
                    <tr>
                        <th>No.</th>
                        <th>Username</th>
                        <th>Description</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                        $sql = "SELECT * FROM feedback ORDER BY id DESC";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);
                        $i = 1;
                        if($count>0){
                            while($row=mysqli_fetch_assoc($res)){
                                $id = $row['id'];
                                $name = $row['name'];
                                $email = $row['email'];
                                $description = $row['description'];
                                ?>
                                <tr>
                                    <td><?php echo $i++;?></td>
                                    <td><?php echo $name;?></td>
                                    <td><?php echo $email;?></td>
                                    <td><?php echo $description;?></td>
                                    <td>
                                        <a href="<?php echo SITE; ?>admin/delete_feedback.php?id=<?php echo $id; ?>" class="btn-danger">Delete</a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }else{
                            echo "<tr><td colspan='12'>No Feedback.</td></tr>";
                        }
                    ?>
                    
                </table>
            </div>
        </div>
        
<?php include("part/footer.php"); ?>