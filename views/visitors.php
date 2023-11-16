<?php
    require "../db/db_connect.php";

    session_start();

    if (!isset($_SESSION['visits'])) {
        $_SESSION['visits'] = 1;
    } else {
        $_SESSION['visits']++;
    }

	// Retrieve data from the login_user table
    $loginResult = mysqli_query($conn, "SELECT id, username, login_time FROM login_user");
    $loginData = [];
    while ($loginRow = mysqli_fetch_assoc($loginResult)) {
        $loginData[] = $loginRow;
    }


    $result = mysqli_query($conn, "SELECT * FROM pendataan");
    $pendataan = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $pendataan[] = $row;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitors</title>
    <link rel="stylesheet" href="../css/visitors.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- JS -->
    <script src="../javascript/user.js"></script>
    <!-- Font Awesome Cdn Link -->
    <script src="https://kit.fontawesome.com/2f99c0ee3f.js" crossorigin="anonymous"></script>
</head>
<body>
    	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="logo">
            <img src="../assets/logo/Ryfresh.png" alt="">
			
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="dashboard.php">
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

    <!-- NAVBAR -->
    <section id="content">
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<a href="profile.php" class="profile">
				<img src="../assets/images/ava.jpg">
			</a>
		</nav>
        <!-- NAVBAR -->

        <h1>Visitors Information</h1>
        <section id="visitors">
            <div class="head">
                <div class="date-time">
                    <p><?php echo date ('l, d F Y');?></p>
                    <p><?php date_default_timezone_set('Asia/Makassar');
                        echo date('h:i: sa')?></p>
                </div>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Login Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($loginData as $loginRow) : ?>
                        <tr>
                            <td><?php echo $loginRow['id']; ?></td>
                            <td><?php echo $loginRow['username']; ?></td>
                            <td><?php echo $loginRow['login_time']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </section>
</body>
</html>