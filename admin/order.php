<?php include("part/header.php"); ?>

        <div class="main-content">
            <div class="wrapper">
                <h1>Order</h1><br><br>

                <?php
                    if(isset($_SESSION['update'])){
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                ?>
                <table class="tbl-full">
                    <tr>
                        <th>No.</th>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Total</th>
                        <th>Order Date</th>
                        <th>Status</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>

                    <?php
                        $sql = "SELECT * FROM tblorder ORDER BY id DESC";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);
                        $i = 1;
                        if($count>0){
                            while($row=mysqli_fetch_assoc($res)){
                                $id = $row['id'];
                                $product = $row['product'];
                                $price = $row['price'];
                                $qty = $row['qty'];
                                $total = $row['total'];
                                $order_date = $row['order_date'];
                                $status = $row['status'];
                                $customer_name = $row['customer_name'];
                                $customer_contact = $row['customer_contact'];
                                $customer_email = $row['customer_email'];
                                $customer_address = $row['customer_address'];
                                ?>
                                    <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo $product; ?></td>
                                        <td><?php echo $price; ?>Ks</td>
                                        <td><?php echo $qty; ?></td>
                                        <td><?php echo $total; ?></td>
                                        <td><?php echo $order_date; ?></td>
                                        <td>
                                            <?php
                                                if($status=="Ordered"){
                                                    echo "<label style='color:green;'>$status</label>";
                                                }elseif($status=="On Delivery"){
                                                    echo "<label style='color: orange;'>$status</label>";
                                                }elseif($status=="Delivered"){
                                                    echo "<label style='color: darkblue;'>$status</label>";
                                                }elseif($status=="Cancelled"){
                                                    echo "<label style='color:red;'>$status</label>";
                                                }
                                            ?>
                                        </td>
                                        <td><?php echo $customer_name; ?></td>
                                        <td><?php echo $customer_contact; ?></td>
                                        <td><?php echo $customer_email; ?></td>
                                        <td><?php echo $customer_address; ?></td>
                                        <td>
                                            <a href="<?php echo SITE; ?>admin/update_order.php?id=<?php echo $id; ?>" class="btn-secondary">Update </a>
                                        </td>
                                    </tr>
                                <?php
                            }
                        }else{
                            echo "<tr><td colspan='12'>Orders not avaliable.</td></tr>";
                        }
                    ?>
                    
                </table>
            </div>
        </div>
        
<?php include("part/footer.php"); ?>