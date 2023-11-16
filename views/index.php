<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>RyFresh</title>

    <!-- Style -->
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <!-- Navbar -->
    <?php
        include"navbar.php";
    ?>
    <!-- Hero  -->
    <section id="hero">
        <!-- Text Hero -->
        <div class="hero-text">
            <h1>Fresh Flavors, Fresh Moments</h1>
            <h1>RyFresh, Where Every Meal Begins!</h1>
            <a href="#"><button class="about-btn">About Us</button></a>
        </div>
    </section>

    <!-- Categories -->
    <section id="categories">
        <div class="categories-heading">
            <h2 class="title">Our<span>Categories</span></h2>
        </div>

        <div class="box-container">
            <div class="box">
                <div class="content">
                    <a href="products.php #buah"><img src="../assets/images/Fruits.png" alt="brokoli">
                    <h3>Fruits</h3></a>
                </div>
            </div>

            <div class="box">
                <div class="content">
                    <a href="products.php #sayur"><img src="../assets/images/sayur.png" alt="brokoli">
                    <h3>Vegetables</h3></a>
                </div>
            </div>

            <div class="box">
                <div class="content">
                    <img src="../assets/images/Meatmerah.png" alt="brokoli">
                    <h3>Meats</h3>
                </div>
            </div>

            <div class="box">
                <div class="content">
                    <img src="../assets/images/seafoods.png" alt="seafoods">
                    <h3>Seafoods</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- Products -->
    <section class="products">
        <div class="products-heading">
            <h2 class="title">Our<span>Products</span><a href="products.php">view all >></a></h2>
        </div>

        <!-- gambar 1 -->
        <div class="box-container">
            <div class="box">
                <div class="image">
                    <img src="../assets/Vegetables/broccoli-1450274_1280.png" alt="brokoli">
                    <div class="icon">
                        <a href=" "><img src="../assets/icons/wish.png" alt=""></a>
                        <a href="cart.php" class="cart-btn">Add to cart</a>
                    </div>
                </div>
                <div class="content">
                    <h3>Broccoli</h3>
                    <div class="price">20.000 <span>IDR</span></div>
                </div>
            </div>

            <!-- gambar 2 -->
            <div class="box">
                <div class="image">
                    <img src="../assets/Vegetables/terong.png" alt="terong">
                    <div class="icon">
                        <a href=" "><img src="../assets/icons/wish.png" alt=""></a>
                        <a href="cart.php" class="cart-btn">Add to cart</a>
                    </div>
                </div>
                <div class="content">
                    <h3>eggplant</h3>
                    <div class="price">10.000 <span>IDR</span></div>
                </div>
            </div>

            <!-- gambar 3 -->
            <div class="box">
                <div class="image">
                    <img src="../assets/Vegetables/jagung.png" alt="jagung">
                    <div class="icon">
                        <a href=" "><img src="../assets/icons/wish.png" alt=""></a>
                        <a href="cart.php" class="cart-btn">Add to cart</a>
                    </div>
                </div>
                <div class="content">
                    <h3>Corn</h3>
                    <div class="price">15.000 <span>IDR</span></div>
                </div>
            </div>

            <!-- gambar 4 -->
            <div class="box">
                <div class="image">
                    <img src="../assets/Fruits/orange2.png" alt="jeruk">
                    <div class="icon">
                        <a href=" "><img src="../assets/icons/wish.png" alt=""></a>
                        <a href="cart.php" class="cart-btn">Add to cart</a>
                    </div>
                </div>
                <div class="content">
                    <h3>Orange</h3>
                    <div class="price">40.000 <span>IDR</span></div>
                </div>
            </div>

            <!-- gambar 5 -->
            <div class="box">
                <div class="image">
                    <img src="../assets/Fruits/stroberi.png" alt="stroberi">
                    <div class="icon">
                        <a href=" "><img src="../assets/icons/wish.png" alt=""></a>
                        <a href="cart.php" class="cart-btn">Add to cart</a>
                    </div>
                </div>
                <div class="content">
                    <h3>Strawberry</h3>
                    <div class="price">65.000 <span>IDR</span></div>
                </div>
            </div>

            <!-- gambar 6 -->
            <div class="box">
                <div class="image">
                    <img src="../assets/Fruits/avocado2.png" alt="alpukat">
                    <div class="icon">
                        <a href=" "><img src="../assets/icons/wish.png" alt=""></a>
                        <a href="cart.php" class="cart-btn">Add to cart</a>
                    </div>
                </div>
                <div class="content">
                    <h3>Avocado</h3>
                    <div class="price">49.000 <span>IDR</span></div>
                </div>
            </div>

            <!-- gambar 7 -->
            <div class="box">
                <div class="image">
                    <img src="../assets/Meat/beef-steak.png" alt="beef">
                    <div class="icon">
                        <a href=" "><img src="../assets/icons/wish.png" alt=""></a>
                        <a href="cart.php" class="cart-btn">Add to cart</a>
                    </div>
                </div>
                <div class="content">
                    <h3>Beef Steak</h3>
                    <div class="price">135.000 <span>IDR</span></div>
                </div>
            </div>

            <!-- gambar 8 -->
            <div class="box">
                <div class="image">
                    <img src="../assets/Meat/meat.png" alt="meat">
                    <div class="icon">
                        <a href=" "><img src="../assets/icons/wish.png" alt=""></a>
                        <a href="cart.php" class="cart-btn">Add to cart</a>
                    </div>
                </div>
                <div class="content">
                    <h3>Meat</h3>
                    <div class="price">130.000 <span>IDR</span></div>
                </div>
            </div>

            <!-- gambar 9 -->
            <div class="box">
                <div class="image">
                    <img src="../assets/Meat/paha_ayam.png" alt="paha ayam">
                    <div class="icon">
                        <a href=" "><img src="../assets/icons/wish.png" alt=""></a>
                        <a href="cart.php" class="cart-btn">Add to cart</a>
                    </div>
                </div>
                <div class="content">
                    <h3>Chicken leg</h3>
                    <div class="price">50.000 <span>IDR</span></div>
                </div>
            </div>

            <!-- gambar 10 -->
            <div class="box">
                <div class="image">
                    <img src="../assets/Seafood/tuna.png" alt="tuna">
                    <div class="icon">
                        <a href=" "><img src="../assets/icons/wish.png" alt=""></a>
                        <a href="cart.php" class="cart-btn">Add to cart</a>
                    </div>
                </div>
                <div class="content">
                    <h3>Tuna</h3>
                    <div class="price">120.000 <span>IDR</span></div>
                </div>
            </div>

            <!-- gambar 11 -->
            <div class="box">
                <div class="image">
                    <img src="../assets/Seafood/oyster.png" alt="tiram">
                    <div class="icon">
                        <a href=" "><img src="../assets/icons/wish.png" alt=""></a>
                        <a href="cart.php" class="cart-btn">Add to cart</a>
                    </div>
                </div>
                <div class="content">
                    <h3>Oyster</h3>
                    <div class="price">260.000 <span>IDR</span></div>
                </div>
            </div>

            <!-- gambar 12 -->
            <div class="box">
                <div class="image">
                    <img src="../assets/Seafood/Shirmps.png" alt="udang">
                    <div class="icon">
                        <a href=" "><img src="../assets/icons/wish.png" alt=""></a>
                        <a href="cart.php" class="cart-btn">Add to cart</a>
                    </div>
                </div>
                <div class="content">
                    <h3>Shrimps</h3>
                    <div class="price">130.000 <span>IDR</span></div>
                </div>
            </div>

        </div>

    </section>

    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>Extra link</h3>
                <a href="#"><img src="../assets/icons/cart.png" alt="cart" id="cart-btn">Cart</a>
                <a href="#"><img src="../assets/icons/wish.png" alt="wish" id="wish-btn">Wishlist</a>
                <a href="#"><img src="../assets/icons/user.png" alt="user" id="user-btn">Login</a>
                <a href="#"><img src="../assets/icons/regis.png" alt="regis" id="regis-btn">Regis</a>
            </div>

            <div class="box">
                <h3>Contact info</h3>
                <a href="#"><img src="../assets/icons/phone-call.png" alt="wish" id="telp-btn">  +628-123-456</a>
                <a href="#"><img src="../assets/icons/email.png" alt="user" id="email-btn">  Email</a>
            </div>

            <div class="box">
                <h3>Follow us</h3>
                <a href="#"><img src="../assets/icons/instagram.png" alt="instagram" id="ig-btn">@RyFresh</a>
                <a href="#"><img src="../assets/icons/facebook.png" alt="facebook" id="fb-btn">RyFresh</a>
                <a href="#"><img src="../assets/icons/twitter.png" alt="x" id="x-btn">RyFresh</a>
            </div>
        </div>

        <div class="copy-container">
                <h4>copyright by ReFresh 2023</h4>
        </div>
    </section>
</body>
</html>