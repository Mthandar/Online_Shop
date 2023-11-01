<?php include('part/header.php'); ?>

    <div class="container">
        <form action="" method="post"class="form-control justify-content-center">
            <h1>LogIn</h1>
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Example@sample.com">
            </div>
            <div class="col-md-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Enter Your Password">
            </div><br>
            <input type="submit" name="submit" class="btn btn-primary">
        </form>
    </div>

    <?php
        if(isset($_POST['submit'])){
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            if($email=="" || $password==""){
                echo "<div class='error'>Please Fill Your Email or Password</div>";
            }else{
                $sql = "SELECT * FROM tbluser WHERE email='$email' AND password='$password'";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
                if($count>0){
                    $_SESSION['login'] = "<div class='success'>Login Successfully.</div>";
                    $_SESSION['user'] = $username;
                    header('location:'.SITE);
                }else{
                    $_SESSION['login'] = "<div class='error'>Username or Password not matched.</div>";
                    header('location:'.SITE.'login.php');
                }
            }
        }
        ?>
<?php include('part/footer.php'); ?>