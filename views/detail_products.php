<?php
require "../db/db_connect.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    function getDetailproducts($conn, $id) {
        $query = "SELECT * FROM pendataan WHERE id = $id";
        $result = mysqli_query($conn, $query);
        return mysqli_fetch_assoc($result);
    }

    $detail_products = getDetailproducts($conn, $id);
} else {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail products</title>
    <link rel="stylesheet" href="../css/detail.css">
</head>
<body>

    <div class="container">
        <h1><?php echo $detail_products['name']; ?></h1>
        <img src="../assets/img/<?php echo $detail_products['image']; ?>" alt="<?php echo $detail_products['name']; ?>" width="200">
        <p>Category <?php echo $detail_products['category']; ?></p>
        <p>Price <?php echo $detail_products['price']; ?></p>
        <p>Date of Entry <?php echo $detail_products['date_of_entry']; ?></p>
        <p>Expired <?php echo $detail_products['expired']; ?></p>
        <p>Stock <?php echo $detail_products['stock']; ?></p>
        <p>Description <?php echo $detail_products['description']; ?></p>

        <a href="products.php">Back to Prodcuts</a>
    </div>

</body>
</html>
