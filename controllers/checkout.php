<?php
    session_start();
    $playsFile = file_get_contents('../models/plays.json');
    $plays = json_decode($playsFile, true);
    
    $cart = $_SESSION['cart'];
    foreach($cart as $item){
        foreach($plays as $play){
            if($item["id"] == $play['id']){
                $play['booked'] += $item['tickets'];
                
            }
        }
    }


    $bookingsFile = file_get_contents('../models/bookings.json');
    $bookings = json_decode($bookingsFile, true);

    $booking = array(
        "userID" => $_SESSION['user']['id'],
        "cart" => $cart
    );

    $bookings[] = $booking;
    $json = json_encode($bookings, JSON_PRETTY_PRINT);
    file_put_contents('../models/bookings.json', $json);

    unset($_SESSION['cart']);
    unset($_SESSION['totalCost']);
    unset($_SESSION['totalTickets']);
    header('Location: ../index.php');
    exit;
?>