<?php include('part/header.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1><br><br>

        <?php
            $id = $_GET['id'];
            $sql = "SELECT * FROM tbladmin WHERE id=$id";
            $res = mysqli_query($conn, $sql);

            if($res==TRUE){
                $count = mysqli_num_rows($res);
                if($count){
                   $rows = mysqli_fetch_assoc($res);
                   $name = $rows['username'];
                   $pass = $rows['password'];
                }else{
                    header('location:' .SITE.'admin/updateadmin.php');
                }
            }
        ?>
        <form action="" method="post">
            <table class="tbl-30">
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="username" value="<?php echo $name; ?>" class="tld"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" value="<?php echo $pass; ?>" class="tld"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Admin" class="btn-danger">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $name = $_POST['username'];
        $pass = md5($_POST['password']);

        $sql = "UPDATE tbladmin SET
        username = '$name',
        password = '$pass'
        WHERE id='$id'";

        $res = mysqli_query($conn, $sql);

        if($res==TRUE){
            $_SESSION['update'] = "<div class='success'>Admin Updated Successfully.</div>";
            header('location:' .SITE.'admin/admin.php');
        }else{
            $_SESSION['update'] = "<div class='success'>Failed! Try Again!</div>";
        }
    }
?>

<?php include('part/footer.php'); ?>