<?php 
    include('../connect.php');
    include('login_check.php');
?>

<html>
    <head>
        <title>Admin</title>
        <link rel="stylesheet" href="css/adminstyle.css">
        <link rel = "icon" href = "css/pngtree-maple-leaf-branches-dry-photography-png-image_3299449.jpg" type = "image/x-icon">
    </head>
    <body>
        <div class="menu">
            <div class="wrapper">
                <ul>
                    <li><a href="#">
                            <img src="css/momiji.png" width="200px" height="45px">
                        </a>
                    </li>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="insert.php">Categories</a></li>
                    <li><a href="product.php">Products</a></li>
                    <li><a href="order.php">Order</a></li>
                    <li><a href="admin_feedback.php">Feedback</a></li>
                    <li><a href="admin.php">Admin</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>