<?php include('part/header.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Order</h1><br><br>

        <?php
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $sql = "SELECT * FROM tblorder WHERE id=$id";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
                if($count==1){
                    $row = mysqli_fetch_assoc($res);
                    $product = $row['product'];
                    $price = $row['price'];
                    $qty = $row['qty'];
                    $status = $row['status'];
                    $customer_name = $row['customer_name'];
                    $customer_contact = $row['customer_contact'];
                    $customer_email = $row['customer_email'];
                    $customer_address = $row['customer_address'];
                }else{
                    header('location:'.SITE.'admin/order.php');
                }
            }else{
                header('locatoin:'.SITE.'admin/order.php');
            }
        ?>
        <form action="" method="post">
            <table class="tbl-30">
                <tr>
                    <td>Product Name</td>
                    <td><b><?php echo $product; ?></b></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td><b><?php echo $price; ?>Ks</b></td>
                </tr>
                <tr>
                    <td>Qty</td>
                    <td><input type="number" name="qty" value="<?php echo $qty; ?>" class="tld"></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>
                        <select name="status" class="tld">
                        <option <?php if($status=="Ordered"){echo "selected";} ?> value="Ordered">Ordered</option>
                            <option <?php if($status=="On Delivery"){echo "selected";} ?> value="On Delivery">On Delivery</option>
                            <option <?php if($status=="Delivered"){echo "selected";} ?> value="Delivered">Delivered</option>
                            <option <?php if($status=="Cancelled"){echo "selected";} ?> value="Cancelled">Cancelled</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Customer Name</td>
                    <td>
                        <input type="text" name="customer_name" value="<?php echo $customer_name; ?>" class="tld">
                    </td>
                </tr>
                <tr>
                    <td>Customer Contact</td>
                    <td>
                        <input type="text" name="customer_contact" value="<?php echo $customer_contact; ?>" class="tld">
                    </td>
                </tr>
                <tr>
                    <td>Customer Email</td>
                    <td>
                        <input type="text" name="customer_email" value="<?php echo $customer_email; ?>" class="tld">
                    </td>
                </tr>
                <tr>
                    <td>Customer Address</td>
                    <td>
                        <input type="text" name="customer_address" value="<?php echo $customer_address; ?>" class="tld">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="price" value="<?php echo $price; ?>">
                        <input type="submit" name="submit" value="Update" class="btn btn-primary">
                    </td>
                </tr>
            </table>
        </form>

        <?php
            if(isset($_POST['submit'])){
                $id = $_POST['id'];
                $price = $_POST['price'];
                $qty = $_POST['qty'];
                $total = $price * $qty;
                $status = $_POST['status'];
                $customer_name = $_POST['customer_name'];
                $customer_contact = $_POST['customer_contact'];
                $customer_email = $_POST['customer_email'];
                $customer_address = $_POST['customer_address'];

                $sql2 = "UPDATE tblorder SET
                        qty = $qty,
                        total = '$total',
                        status = '$status',
                        customer_name = '$customer_name',
                        customer_contact = '$customer_contact',
                        customer_email = '$customer_email',
                        customer_address = '$customer_address'
                        WHERE id=$id";

                $res2 = mysqli_query($conn, $sql2);
                if($res2==true){
                    $_SESSION['update'] = "<div class='success'>Order Updated.</div>";
                    header('location:'.SITE.'admin/order.php');
                }else{
                    $_SESSION['update'] = "<div class='error'>Order Updated.</div>";
                    header('location:'.SITE.'admin/order.php');
                }
            }
        ?>
    </div>
</div>

<?php include('part/footer.php'); ?>