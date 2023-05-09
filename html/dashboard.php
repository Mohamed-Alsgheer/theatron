<?php
session_start();
if($_SESSION['user']['role'] != 'vendor') {
	header('Location: ../index.php');
	exit;
}

$playsFile = file_get_contents("../database/plays.json");
$plays = json_decode($playsFile, true); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard</title>
	<link rel="icon" href="../images/icon.png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<link rel="stylesheet" href="../css/dashboard.css">
	<link rel="stylesheet" href="../css/style.css">
	<!-- <link rel="stylesheet" href="css/all.min.css"> -->
</head>

<body>
	<!--navbar-->
	<nav>
		<div>
			<a href="../index.php">
				<img src="../images/logo.png" id="logo">
			</a>
			<form action="../backend/search.php" method="GET" class="searchbar">
				<button style="padding: 5px; background: #cc0404; border-radius: 5px 0px 0px 5px;">
					<img src="../images/loupe.png" alt="" style="width: 20px;">
				</button>
				<input type="search" name="search" style="border-radius: 0px 5px 5px 0px;" required>
			</form>
		</div>
		<div>
			<ul id="menuitems">
				<li><a href="../index.php">Home</a></li>
				<li><a href="./aboutus.php">About</a></li>
				<li><a href="./FAQ.php">FAQ</a></li>
				<li><a href="profile.php">Profile</a></li>
				<li><a href="../backend/logout.php">LogOut</a></li>
			</ul>
			<div>
				<a href="./cart.php">
					<img src="../images/cinema.png" id="cart" />
					<?php 
                    if(isset($_SESSION['user'])) {
                        if(isset($_SESSION['totalTickets'])) {
                            echo '<span id="qty" style="min-width: 18px;">' . $_SESSION['totalTickets'] . '</span>';
                        } else {
                            echo '<span id="qty" style="min-width: 18px;">0</span>';
                        }
                    }
                ?>
				</a>
				<img src="../images/menu.png" id="menu-icon">
			</div>
		</div>
	</nav>
	<aside>
		<h3 style="color: #fff; font-size: 14px; padding: 6px;">APPLICATIONS</h3>
		<ul>
			<li><a href="./dashboard.php"><i class="fa-solid fa-chart-line"></i><span>Dashboard</span></a></li>
			<li><a href="./vendorpl.php"><i class="fa-solid fa-list"></i><span>Theatres List</span></a></li>
			<li><a href="./addPlay.php"><i class="fa-solid fa-masks-theater"></i><span>New Theatre</span></a></li>
		</ul>
	</aside>
	<main>
		<section class="s1">
			<h2>overview</h2>
			<div class="boxes-container">
				<div class="customer-box">
					<h2>Theatres</h2>
					<?php 
					$counter = 0;
					$booking = 0;
					$income = 0;
					foreach($plays as $play) { 
						if($play['vendorID'] == $_SESSION['user']['id']) {
							$counter += 1;
							$booking += $play['booked'];
							$income += $play['booked'] * $play['price'];
						}
					}
					?>
					<p><?php echo $counter; ?></p>
					<div class="iconp"><i class="fa-solid fa-masks-theater"></i></div>
					<a href="./vendorpl.php">See All Details</a>
				</div>
				<div class="customer-box">
					<h2>bookings</h2>
					<p><?php echo $booking; ?></p>
					<div class="iconp"><i class="fa-solid fa-ticket"></i></div>
				</div>
				<div class="customer-box">
					<h2>income</h2>
					<p><?php echo $income; ?>$</p>
					<div class="iconp"><i class="fa-solid fa-coins"></i></div>
				</div>
			</div>
		</section>
		<div class="last">
			<h3 style="font-size: large;">Latest Theatres</h3><a href="./vendorpl.php" class="view-all-button">View All</a>
		</div>
		<br>
		<div style="overflow: overlay;">
			<table>
				<tr>
					<th>Theatre</th>
					<th>Type</th>
					<th>Date</th>
					<th>Seats</th>
					<th>Booked</th>
					<th>Price</th>
					<th colspan="2">Action</th>
				</tr>
				<?php foreach($plays as $play) { 
						if($play['vendorID'] == $_SESSION['user']['id']) {
					?>
					<tr>
						<td><?php echo $play['title']; ?></td>
						<td><?php echo $play['type']; ?></td>
						<td><?php echo $play['date']; ?></td>
						<td><?php echo $play['seats']; ?></td>
						<td><?php echo $play['booked']; ?></td>
						<td><?php echo $play['price']; ?>$</td>
						<td>
							<a href=<?php echo "'./vndr.php?id=" . $play['id'] . "'"; ?> style="margin: 0px 8px;"><i class="fa-solid fa-eye"></i></a>
							<a href=<?php echo "'../backend/deletePlay.php?id=" . $play['id'] . "'"; ?>><i class="fa-solid fa-trash"></i></a>
						</td>
					</tr>
					<?php }} ?>
			</table>
		</div>
	</main>
	<!--footer-->
    <footer>
        <div class="foots-container">
            <div class="foot1" style="align-items: center; width: 15%;">
                <img src="../images/icon.png" alt="" style="height: 100px;">
                <p style="text-align: center; margin: 5px 0px;">Theatre-goers can now purchase tickets directly from our website. We have a vast selection of tickets available for all kinds of theatrical performances.</p>
            </div>
            <div class="foot2">
                <h3>Customer Services</h3>
                <a href="./FAQ.php">FAQ</a>
            </div>
            <div class="foot3">
                <h3>Your Account</h3>
                <a href="./profile.php">Account</a>
                <a href="./policies.php">Policies</a>
            </div>
            <div class="foot4">
                <h3>Shop</h3>
                <div style="margin-bottom: 15px;">
                    <a href="./aboutus.php">About Us</a>
                </div>
            </div>
        </div>
        <div class="copyrights">
            <p style="border-top: 1px solid #fcf7ffcb; padding: 12px 0px; width: 90%;">Theatron &#169; 2023 - All Rights Reserved</p>
        </div>
    </footer>
	<script src="../js/menu.js"></script>
</body>

</html>