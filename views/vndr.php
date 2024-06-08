<?php
session_start();
if($_SESSION['user']['role'] != 'vendor') {
	header('Location: ../index.php');
	exit;
}

$playsFile = file_get_contents("../models/plays.json");
$plays = json_decode($playsFile, true); 

$playMatch = NULL;
if(isset($_GET['id'])) {
	foreach($plays as $play) { 
		if($play['id'] == $_GET['id']) {
			$playMatch = $play;
		}
	}
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/images/icon.png">
    <link rel="stylesheet" href="../assets/css/styling.css" />
    <link rel="stylesheet" href="../assets/css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title>New Theatre</title>
</head>

<body>
    <!--navbar-->
	<nav>
		<div>
			<a href="../index.php">
				<img src="../assets/images/logo.png" id="logo">
			</a>
			<form action="../controllers/search.php" method="GET" class="searchbar">
				<button style="padding: 5px; background: #cc0404; border-radius: 5px 0px 0px 5px;">
					<img src="../assets/images/loupe.png" alt="" style="width: 20px;">
				</button>
				<input type="search" name="search" style="border-radius: 0px 5px 5px 0px;" required>
			</form>
		</div>
		<div>
			<ul id="menuitems">
				<li><a href="../index.php">Home</a></li>
				<li><a href="./aboutus.php">About</a></li>
				<li><a href="./FAQ.php">FAQ</a></li>
				<li><a href="./profile.php">Profile</a></li>
				<li><a href="../controllers/logout.php">LogOut</a></li>
			</ul>
			<div>
				<a href="./cart.php">
					<img src="../assets/images/cinema.png" id="cart" />
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
				<img src="../assets/images/menu.png" id="menu-icon">
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
    <main class="all">
        <div class="photo">
            <img src=<?php echo "'" . $playMatch['image'] . "'"; ?> alt="<?php echo $playMatch['title']; ?>">
        </div>
        <div class="container">
            <div class="boxes">
                <div class="det name">
                    <h2>Play Name:</h2>
                    <span><?php echo $playMatch['title']; ?></span>
                </div>
                <div class="det genre">
                    <h2>Play Genre: <span><?php echo $playMatch['type']; ?></span></h2>
                </div>
                <div class="det description">
                    <h2>Description:</h2>
                    <p><?php echo $playMatch['description']; ?></p>
                </div>
                <div class="det ticket">
                    <h2>Ticket Price: <span><?php echo $playMatch['price']; ?>$</span></h2>
                </div>
                <div class="det seats">
                    <h2>Seats Booked:</h2>
                    <span><?php echo $playMatch['seats']; ?> seats</span>
                </div>
                <div class="det income">
                    <h2>My income till now:</h2>
                    <span><?php echo $playMatch['price'] * $playMatch['booked']; ?>$</span>
                </div>
            </div>
        </div>
    </main>
    <!--footer-->
    <footer>
        <div class="foots-container">
            <div class="foot1" style="align-items: center; width: 15%;">
                <img src="../assets/images/icon.png" alt="" style="height: 100px;">
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
	<script src="../assets/js/menu.js"></script>
</body>
</html>