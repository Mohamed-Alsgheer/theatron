<?php
session_start();
// Get the product data.
$title = $_POST['title'];
$price = $_POST['price'];
$type = $_POST['type'];
$date = $_POST['date'];
$description = $_POST['desc'];
$seats = $_POST['seats'];

$image = $_FILES['img'];  // Get image file.

// Move the file to images folder.
move_uploaded_file($image['tmp_name'], 'C:\xampp\htdocs\IT_project\images\plays_img\\' . $image['name']);

// Define the product data
$play = array(
    'id' => uniqid(),
    'title' => $title,
    'type' => $type,
    'price' => $price,
    'image' => '../images/plays_img/' . $image['name'],
    'seats' => $seats,
    'date' => $date,
    'description' => $description,
    'booked' => 0,
    'vendorID' => $_SESSION['user']['id']
);

// Get plays data.
$playsFile = file_get_contents('../models/plays.json');
$plays = json_decode($playsFile, true);

// Add the new play to the array
$plays[] = $play;

$json = json_encode($plays, JSON_PRETTY_PRINT);

// Save the JSON data to file
file_put_contents('../models/plays.json', $json);
header('Location: ../html/vendorpl.php');
?>