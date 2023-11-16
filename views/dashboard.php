<?php
    require "../db/db_connect.php";

    session_start();

    if (!isset($_SESSION['visits'])) {
        $_SESSION['visits'] = 1;
    } else {
        $_SESSION['visits']++;
    }

    if (isset($_GET['search'])) {
        $search = mysqli_real_escape_string($conn, $_GET['search']);
        $result = mysqli_query($conn, "SELECT * FROM pendataan WHERE name LIKE '%$search%'");
    } else {
        $result = mysqli_query($conn, "SELECT * FROM pendataan");
    }

    $pendataan = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $pendataan[] = $row;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- CSS -->
	<link rel="stylesheet" href="../css/dashboard.css">
    <!-- JS -->
    <script src="../javascript/user.js"></script>
    <!-- Font Awesome Cdn Link -->
    <script src="https://kit.fontawesome.com/2f99c0ee3f.js" crossorigin="anonymous"></script>

	<title>Ryfresh</title>
</head>
<body>

	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="logo">
            <img src="../assets/logo/Ryfresh.png" alt="">
			
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="#">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="index.php">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">My Store</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Analytics</span>
				</a>
			</li>
			<li>
				<a href="see_contact.php">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Message</span>
				</a>
			</li>
			<li>
				<a href="products.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Products</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="logout.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->

	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="" method="GET">
				<div class="form-input">
					<input type="search" name="search" placeholder="Search..." value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
					<button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
				</div>
			</form>
			<a href="profile.php" class="profile">
				<img src="../assets/images/ava.jpg">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="index.php">Home</a>
						</li>
					</ul>
				</div>
			</div>

			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3>0</h3>
						<p>New Order</p>
					</span>
				</li>
				<li> 
					<a href="visitors.php"><i class='bx bxs-group' ></i></a>
					<span class="text">
						<h3><?php echo $_SESSION['visits']; ?></h3>
						<p>Visitors</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
						<h3>0 IDR</h3>
						<p>Total Sales</p>
					</span>
				</li>
			</ul>

			<div class="table-data">
				<div class="order">
					<div class="head">
                        <div class="date-time">
                            <p><?php echo date ('l, d F Y');?></p>
                            <p><?php date_default_timezone_set('Asia/Makassar');
                                echo date('h:i: sa')?></p>
                        </div>
                        <div class="action-buttons">
							<a href="add_product.php"><button class="add-btn">Add Product</button></a>
                        </div>
					</div>
					<table>
						<thead>
							<tr>
                                <th>ID</th>
                                <th>Images</th>
                                <th>Products Name</th>
                                <th>Prices</th>
                                <th>Categories</th>
                                <th>Stock</th>
                                <th>Description</th>
                                <th>Actions</th>
							</tr>
						</thead>
						<tbody>
                            <?php $i = 1; foreach ($pendataan as $data) :?>
                            <tr>
                                <td><?php echo $data['id']; ?></td>
                                <td><img src="../assets/img/<?php echo $data['image']; ?>" alt=""></td>
                                <td><?php echo $data['name']; ?></td>
                                <td><?php echo $data['price']; ?></td>
                                <td><?php echo $data['category']; ?></td>
                                <td><?php echo $data['stock']; ?></td>
                                <td><?php echo $data['description']; ?></td>
                                <td class="action">
                                    <a href="edit.php?id=<?php echo $data['id']?>"><button class="edit-btn"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" fill="white"><path d="M200-200h56l345-345-56-56-345 345v56Zm572-403L602-771l56-56q23-23 56.5-23t56.5 23l56 56q23 23 24 55.5T829-660l-57 57Zm-58 59L290-120H120v-170l424-424 170 170Zm-141-29-28-28 56 56-28-28Z"/></svg></button></a>
                                    <a href="delete.php?id=<?php echo $data['id']?>"><button class="delete-btn" onclick="return confirm('Yakin ingin menghapus <?php echo $data['name']?>?')"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" fill="white"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg></button></a>
                                </td>
                            </tr>
                            <?php $i++; endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	<script src="../javascript/user.js"></script>
</body>
</html>