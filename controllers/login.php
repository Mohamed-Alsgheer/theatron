<?php
    if(isset($_POST['login'])) {
        // Get form data.
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        // Get user database file.
        $usersFile = file_get_contents('../models/usersDB.json');
        $users = json_decode($usersFile, true);
    
        // Find user with matching email
        forEach ($users as $user) {
            if($user['email'] === $email) {
                // Verify password
                if(password_verify($password, $user['password'])) {
                    session_start();
                    $_SESSION['user'] = $user;
                    if($user['role'] == "user") {
                        header('Location: ../index.php');
                    } else {
                        header('Location: ../views/dashboard.php');
                    }
                    exit;
                } else {
                    $invalidPassword = true;
                    include('../views/account.php');
                    exit;
                }
            }
        }
    
        // User not found
        $userNotFound = true;
        include('../views/account.php');
        exit;
    }
?>