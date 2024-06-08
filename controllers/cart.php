<?php
    session_start();
    if(isset($_SESSION['user'])) {
        $playID = NULL;

        // Get plays database file.
        $playsFile = file_get_contents('../models/plays.json');
        $plays = json_decode($playsFile, true);

        // Check if the user requesting to remove play from the cart or not.
        isset($_GET['remove']) ? $playID = $_GET['remove'] :  $playID = $_GET['id'];

        forEach($_SESSION['cart'] as $key => $item) {
            // Remove the play from the cart.
            if(isset($_GET['remove'])) {
                unset($_SESSION['cart'][$key]);
                $_SESSION['totalCost'] -= $item['total'];
                $_SESSION['totalTickets'] -= $item['tickets'];
                header("Location: " . $_SERVER["HTTP_REFERER"]);
                exit;
            }
        }


        // Find play with matching id.
        $selectedPlay = array();
        forEach ($plays as $key => $play) {
            if($play['id'] == $playID) {
                $selectedPlay = array(
                    "id" => $play['id'],
                    "title" => $play['title'],
                    "image" => $play['image'],
                    "price" => $play['price'],
                    "date" => $play['date'],
                    "tickets" => $_GET['qty'] ?? 1,
                    "total" => $play['price'] * ($_GET['qty'] ?? 1)
                );
            }
        }

            
        // Check if the cart array exists in the session.
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = NULL;
            $_SESSION['totalCost'] = 0;
            $_SESSION['totalTickets'] = 0;
        }


        // Check if the play already exists in the cart.
        foreach ($_SESSION['cart'] as &$play) {
            if ($play['id'] == $playID) {
                $play['tickets'] += $_GET['qty'] ?? 1;
                $play['total'] = $play['tickets'] * $play['price'];
                $_SESSION['totalCost'] += $play['price'] * ($_GET['qty'] ?? 1);
                $_SESSION['totalTickets'] += $_GET['qty'] ?? 1;
                header("Location: " . $_SERVER["HTTP_REFERER"]);
                exit;
            }
        }
        
        // If the play doesn't exist in the cart, add it as a new item.
        $_SESSION['cart'][] = $selectedPlay;
        $_SESSION['totalCost'] += $selectedPlay['price'] * ($_GET['qty'] ?? 1);
        $_SESSION['totalTickets'] += $_GET['qty'] ?? 1;
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        exit;
    } else {
        header('Location: ../views/account.php');
        exit;
    }
?>