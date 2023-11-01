<?php include('part/header.php'); ?>
    <div class="container">
      <form action="" method="post" class="form-control">
          <h1>Register</h1>
          <div class="col-md-6">
            <label for="username" class="form-label">Name</label>
            <input type="text" id="username" name="username" class="form-control" placeholder="Enter Your Name">
          </div>
          <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="Example@sample.com">
          </div>
          <div class="col-md-6">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Enter Your Password">
          </div>
          <div class="col-md-6">
            <label for="number" class="form-label">Phone Number</label>
            <input type="text" id="number" name="phonenumber" class="form-control" placeholder="Enter Your Phone Number">
          </div>
          <div>
            <input type="submit" name="submit" class="btn btn-primary">
          </div>
      </form>
    </div>

    <?php
    error_reporting(1);
      $username = $_POST['username'];
      $email = $_POST['email'];
      $password = md5($_POST['password']);
      $phonenumber = $_POST['phonenumber'];
        if(isset($_POST['submit'])){
          $sql = "SELECT email FROM tbluser WHERE email='$email'";
          $res = mysqli_query($conn, $sql);
          $count = mysqli_num_rows($res);
          if($count==1){
            echo "<div class='error'>$email already exist.</div>";
          }else{
            $sql2 = "INSERT INTO tbluser VALUES('', '$username', '$email', '$password', '$phonenumber')";
            $res2 = mysqli_query($conn, $sql2);
            header('location:'.SITE);
          }
        }
    ?>


<?php include('part/footer.php'); ?>