<?php
    if(isset($_POST['login'])) {
        // Get form data.
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        // Get user database file.
        $usersFile = file_get_contents('../database/usersDB.json');
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
                        header('Location: ../html/dashboard.php');
                    }
                    exit;
                } else {
                    $invalidPassword = true;
                    include('../html/account.php');
                    exit;
                }
            }
        }
    
        // User not found
        $userNotFound = true;
        include('../html/account.php');
        exit;
    }
?>