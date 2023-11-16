<?php
require "../db/db_connect.php";
$id = $_GET['id'];
$get = mysqli_query($conn, "SELECT * FROM pendataan WHERE id = $id");
$pendataan = [];

while ($row = mysqli_fetch_assoc($get)) {
    $pendataan[] = $row;
}
$pendataan = $pendataan[0];

if (isset($_POST['ubah'])) {
    $category = $_POST['category'];
    $name = $_POST['name'];

    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_INT);
    $stock = filter_input(INPUT_POST, 'stock', FILTER_VALIDATE_INT);

    if ($price === false || $price < 0) {
        echo "
            <script>
                alert('Whoops! Price should be a non-negative integer.');
                document.location.href = 'edit.php';
            </script>";
        exit;
    }

    if ($stock === false || $stock < 0) {
        echo "
            <script>
                alert('Whoops! Stock should be a non-negative integer.');
                document.location.href = 'edit.php';
            </script>";
        exit;
    }

    $date_of_entry = $_POST['date_of_entry'];
    $expired = $_POST['expired'];

    if (strtotime($expired) <= strtotime($date_of_entry)) {
        echo "
            <script>
                alert('Whoops! The expiration date should be later than the date of entry.');
                document.location.href = 'edit.php';
            </script>";
        exit;
    }

    $description = $_POST['description'];
    date_default_timezone_set('Asia/Makassar');
    $date = date("Y-m-d_H-i-s_");
    $imageOld = $pendataan['image'];
    $x = explode('.', $_FILES['image']['name']);
    $ekstensi = strtolower(end($x));
    $img = "$date$name.$ekstensi";
    $tmp = $_FILES['image']['tmp_name'];

    $allowedExtensions = ['jpg', 'jpeg', 'png'];
    if (!in_array($ekstensi, $allowedExtensions)) {
        echo "
            <script>
                alert('Whoops! Your input is incorrect. Please enter a valid image file.');
                document.location.href = 'edit.php';
            </script>";
        exit;
    }

    if (move_uploaded_file($tmp, "../assets/img/".$img)) {
        if (!empty($imageOld) && file_exists("../assets/img/" . $imageOld)) {
            unlink("../assets/img/" . $imageOld); 
        }       
        $result = mysqli_query($conn, "UPDATE pendataan SET image='$img', category='$category', name='$name', price='$price', date_of_entry='$date_of_entry', expired='$expired', stock='$stock', description='$description'  WHERE id = $id");

        if ($result) {
            echo "
            <script>
                alert('Data successfully updated!');
                document.location.href = 'dashboard.php';
            </script>";
        } else {
            echo "
            <script>
                alert('Failed to update data!');
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
    <title>Edit Data</title>
    <link rel="stylesheet" href="../css/admin_crud.css">
</head>
<body>
    <section class="crud-data">
        <div class="crud-form-container">
            <form action="" method="post" class="crud-product-form" enctype="multipart/form-data">
            <h2>Edit Data</h2><hr><br>
                <label for="genre">Name of Product</label>
                <input type="text" name="name" value="<?php echo $pendataan['name'] ?>" class="box">
                <label for="category">Category</label>
                <select name="category" id="gro-categories" value="<?php echo $pendataan['category'] ?>">
                    <option value="" disabled selected>Choose the category</option>
                    <option value="fruits">Fruits</option>
                    <option value="vegetables">Vegetables</option>
                    <option value="meats">Meats</option>
                    <option value="seafoods">Seafoods</option>
                </select>
                <label for="price">Price</label>
                <input type="number" name="price" value="<?php echo $pendataan['price'] ?>" class="box">
                <label for="date_of_entry">Date of Entry</label>
                <input type="datetime-local" name="date_of_entry" value="<?php echo $pendataan['date_of_entry'] ?>" class="box">
                <label for="expired">Expired</label>
                <input type="datetime-local" name="expired" value="<?php echo $pendataan['expired'] ?>" class="box">
                <label for="stock">Stock</label>
                <input type="number" name="stock" value="<?php echo $pendataan['stock'] ?>" class="box">
                <label for="description">Description</label>
                <input type="text" name="description" value="<?php echo $pendataan['description'] ?>" class="box">
                <label for="image">Image</label>
                <input type="file" name="image" readonly value="<?php echo $pendataan['image'] ?>" class="box">
                <input type="submit" name="ubah" value="Edit Data" class="crud-btn">
            </form>
        </div>
    </section>
</body>
</html>
