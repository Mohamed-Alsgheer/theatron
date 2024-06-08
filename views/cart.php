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
    <title>Theatron - Cart</title>
    <link rel="icon" href="../assets/images/icon.png">
    <link rel="stylesheet" href="../assets/css/cart.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    <div class="cart-body">
        <div class="cart-container">
            <div class="main">
                <h2>Shopping Cart</h2>
                <div class="cart">
                    <?php if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) { ?> 
                        <div class="plays">
                            <?php forEach($_SESSION['cart'] as $item) { ?>
                                <div class="play1">
                                    <img <?php echo "src='" . $item['image'] . "'" ?> width="15%">
                                    <div class="play-info">
                                        <h3 class="play-name"><?php echo $item['title'] ?></h3>
                                        <h4 class="play-price">Ticket Price: <?php echo $item['price'] ?>$</h4>
                                        <p class="play-quantity">Quantity:<input type="number" <?php echo "value='" . $item['tickets'] . "'" ?> name="qty">
                                        <h4 class="play-offer" style="margin-top: 20px;">Total: <?php echo $item['total'] ?></h4>
                                        <a href=<?php echo "'../controllers/cart.php?remove=" . $item['id'] . "'" ?> class="play-remove">
                                            <i class="fa-solid fa-trash-can"></i>
                                            <span class="remove">Remove</span>
                                        </a>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <form action="../controllers/checkout.php" method="POST" class="cart-total">
                            <p><span>Total Cost</span><span><?php echo $_SESSION['totalCost'] ?>$</span></p>
                            <input type="submit" value="Checkout">
                            </form>
                    <?php 
                        } else {
                            echo "<h1>Your cart is empty.";
                        }
                    ?> 
                </div>
            </div>
        </div>
    </div>
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