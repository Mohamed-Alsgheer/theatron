<?php
$playsFile = file_get_contents("../database/plays.json");
$plays = json_decode($playsFile, true); 
session_start();
if(isset($_GET['id'])) {
    $playID = $_GET['id'];
    $playMatch = NULL;
    foreach($plays as $play) {
        if(isset($play['id'])) {
            if($play['id'] == $playID) {
                $playMatch = $play;
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="URF-8">
    <link rel="stylesheet" href="../css/styling.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../images/icon.png">
    <title><?php echo $playMatch['title'] ?></title>
</head>
<body style="display: block;">
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
    <main class="all" style="background-image: linear-gradient(to bottom, #000, #cc0404); margin: 0px; padding: 70px 80px;">
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
                    <h2>Price: <span><?php echo $playMatch['price']; ?>$</span></h2>
                </div>
                <div class="det seats">
                    <h2>Remaining Seats:</h2>
                    <span><?php echo $playMatch['seats'] - $playMatch['booked']; ?> seats</span>
                </div>
                <div class="btn-div">
                    <a <?php echo 'href="../backend/cart.php?id=' . $playMatch['id'] . '"' ?> class="bt"><P>Book Now</p></a>
                </div>
            </div>
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
</body>
</html>