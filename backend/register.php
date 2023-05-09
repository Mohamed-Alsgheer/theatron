<?php
    if(isset($_POST['register'])) {
        // Get form data.
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        
        // Get user database file.
        $usersFile = file_get_contents('../database/usersDB.json');
        $users = json_decode($usersFile, true);
        
        // Check if email exists in database.
        forEach($users as $user) {
            if ($user['email'] === $email) {
                $emailExist = true;
                include('../html/account.php');
                exit;
            }
        }

        /* Create new user in database. */
        $userID = uniqid('user_'); // make user ID
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hash the password
        $newUser = array(
            "id" => $userID,
            "username" => $username,
            "email" => $email,
            "password" => $hashedPassword,
            "role" => $role
        );

        $users[] = $newUser;

        // Store the new user in the database.
        $jsonData = json_encode($users, JSON_PRETTY_PRINT);
        file_put_contents('../database/usersDB.json', $jsonData);
        header('Location: ../html/account.php'); // Redirect to login page.
        exit;
    }
?>