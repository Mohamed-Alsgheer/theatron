<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Theatron</title>
	<link rel="icon" href="../assets/images/icon.png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/aboutus.css">
    <link rel="stylesheet" href="css/all.min.css">
</head>
<body>
    <!--navbar-->
    <nav>
        <a href="../index.php">
            <img src="../assets/images/logo.png" id="logo">
        </a>
        <div>
            <ul id="menuitems">
                <li><a href="../index.php">Home</a></li>
                <li><a href="./aboutus.php">About</a></li>
                <li><a href="./FAQ.php">FAQ</a></li>
                <?php if(isset($_SESSION['user'])) { ?>
                <li><a href="./profile.php">Profile</a></li>
                <li><a href="../controllers/logout.php">LogOut</a></li>
                <?php } else { ?>
                <li><a href="./account.php">Account</a></li>
                <?php } ?>
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
    <main>
		<section>
			<h2>About Us</h2>
            <br>
			<p>We are a theater company specialized in providing outstanding theatrical performances for all age groups. Our company started in 2018 and since then, we have been presenting the most innovative and distinctive theatrical shows for all theater lovers.</p>
			<p>Our theater shows are characterized by high quality, creativity and attention to details. We guarantee a unique theatrical experience to our audience, where enjoyable theatrical performance is combined with artistic attention to lighting, decor and every single detail.</p>
			<p>Our team is qualified and specialized in the field of theater, where they possess the necessary experience to present distinctive theatrical shows. We care about the experience of every single customer, and we strive to provide the best always.</p>
			<p>Thank you for visiting our website, and we hope you enjoy your theatrical experience with us.</p>
		</section>
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