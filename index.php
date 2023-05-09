<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Theatron</title>
    <link rel="icon" href="/images/icon.png">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/imgSlider.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!--navbar-->
    <nav>
        <a href="./index.php">
            <img src="/images/logo.png" id="logo">
        </a>
        <div>
            <ul id="menuitems">
                <li><a href="./index.php">Home</a></li>
                <li><a href="/html/aboutus.php">About</a></li>
                <li><a href="/html/FAQ.php">FAQ</a></li>
                <?php if(isset($_SESSION['user'])) { ?>
                <li><a href="/html/profile.php">Profile</a></li>
                <li><a href="/backend/logout.php">LogOut</a></li>
                <?php } else { ?>
                <li><a href="/html/account.php">Account</a></li>
                <?php } ?>
            </ul>
            <div>
            <a href="/html/cart.php">
                <img src="/images/cinema.png" id="cart" />
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
                <img src="/images/menu.png" id="menu-icon">
            </div>
        </div>
    </nav>
    <div id="home-body">
        <!--Images slider-->
        <div class="slider-container">
            <div class="img-slider">
                <img src="/images/images_slider/Oedipus-Rex-Fimonoi-Athens-III.jpg">
            </div>
            <div class="img-slider">
                <img src="/images/images_slider/share-twitter2.jpg">
            </div>
            <div class="img-slider">
                <img src="/images/images_slider/POTO_1600x1000_Website-Mast-Head-1600x1000.jpg">
            </div>
            <div class="slide-controls" style="top: 50%;">
                <span class="indicators">
                    <div id="prev">
                        <i style="color: #fff; mix-blend-mode: difference;" class="fa-solid fa-angle-left"></i>
                    </div>
                    <div id="next">
                        <i style="color: #fff; mix-blend-mode: difference;" class="fa-solid fa-angle-right"></i>
                    </div>
                </span>
            </div>
            <div class="slide-controls">
                <span id="indicators" class="indicators" style="justify-content: center;"></span>
            </div>
        </div>
        <!--Most booked-->
        <div>
            <div class="title-div" style="display: flex; justify-content: space-between; align-items: center;">
                <h2>Most Booked</h2>
                <a href="/html/genre.php" class="more">
                    <p class="show">Show more</p>
                    <i class="fa-solid fa-angle-right" style="color: #807373;"></i>
                </a>
            </div>
            <div class="card-container">
                <a href="/html/detailsPage.php?id=13" class="play-card">
                    <img src="/images/plays_img/Phantom_of_the_Opera.jpg" alt="Hamlet">
                    <p>Phantom of the Opera</p>
                    
                </a>
                <a href="/html/detailsPage.php?id=10" class="play-card">
                    <img src="/images/plays_img/Hamilton.png" alt="Hamilton">
                    <p>Hamilton</p>
                </a>
                <a href="/html/detailsPage.php?id=9" class="play-card">
                    <img src="/images/plays_img/Raisin_In_The_Sun.jpg" alt="Hamlet">
                    <p>A Raisin in the Sun</p>
                </a>
                <a href="/html/detailsPage.php?id=12" class="play-card">
                    <img src="/images/plays_img/The_Crucible.jpg" alt="The_Crucible">
                    <p>The Crucible</p>
                </a>
            </div>
            <!--Drama-->
            <div class="title-div" style="display: flex; justify-content: space-between; align-items: center;">
                <h2>Drama Theatre</h2>
                <a href="/images/genre.php?type=Drama" class="more">
                    <p class="show">Show more</p>
                    <i class="fa-solid fa-angle-right" style="color: #807373;"></i>
                </a>
            </div>
            <div class="card-container">
                <a href="/html/detailsPage.php?id=7" class="play-card">
                    <img src="/images/plays_img/Death_of_a_Salesman.jpg" alt="Death_of_a_Salesman">
                    <p>Death of a Salesman</p>
                    
                </a>
                <a href="/html/detailsPage.php?id=11" class="play-card">
                    <img src="/images/plays_img/Romeo_and_Juliet.jpg" alt="Romeo_and_Juliet">
                    <p>Romeo and Juliet</p>
                </a>
                <a href="/html/detailsPage.php?id=12" class="play-card">
                    <img src="/images/plays_img/The_Crucible.jpg" alt="The_Crucible">
                    <p>The Crucible</p>
                </a>
                <a href="/html/detailsPage.php?id=5" class="play-card">
                    <img src="/images/plays_img/Les_Miserables.jpg" alt="Les_Miserables">
                    <p>Les Miserables</p>
                </a>
            </div>
            <!--Comedy-->
            <div class="title-div" style="display: flex; justify-content: space-between; align-items: center;">
                <h2>Comedy Theatre</h2>
                <a href="/images/genre.php?type=Comedy" class="more">
                    <p class="show">Show more</p>
                    <i class="fa-solid fa-angle-right" style="color: #807373;"></i>
                </a>
            </div>
            <div class="card-container">
                <a href="/html/detailsPage.php?id=8" class="play-card">
                    <img src="/images/plays_img/The_Glass_Menagerie.jpg" alt="The_Glass_Menagerie">
                    <p>The Glass Menagerie</p>
                    
                </a>
                <a href="/html/detailsPage.php?id=10" class="play-card">
                    <img src="/images/plays_img/Hamilton.png" alt="Hamilton">
                    <p>Hamilton</p>
                </a>
                <a href="/html/detailsPage.php?id=13" class="play-card">
                    <img src="/images/plays_img/Phantom_of_the_Opera.jpg" alt="Phantom_of_the_Opera">
                    <p>Phantom of the Opera</p>
                </a>
                <a href="/html/detailsPage.php?id=14" class="play-card">
                    <img src="/images/plays_img/A_Midsummer_Night's_Dream.jpg" alt="A_Midsummer_Night's_Dream">
                    <p>A Midsummer Night's Dream</p>
                </a>
            </div>
            <!--Musical-->
            <div class="title-div" style="display: flex; justify-content: space-between; align-items: center;">
                <h2>Musical Theatre</h2>
                <a href="/images/genre.php?type=Musical" class="more">
                    <p class="show">Show more</p>
                    <i class="fa-solid fa-angle-right" style="color: #807373;"></i>
                </a>
            </div>
            <div class="card-container">
                <a href="/html/detailsPage.php?id=3" class="play-card">
                    <img src="/images/plays_img/The_Importance_of_Being_Earnest.jpg" alt="The_Importance_of_Being_Earnest">
                    <p>The Importance of Being Earnest</p>
                </a>
                <a href="/html/detailsPage.php?id=6" class="play-card">
                    <img src="/images/plays_img/The_Cherry_Orchard.jpg" alt="The_Cherry_Orchard">
                    <p>The Cherry Orchard</p>
                </a>
                <a href="/html/detailsPage.php?id=123" class="play-card">
                    <img src="/images/plays_img/Oedipus_Rex.png" alt="Oedipus_Rex">
                    <p>Oedipus Rex</p>
                </a>
                <a href="/html/detailsPage.php?id=2" class="play-card">
                    <img src="/images/plays_img/Hamlet.jpg" alt="Hamlet">
                    <p>Hamlet</p>
                </a>
            </div>
        </div>
    </div>
    <!--footer-->
    <footer>
        <div class="foots-container">
            <div class="foot1" style="align-items: center; width: 15%;">
                <img src="/images/icon.png" alt="" style="height: 100px;">
                <p style="text-align: center; margin: 5px 0px;">Theatre-goers can now purchase tickets directly from our website. We have a vast selection of tickets available for all kinds of theatrical performances.</p>
            </div>
            <div class="foot2">
                <h3>Customer Services</h3>
                <a href="/images/FAQ.php">FAQ</a>
            </div>
            <div class="foot3">
                <h3>Your Account</h3>
                <a href="/images/profile.php">Account</a>
                <a href="/images/policies.php">Policies</a>
            </div>
            <div class="foot4">
                <h3>Shop</h3>
                <div style="margin-bottom: 15px;">
                    <a href="/images/aboutus.php">About Us</a>
                </div>
            </div>
        </div>
        <div class="copyrights">
            <p style="border-top: 1px solid #fcf7ffcb; padding: 12px 0px; width: 90%;">Theatron &#169; 2023 - All Rights Reserved</p>
        </div>
    </footer>
    <script src="/js/imgSlider.js"></script>
    <script src="/js/menu.js"></script>
</body>
</html>