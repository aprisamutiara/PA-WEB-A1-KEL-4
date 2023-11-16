<?php
    require "../db/db_connect.php";
    $id = $_GET['id'];
    $result = mysqli_query($conn, "DELETE FROM pendataan WHERE id = $id");
    $pendataan = [];

    if ($result) {
        echo "
        <script>
            alert('Data successfully deleted!');
            document.location.href = 'dashboard.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Failed to delete data!');
            document.location.href = 'dashboard.php';
        </script>";
    }
?>