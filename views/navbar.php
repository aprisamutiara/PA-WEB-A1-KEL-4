<?php
    @include "../db/db_connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link rel="stylesheet" href="../css/navbar.css">
    
</head>
<body>

    <header class="header">
        
        <img src="../assets/logo/Ryfresh.png" alt="" class="logo">
        
        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="products.php">Shop</a>
            <a href="formpesan.php">Orders</a>
        </nav>

        <div class="icons">
            <a href="#"><img src="../assets/icons/search.png" alt="search" id="search-btn"></a>
            
            <?php
                $select_rows = mysqli_query($conn, "SELECT * FROM cart"); 
                $row_count = mysqli_num_rows($select_rows);
            ?>

            <a href="cart.php"><img src="../assets/icons/cart.png" alt="cart" id="cart-btn"><span><?php echo $row_count ?></span></a>
            <a href="login.php"><img src="../assets/icons/user.png" alt="user" id="user-btn"></a>
        </div>

        <form action="" class="search-form">
            <input type="search" placeholder="search here..." id="search-box">
            <label for="search-box"><img src="../assets/navbar/search.png"></label>
        </form>

    </header>    
<script src="../javascript/script.js"></script>
</body>
</html>