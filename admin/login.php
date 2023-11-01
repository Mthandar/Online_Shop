<?php include('../connect.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Login</title>
   <link rel="stylesheet" href="css/adminstyle.css">
</head>
<body>
   <div class="login">
      <h1 class="text-center" style="color: red;">Login</h1><br><br>

      <?php
         if(isset($_SESSION['login'])){
            echo $_SESSION['login'];
            unset($_SESSION['login']);
         }
      ?><br>
      <form action="" method="post" class="text-center">
         Username:<input type="text" name="username" placeholder="Enter username" class="tld"><br><br>
         Email   :<input type="email" name="email" placeholder="Enter Email" class="tld"><br><br>
         Password:<input type="password" name="password" placeholder="Enter Password" class="tld"><br><br>
         <input type="submit" name="submit" value="Login" class="btn-info">
      </form>
   </div>
</body>
</html>

<?php
   if(isset($_POST['submit'])){
      $username = $_POST['username'];
      $email = $_POST['email'];
      $password = md5($_POST['password']);
      $sql = "SELECT * FROM tbladmin WHERE username='$username' AND password='$password'";
      $res = mysqli_query($conn, $sql);
      $count = mysqli_num_rows($res);
      if($count==1){
         $_SESSION['login'] = "<div class='success'>Login Successfully.</div>";
         $_SESSION['user'] = $username;
         header('location:'.SITE.'admin/');
      }else{
         $_SESSION['login'] = "<div class='error'>Username or Password not matched.</div>";
         header('location:'.SITE.'admin/login.php');
      }
   }
?>