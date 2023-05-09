<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Theater </title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../css/FAQ.css">
    <link rel="stylesheet" href="../css/style.css">
	<link rel="icon" href="../images/icon.png">
</head>
<body>
    <!--navbar-->
    <nav>
        <a href="../index.php">
            <img src="../images/logo.png" id="logo">
        </a>
        <div>
            <ul id="menuitems">
                <li><a href="../index.php">Home</a></li>
                <li><a href="./aboutus.php">About</a></li>
                <li><a href="./FAQ.php">FAQ</a></li>
                <?php if(isset($_SESSION['user'])) { ?>
                <li><a href="./profile.php">Profile</a></li>
                <li><a href="../backend/logout.php">LogOut</a></li>
                <?php } else { ?>
                <li><a href="./account.php">Account</a></li>
                <?php } ?>
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
    <main>
		<section>
			<h2>Frequently Asked Questions</h2>
			<div class="faq">
				<h3>What are your ticket prices?</h3>
				<p>Ticket prices vary by show. Please check our website for current prices.</p>
			</div>
			<div class="faq">
				<h3>How can I purchase tickets?</h3>
				<p>You can purchase tickets online through our website, or by calling our box office during business hours.</p>
			</div>
			<div class="faq">
				<h3>What is your refund policy?</h3>
				<p>Refunds are not available for tickets once purchased. However, we may be able to exchange your tickets for a different performance of the same show, subject to availability.</p>
			</div>
			<div class="faq">
				<h3>What is your seating policy?</h3>
				<p>Seating is assigned on a first-come, first-served basis. Latecomers will be seated at the discretion of the management.</p>
			</div>
			<div class="faq">
				<h3>Can I bring my own food and drink?</h3>
				<p>No outside food or beverages are allowed in the theater. We have a concession stand with a variety of snacks and drinks available for purchase.</p>
			</div>
		</section>
		<div class="main1" ></div>
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