<?php
    @include "../db/db_connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cart.css">
    <title>Cart</title>
</head>
<body>
    <div class="container">
        <section class="shop-cart">
            <h1 class="heading">Shopping Cart</h1>

            <table>
                <thead>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Action</th>
                </thead>

                <tbody>
                    <?php
                    $select_cart = mysqli_query($conn, "SELECT * FROM cart");
                    $grand_total = 0;

                    if(mysqli_num_rows($select_cart) > 0){
                        while($fetch_cart = mysqli_fetch_assoc($select_cart)){
                    ?>
                    
                    <tr>
                        <td><img src="../assets/img/<?php echo $fetch_cart['image']; ?>" alt=""></td>
                        <td><?php echo $fetch_cart['name']; ?></td>
                        <td><?php echo number_format($fetch_cart['price']);?> IDR</td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="update_quantity_id" value="<?php echo
                                $fetch_cart['id']; ?>" >
                                <input type="number" name="update_quantity" min="1" value="<?php echo
                                $fetch_cart['quantity']; ?>" >
                                <input type="submit" value="Update" name="upbtn">
                            </form>
                        </td>
                        <td><?php $sub_total = $fetch_cart['price'] * $fetch_cart['quantity']; echo number_format($sub_total); ?> IDR</td>
                        <td><a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" 
                        onclick="return confirm('Remove item from cart?')" class="btn-delete">Remove</a></td>
                    </tr>

                    <?php
                        $grand_total = $grand_total + $sub_total;
                        };
                    };
                    ?>
                    <tr>
                        <td><a href="formpesan1.php" class="option-btn">Continue Shopping</a></td>
                        <td colspan="3">Grand Total</td>
                        <td><?php echo number_format($grand_total); ?> IDR</td>
                        <td><a href="cart.php?delete_all"  onclick="return confirm('Are you sure you want to delete all?');"
                        class="delete-btn">Delete All</a></td>
                    </tr>
                </tbody>
            </table>
        </section>
    </div>
</body>
</html>
