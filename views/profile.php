<?php 
    session_start();
    if(!isset($_SESSION['user'])) {
        header('Location: ./account.php');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Theatron - Profile</title>
    <link rel="icon" href="../assets/images/icon.png">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/profile.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
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
    <!--profile-page-->
    <div class="user-page">
        <div class="user-details">
            <div>
                <div>
                    <h4>Username:</h4>
                    <?php
                        echo '<p>' . $_SESSION['user']['username'] . '</p>'
                    ?>
                    
                </div>
            </div>
            <div>
                <div>
                    <h4>Email:</h4>
                    <?php
                        echo '<p>' . $_SESSION['user']['email'] . '</p>'
                    ?>
                </div>
            </div>
            <div>
                <div>
                    <h4>Password:</h4>
                    <p>********</p>
                </div>
            </div>
        </div>
        <div>
            <h4 style="margin-bottom: 10px;">Tickets:</h4>
            <?php
            $bookingsFile = file_get_contents("../database/bookings.json");
            $bookings = json_decode($bookingsFile, true); 

            foreach($bookings as $booking) {
                if(isset($booking['userID']) && $booking['userID'] == $_SESSION['user']['id']) {
                    foreach($booking['cart'] as $item) {
            ?>
            <div class="ticket-container">
                <h3>Ticket ID: <?php echo $item['id'] ?></h3>
                <div>
                    <p>Theatrical: <?php echo $item['title'] ?></p>
                    <p>Date: <?php echo $item['date'] ?></p>
                </div>
            </div>
            <?php
                    }
                }
            }
            ?>
        </div>
    </div>
    <!--footer-->
    <footer style="margin-top: 250px;">
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
    <script src="../assets/js/profile.js"></script>
</body>
</html>