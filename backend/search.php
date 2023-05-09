<?php
   session_start();
   //Get the search item
   $search_play = $_GET['search'];

   $playsFile = file_get_contents('../database/plays.json');
   $plays = json_decode($playsFile, true);

   // Search 
   $results =  array();
   foreach($plays as $play) {
      if($play['vendorID'] == $_SESSION['user']['id']) {
         if(strpos($play['title'], $search_play) !== false)  {
            $results[] = $play;
         }
      }
   }

   include('../html/vendorpl.php');
   exit;


?>