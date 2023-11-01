<?php include('part/header.php'); ?>

<?php
    if(isset($_SESSION['order'])){
        echo $_SESSION['order'];
        unset($_SESSION['order']);
    }
    if(isset($_SESSION['login'])){
        echo $_SESSION['login'];
        unset($_SESSION['login']);
    }
    if(isset($_SESSION['register'])){
        echo $_SESSION['register'];
        unset($_SESSION['register']);
    }
?>

  <!-- Main Banner Start -->
  <section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Fashion</h2>

        <?php
            $sql = "SELECT * FROM category WHERE active='Yes'";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
            if($count>0){
                while($row=mysqli_fetch_assoc($res)){
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    ?>
                    <a href="<?php echo SITE; ?>products.php?category_id=<?php echo $id; ?>">
                    <div class="box-3 float-container">
                    <?php
                        if($image_name==""){
                            echo "<div class='error'>Image not Avaliable</div>";
                        }else{
                            ?>
                            <img src="<?php echo SITE; ?>image/category/<?php echo $image_name; ?>" alt="Men" class="img-responsive img-curve">
                            <?php
                        }
                    ?>
                    <h3 class="float-text text-white"><?php echo $title; ?></h3>
                </div>
            </a>
            <?php
                }
            }else{
                echo "<div class='error'>Category not Added.</div>";
            }
        ?>
            
        
        <div class="clearfix"></div>
    </div>
  </section>
  <!-- Main Banner End -->

  <!-- Menu Section Start -->
  <section class="menu">
    <div class="container">
        <h2 class="text-center">All Fashion</h2>
        <div>

        <?php
            $sql2 = "SELECT * FROM product WHERE active='Yes' LIMIT 6";
            $res2 = mysqli_query($conn, $sql2);
            $count2 = mysqli_num_rows($res2);
            if($count2>0){
                while($row=mysqli_fetch_assoc($res2)){
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $image_name = $row['image_name'];
                    ?>
                    <div class="menu-box">
                        <div class="menu-img">
                            <?php
                                if($image_name==""){
                                    echo "<div class='erro'>Image Not Avaliable.</div>";
                                }else{
                                    ?>
                                    <img src="<?php echo SITE; ?>image/product/<?php echo $image_name; ?>" alt="Men Fashion" class="img-responsive img-curve">
                                    <?php
                                }
                            ?>
                        </div>

                        <div class="menu-desc">
                            <h4><?php echo $title; ?></h4>
                            <p class="price"><?php echo $price; ?>Ks</p>
                            <br>

                            <a href="<?php echo SITE; ?>order.php?product_id=<?php echo $id; ?>" class="btn btn-primary">Purchase Now</a>
                        </div>
                    </div>
                    <?php
                }
            }else{
                echo "<div class='error'>Products are not avaliable.</div>";
            }
        ?>
          

          <div class="clearfix"></div>

        </div>
    </div>

    <p class="text-center">
        <a href="products.php">See All Foods</a>
    </p>
  </section>
  <!-- Menu Section End -->

<?php include('part/subscribe.php'); ?>

<?php include('part/footer.php'); ?>