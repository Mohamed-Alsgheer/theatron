<?php 
    session_start();
    if(isset($_SESSION['user'])) {
        header('Location: ./profile.php');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Theatron - Account</title>
    <link rel="icon" href="../assets/images/icon.png">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/account.css">
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
    <div id="account-body">
        <!--account-page-->
        <div class="form-container" id="form-account">
            <div class="form-btn">
                <span onclick="register()">Register</span>|
                <span onclick="login()">Login</span>
                <hr id="Indicator">
            </div>
            <!--login form-->
            <form action="../controllers/login.php" method="POST" id="LoginForm">
                <input type="text" name="email" placeholder="Email" id="email2" required>
                <?php
                    if(isSet($userNotFound)) echo '<p class="error-msg active">This email is not found.</p>';
                ?>
                <input type="password" name="password" placeholder="Password" id="pass2" required>
                <?php
                    if(isSet($invalidPassword)) echo '<p class="error-msg active">Invalid password.</p>';
                ?>
                <input type="submit" class="btn22" id="logbtn" name="login" value="Sign in">
            </form>
            <!--register form-->
            <form action="../controllers/register.php" method="POST" id="RegForm">
                <input type="text" name="username" placeholder="Username" id="username" required>
                <p class="error-msg">This value may contain only letters, numbers and @/./+/-/_ characters.</p>
                <input type="email" name="email" placeholder="Email" id="emailInput" required>
                <?php
                    if(isset($emailExist)) echo '<p class="error-msg active" id="exist-email">This email is already exist.</p>';
                ?>
                <input type="password" name="password" placeholder="Enter your password" id="pass" required>
                <p class="error-msg">Password must contain at least 8 characters.</p>
                <input type="password" name="confirmPassword" placeholder="Re-enter your password" id="confirm-pass" required>
                <p class="error-msg">Confirm password does not match.</p>
                <p style="font-weight: bold; text-align: left; width: 90%; margin: 0px;">Role</p>
                <div id="role" style="display: flex; align-items: center;">
                    <div style="display: flex; align-items: center; width: 50%;">
                        <input type="radio" name="role" value="user" id="user">
                        <label for="user">User</label>
                    </div>
                    <div style="display: flex; align-items: center; width: 50%;">
                        <input type="radio" name="role" value="vendor" id="vendor">
                        <label for="vendor">Vendor</label>
                    </div>
                </div>
                <input type="submit" name="register" class="btn22" id="regbtn" value="Sign up">
            </form>
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
    <script src="../assets/js/account.js"></script>
</body>
</html>