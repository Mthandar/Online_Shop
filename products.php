<?php include('part/header.php'); ?>

<div class="container">
    <h2 class="text-center inner-content">Products</h2>
    <img src="text/images/mtt1.jpg" alt="products-image" class="aimg">
</div>
    <div class="container">
        <h3 style="text-align: center; padding: 20px 0 0 0; border-top: 3px dotted #eee;">Check out our products</h3>
    </div>
        <div class="container">
            <div class="row">
                <div class="row" id="men">

                    <?php
                        $sql = "SELECT * FROM product WHERE active='Yes' AND category_id='8'";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);
                        if($count>0){
                            while($row=mysqli_fetch_assoc($res)){
                                $id = $row['id'];
                                $title = $row['title'];
                                $price = $row['price'];
                                $image_name = $row['image_name'];
                                ?>
                                <div class="col-lg-4">
                                    <div class="item">
                                        <div class="thumb">
                                            <?php
                                                if($image_name==""){
                                                    echo "<div class='error'>Image Not Found.</div>";
                                                }else{
                                                    ?>
                                                    <img src="<?php echo SITE; ?>image/product/<?php echo $image_name; ?>" alt="fashion" class="img-responsive img-curve">
                                                    <?php
                                                }
                                            ?>
                                        </div>
                                        <div class="down-content">
                                            <h4><?php echo $title; ?></h4>
                                            <span><?php echo $price; ?>Ks</span>
                                            <button class="btn btn-outline-info">
                                                <a href="<?php echo SITE; ?>order.php?product_id=<?php echo $id; ?>" style="text-decoration: none;">Purchase</a>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }else{
                            echo "<div class='error'>Product Not Found.</div>";
                        }
                    ?>
                    

                    <div class="row" id="men">
                        <?php
                            $sql = "SELECT * FROM product WHERE active='Yes' AND category_id='9'";
                            $res = mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($res);
                            if($count>0){
                                while($row=mysqli_fetch_assoc($res)){
                                    $id = $row['id'];
                                    $title = $row['title'];
                                    $price = $row['price'];
                                    $image_name = $row['image_name'];
                                    ?>
                                    <div class="col-lg-4">
                                        <div class="item">
                                            <div class="thumb">
                                                <?php
                                                    if($image_name==""){
                                                        echo "<div class='error'>Image Not Found.</div>";
                                                    }else{
                                                        ?>
                                                        <img src="<?php echo SITE; ?>image/product/<?php echo $image_name; ?>" alt="fashion" class="img-responsive img-curve">
                                                        <?php
                                                    }
                                                ?>
                                            </div>
                                            <div class="down-content">
                                                <h4><?php echo $title; ?></h4>
                                                <span><?php echo $price; ?>Ks</span>
                                                <button class="btn btn-outline-info">
                                                    <a href="<?php echo SITE; ?>order.php?product_id=<?php echo $id; ?>" style="text-decoration: none;">Purchase</a>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }else{
                                echo "<div class='error'>Product Not Found.</div>";
                            }
                        ?>

                    <div class="row" id="men">

                    <?php
                        $sql = "SELECT * FROM product WHERE active='Yes' AND category_id='10'";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);
                        if($count>0){
                            while($row=mysqli_fetch_assoc($res)){
                                $id = $row['id'];
                                $title = $row['title'];
                                $price = $row['price'];
                                $image_name = $row['image_name'];
                                ?>
                                <div class="col-lg-4">
                                    <div class="item">
                                        <div class="thumb">
                                            <?php
                                                if($image_name==""){
                                                    echo "<div class='error'>Image Not Found.</div>";
                                                }else{
                                                    ?>
                                                    <img src="<?php echo SITE; ?>image/product/<?php echo $image_name; ?>" alt="fashion" class="img-responsive img-curve">
                                                    <?php
                                                }
                                            ?>
                                        </div>
                                        <div class="down-content">
                                            <h4><?php echo $title; ?></h4>
                                            <span><?php echo $price; ?>Ks</span>
                                            <button class="btn btn-outline-info">
                                                <a href="<?php echo SITE; ?>order.php?product_id=<?php echo $id; ?>" style="text-decoration: none;">Purchase</a>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }else{
                            echo "<div class='error'>Product Not Found.</div>";
                        }
                    ?>

                    <div class="row" id="men">

                    <?php
                        $sql = "SELECT * FROM product WHERE active='Yes' AND category_id='11'";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);
                        if($count>0){
                            while($row=mysqli_fetch_assoc($res)){
                                $id = $row['id'];
                                $title = $row['title'];
                                $price = $row['price'];
                                $image_name = $row['image_name'];
                                ?>
                                <div class="col-lg-4">
                                    <div class="item">
                                        <div class="thumb">
                                            <?php
                                                if($image_name==""){
                                                    echo "<div class='error'>Image Not Found.</div>";
                                                }else{
                                                    ?>
                                                    <img src="<?php echo SITE; ?>image/product/<?php echo $image_name; ?>" alt="fashion" class="img-responsive img-curve">
                                                    <?php
                                                }
                                            ?>
                                        </div>
                                        <div class="down-content">
                                            <h4><?php echo $title; ?></h4>
                                            <span><?php echo $price; ?>Ks</span>
                                            <button class="btn btn-outline-info">
                                                <a href="<?php echo SITE; ?>order.php?product_id=<?php echo $id; ?>" style="text-decoration: none;">Purchase</a>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }else{
                            echo "<div class='error'>Product Not Found.</div>";
                        }
                    ?>

            </div>
        </div>

<?php include('part/subscribe.php'); ?>

<?php include('part/footer.php');?>