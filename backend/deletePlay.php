<?php
// Define the ID of the product to delete
$playID = $_GET['id'];

// Get plays file
$playsFile = file_get_contents('../database/plays.json');
$plays = json_decode($playsFile, true);

// Find the play with the specified ID.
foreach($plays as $key => $play) {
    if($play['id'] == $playID) {
        // Remove the product from the array
        unset($plays[$key]);
    }
}

$json = json_encode($plays, JSON_PRETTY_PRINT);
file_put_contents('../database/plays.json', $json);

header("Location: " . $_SERVER["HTTP_REFERER"]);
exit;
?>