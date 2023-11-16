<?php
require "../db/db_connect.php";

if (isset($_POST['add-product'])) {
    $image = $_FILES['image']['name'];
    $category = $_POST['category'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $date_of_entry = $_POST['date_of_entry'];
    $expired = $_POST['expired'];
    $stock = $_POST['stock'];
    $description = $_POST['description'];

    if (!is_numeric($price) || $price <= 0 || !is_numeric($stock) || $stock < 0 || strpos($price, '.') !== false || strpos($stock, '.') !== false) {
        echo "
            <script>
                alert('Whoops! Invalid input. Please enter a valid positive integer for price and stock.');
                document.location.href = 'add.php';
            </script>";
        exit;
    }

    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    $x = explode('.', $image);
    $ekstensi = strtolower(end($x));

    if (!in_array($ekstensi, $allowedExtensions) || !getimagesize($_FILES['image']['tmp_name'])) {
        echo "
            <script>
                alert('Whoops! Your input is incorrect. Please enter a valid image file.');
                document.location.href = 'add.php';
            </script>";
        exit;
    }

    if (strtotime($expired) <= strtotime($date_of_entry)) {
        echo "
            <script>
                alert('Whoops! The expiration date must be later than the date of entry.');
                document.location.href = 'add.php';
            </script>";
        exit;
    }

    date_default_timezone_set('Asia/Makassar');
    $date = date("Y-m-d_H-i-s_");
    $img = "$date$name.$ekstensi";
    $tmp = $_FILES['image']['tmp_name'];

    if (move_uploaded_file($tmp, "../assets/img/" . $img)) {
        $result = mysqli_query($conn, "INSERT INTO pendataan VALUES ('', '$category', '$name', '$price', '$date_of_entry', '$expired', '$stock', '$description', '$img')");

        if ($result) {
            echo "
            <script>
                alert('Data successfully added!');
                document.location.href = 'dashboard.php';
            </script>";
        } else {
            echo "
            <script>
                alert('Failed to add data!');
                document.location.href = 'dashboard.php';
            </script>";
        }
    } else {
        echo "
            <script>
                alert('Failed Upload Picture!');
                document.location.href = 'dashboard.php';
            </script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Page</title>
    <link rel="stylesheet" href="../css/admin_crud.css">
</head>
<body>
    <section class="crud-data">
        <div class="crud-form-container">
            <form action="" method="post" class="crud-product-form" enctype="multipart/form-data">
                <h2>Add a New Products</h2><hr><br>
                <label for="name">Name of Product</label>
                <input type="text" name="name" class="box" placeholder="Enter the product name">
                <label for="category">Category</label>
                <select name="category" id="gro-categories">
                    <option value="" disabled selected>Choose the category</option>
                    <option value="fruits">Fruits</option>
                    <option value="vegetables">Vegetables</option>
                    <option value="meats">Meats</option>
                    <option value="seafoods">Seafoods</option>
                </select>
                <label for="price">Price</label>
                <input type="text" name="price" class="box" placeholder="Enter the product price">
                <label for="date_of_entry">Date of Entry</label>
                <input type="datetime-local" name="date_of_entry" class="box" placeholder="Enter the product date entry">
                <label for="expired">Expired</label>
                <input type="datetime-local" name="expired" class="box" placeholder="Enter the product expired">
                <label for="stock">Stock</label>
                <input type="number" name="stock" class="box" placeholder="Enter the product stock">
                <label for="description">Description</label>
                <input type="text" name="description" class="box" placeholder="Enter the product description">
                <label for="image">Image</label>
                <input type="file" name="image" readonly value="<?php echo $pendataan['img'] ?>" class="box">
                <input type="submit" name="add-product" value="Add The Product" class="crud-btn">
            </form>
        </div>
    </section>
</body>
</html>