<?php
require "../db/db_connect.php";

function getProducts($conn) {
    $result = mysqli_query($conn, "SELECT * FROM pendataan");
    $pendataan = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $pendataan[] = $row;
    }
    return $pendataan;
}

$pendataan = getProducts($conn);

if(isset($_POST['add_to_cart'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $quantity = $_POST['quantity'];

    $select_cart = mysqli_query($conn, "SELECT * FROM cart WHERE name = '$name'");

    if(mysqli_num_rows($select_cart) > 0){
        $message[] = 'product already added to cart';
    }else{
        $insert = mysqli_query($conn, "INSERT INTO cart (name, price, image, quantity)
        VALUES('$name', '$price', '$image', '$quantity')");
        $message[] = 'product added to cart successfully';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/products.css">
    <title>Products</title>
</head>
<body>
    <?php 
        @include "navbar.php";
    ?>

    <section class="products-item" >
    <?php foreach ($pendataan as $data) : ?>
    <div class="box">
        <div class="pro-item">
            <img src="../assets/img/<?php echo $data['image']; ?>" alt="<?php echo $data['name']; ?>">
            <div class="icon">
                <a href=" "><img src="../assets/icons/love.png" alt=""></a>
                <form method="post" action="">
                    <input type="hidden" name="product_id" value="<?php echo $data['id']; ?>">
                    <input type="hidden" name="name_<?php echo $data['id']; ?>" value="<?php echo $data['name']; ?>">
                    <input type="hidden" name="price_<?php echo $data['id']; ?>" value="<?php echo $data['price']; ?>">
                    <input type="hidden" name="image_<?php echo $data['id']; ?>" value="<?php echo $data['image']; ?>">
                    <input type="number" name="quantity_<?php echo $data['id']; ?>" value="1" min="1">
                    <button class="cart-btn" type="submit" name="add_to_cart_<?php echo $data['id']; ?>">Add to cart</button>
                </form>
                <a href="detail_products.php?id=<?php echo $data['id']; ?>" class="details-button"><img src="../assets/icons/see.png" alt=""></a>
            </div>
            <div class="content">
                <p><h3><?php echo $data['name']; ?></h3></p>
                <p><?php echo $data['price']; ?> <span>IDR</span></p>
            </div>
        </div>
    </div>  
    <?php endforeach; ?>
    </section>
    </div>
</body>
</html>