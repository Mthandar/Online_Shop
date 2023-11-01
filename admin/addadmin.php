<?php include("part/header.php"); ?>

        <div class="main-content">
            <div class="wrapper">
                <h1>Add Admin</h1>
                <br>

                <?php
                    if(isset($_SESSION['add'])){
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }
                ?>

                <form action="" method="post">
                    <table class="tbl-30">
                        <tr>
                            <td>Name</td>
                            <td><input class="tld" type="text" name="name" placeholder="Enter Your Name"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="email" name="email" placeholder="Enter Your Name" class="tld"></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input type="password" name="password" placeholder="Enter Your Password" class="tld"></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" name="submit" value="Add Admin" class="btn-info">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        
<?php include("part/footer.php"); ?>

<?php
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $pass = md5($_POST['password']);
    $email = $_POST['email'];

    $sql = "INSERT INTO tbladmin SET
    username = '$name',
    password = '$pass',
    email = '$email'";

    $res = mysqli_query($conn, $sql) or die(mysqli_error());
    if($res==TRUE){
        $_SESSION['add'] = 'Admin Added Successfully';
        header('location:' .SITE.'admin/admin.php');
    }else{
        $_SESSION['add'] = 'Failed to Add Admin';
        header('location:' .SITE.'admin/addadmin.php');
    }
}
?>
