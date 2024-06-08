<?php 
  // Get plays database file.
  $playsFile = file_get_contents('../models/plays.json');
  $plays = json_decode($playsFile, true);
  $playsType = NULL;
  if(isset($_GET['type'])) {
    $playsType = $_GET['type'];
  }
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="../assets/css/genre.css" />
    <link rel="stylesheet" href="../assets/css/style.css" />
    <link rel="icon" href="../assets/images/icon.png">
    <title><?php echo $playsType ?> Theatre</title>
  </head>
  <body>
    <!--navbar-->
    <nav>
      <a href="../index.php">
        <img src="../assets/images/logo.png" id="logo" />
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
                  echo '<span id="qty">' . $_SESSION['totalTickets'] . '</span>';
                } else {
                  echo '<span id="qty">0</span>';
                }
              }
            ?>
          </a>
          <img src="../assets/images/menu.png" id="menu-icon" />
        </div>
      </div>
    </nav>
    <!--plays list-->
    <div class="container">
      <?php if(isset($_GET['type'])) { ?>
        <h1 class="header"><?php echo $playsType ?> Theatre</h1>
        <div class="box-container">
          <?php 
            forEach($plays as $play) { 
              if($play['type'] == $playsType) {
          ?>
              <div class="box">
                <a href=<?php echo "'./detailsPage.php?id=" . $play['id'] . "'"; ?>>
                  <img
                  <?php 
                    echo 'src="' . $play['image'] . '"' ;
                    echo 'alt="' . $play['title'] . '"' ;
                    ?> 
                  />
                </a>
                <h3><?php echo $play['title'] ?></h3>
                <p>price : <?php echo $play['price'] ?>$</p>
                <a <?php echo 'href="../controllers/cart.php?id=' . $play['id'] . '"' ?> class="btn">book now</a>
              </div>
          <?php }
            }
          ?>
        </div>
      <?php 
      } else { ?>
      <h1 class="header">Most Booked</h1>
      <div class="box-container">
      <?php
        // sort theatres by the most booked.
        function sortByBooked($array) {
          usort($array, function($a, $b) {
              return $b['booked'] - $a['booked'];
          });
          return $array;
        }

        $sortedPlays = sortByBooked($plays);
        forEach($sortedPlays as $play) { 
          if($play['booked'] != 0) {
      ?>
            <div class="box">
              <a href=<?php echo "'./detailsPage.php?id=" . $play['id'] . "'"; ?>>
                <img
                <?php 
                  echo 'src="' . $play['image'] . '"' ;
                  echo 'alt="' . $play['title'] . '"' ;
                  ?> 
                />
              </a>
              <h3><?php echo $play['title'] ?></h3>
              <p>price : <?php echo $play['price'] ?>$</p>
              <a <?php echo 'href="../controllers/cart.php?id=' . $play['id'] . '"' ?> class="btn">book now</a>
            </div>
      <?php
          }
        }
        ?>
      </div>
      <?php
      }
      ?>
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
