<?php
session_start();
if($_SESSION['user']['role'] != 'vendor') {
	header('Location: ./index.php');
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"href="../css/addPlay.css">
    <link rel="stylesheet"href="../css/style.css">
    <link rel="icon" href="../images/icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        img{
            filter: brightness(0)invert(1);
        }
    </style>
    <title>Vendor</title>
</head>
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
    <body>
        <main>
            <form action="../backend/addPlay.php" method="POST" enctype="multipart/form-data" class="container">
                <div class="name-container">
                    <div>
                        <label>the name of play:</label>
                        <input type="text"placeholder="Enter your play name" name="title"class="pl"> 
                    </div>
                    <div>
                        <label>Author's name:</label>
                        <input type="text"placeholder="Enter author's name"name="author name"class="pl"  >
                    </div>
                </div>
                <p class="ty">select type of play:</p>
                <div class="type">
                    <div>
                        <input type="radio" id="rom" name="type" value="romantic">
                        <label for="rom">romantic</label>
                    </div>
                    <div>
                        <input type="radio" id="com" name="type" value="comedy">
                        <label for="com">comedy</label>
                    </div>
                    <div>
                        <input type="radio"id="tra" name="type"  value="Tragedy">
                        <label for="tra">tragedy</label>
                    </div>
                </div>
                <label>play date</label>
                <input type="date"class="date" name="date">
                <br>
                <label for="img">Upload photo</label>
                <input type="file" id="img" name="img">
                <br>
                <div class="num name-container">
                    <span>
                        <p>Add number of seats:</p>
                        <input type="number" class="seats" name="seats" min="0" max="1000"placeholder="Seats">
                    </span>
                    <span>
                        <p>Add price of ticket:</p> 
                        <input type="number" name="price" class="pri"min="0"max="10000" placeholder="Add price">
                    </span>
                </div>
                <br>
                <p>Describe your play:</p>
                <textarea name="desc" cols="55" rows="10"placeholder="Add description"class="tex"></textarea>
                <br>
                <div style="display: flex; justify-content: center;">
                    <input type="submit" class="addd" value="Add play" style="border: 0px;" />
                </div>
                <br>
                
            </form>
        </main>
    </body>
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
</html>