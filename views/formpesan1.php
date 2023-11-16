<?php
    @include "../db/db_connect.php";

    if(isset($_POST['order-btn'])){
        $order_date = date('Y-m-d H:i:s'); 

        $email = $_POST['email'];
        $name = $_POST['name'];
        $no_phone = $_POST['no_phone'];
        $address = $_POST['address'];
        $address2 = $_POST['address2'];
        $address3 = $_POST['address3'];
        $payment_method = $_POST['payment_method'];

        $cart_query = mysqli_query($conn, "SELECT * FROM cart");
        $product_total = 0; 

        if(mysqli_num_rows($cart_query)>0){
            while($product_item = mysqli_fetch_assoc($cart_query)){
                $product_name[] = $product_item['name'] . '('. $product_item['quantity'] .')';
                $total_price = $product_item['price'] * $product_item['quantity'];
                $product_total += $total_price;
            };
        };

        $total_product = implode (', ', $product_name);
        $detail_query = mysqli_query($conn, "INSERT INTO pesanan
        VALUES ('', '$order_date', '$email', '$name', '$no_phone', '$address', '$address2', '$address3', '$payment_method', '$total_product', '$total_price')")
        or die ('query failed');

        if ($cart_query && $detail_query){
            echo"
            <div class='order-msg'>
                <div class='msg'>
                    <h3>Thank you for shopping!</h3>
                    <div class='order-detail'>
                        <span>".$total_product."</span>
                        <span class='total'> total : $".$total_price." IDR </span>
                    </div>
                    <div class='customer-details'>
                        <p>order date : <span>".$order_date."</span></p>
                        <p>your email : <span>".$email."</span></p>
                        <p>your name : <span>".$name."</span></p>
                        <p>your phone number : <span>".$no_phone."</span></p>
                        <p>your address : <span>".$address.", ".$address2.", ".$address3."</span></p>
                        <p>your payment method : <span>".$payment_method."</span></p>
                    </div>
                    <a href='products.php' class='btn'>continue shopping</a>
                </div>
            </div>
            ";
        };
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/formpesan.css">
    <title>Formulir Pemesanan</title>
</head>
<body>
    <div class="container">
        <section class="checkout-form">
            
            <form action="" method="post">
                
                <h1>Complete your orders</h1>

                <div class="display-order">
                <?php
                    $select_cart = mysqli_query($conn, "SELECT * FROM cart");
                    $total = 0;
                    $grand_total = 0; 
                    if(mysqli_num_rows($select_cart) > 0){
                        while($fetch_cart = mysqli_fetch_assoc($select_cart)){
                        $total_price = $fetch_cart['price'] * $fetch_cart['quantity'];
                        $grand_total = $total += $total_price;
                ?>

                <span><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>

                <?php
                        }
                    }else{
                        echo "<div class='display-order'><span>your cart is empty!</span></div>";
                    }
                ?>
                <span class="grand-total">grand total : <?=$grand_total;?> </span>
            </div>
                
                <div class="flex">
                    <div class="inputBox">
                        <span>Payment method</span> 
                        <select name="payment_method">
                            <option value="" selected>-- Pilih --</option>
                            <option value="DANA">DANA</option>
                            <option value="Rypay">Rypay</option>
                            <option value="GOPAY">GOPAY</option>
                        </select>
                    </div>
                    <input type="hidden" name="order_date" value="<?php echo $order_date; ?>">
                    <div class="inputBox">
                        <span>Email</span> 
                        <input type="email" placeholder="enter your email" name="email" required>
                    </div>
                    <div class="inputBox">
                        <span>Name</span> 
                        <input type="text" placeholder="enter your name" name="name" required>
                    </div>
                    <div class="inputBox">
                        <span>No Phone</span> 
                        <input type="number" placeholder="enter your number" name="no_phone" required>
                    </div>
                    <div class="inputBox">
                        <span>Address 1</span> 
                        <input type="text" placeholder="Provinsi, Kota, Kecamatan, Kode Pos" name="address" required>
                    </div>
                    <div class="inputBox">
                        <span>Address 2</span> 
                        <input type="text" placeholder="Nama Jalan, Gedung, No. Rumah" name="address2" required>
                    </div>
                    <div class="inputBox">
                        <span>Address 3</span> 
                        <input type="text" placeholder="Detail Lainnya (ex: Blok/Unit No., Patokan)" name="address3" required>
                    </div>
                </div>
                <div class="btn-container">
                    <input type="submit" value="order now" name="order-btn" class="btn">
                    <h3>Are you want to go back?<a href="cart.php"> go back</a></h3>
                </div>
            </form>
        </section>
    </div>
    <script src="../javascript/script.js"></script>
</body>
</html>