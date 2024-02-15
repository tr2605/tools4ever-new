<?php

if (isset($_POST['submit'])) {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $emailForm = $_POST['email'];
            $passwordForm = $_POST['password'];

            require 'database.php';

             $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
             $stmt->bindParam(':email', $emailForm);
             $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $dbuser = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($dbuser['password'] == $passwordForm) {

                    session_start();
                    $_SESSION['user_id']    = $dbuser['id'];
                    $_SESSION['email']      = $dbuser['email'];
                    $_SESSION['firstname']  = $dbuser['firstname'];
                    $_SESSION['lastname']   = $dbuser['lastname'];
                    $_SESSION['role']       = $dbuser['role'];

                    // echo "You are logged in";
                    header("Location: dashboard.php");
                    exit;
                } else {
                    $_GET['message'] = 'wrongpassword';
                }
            }
            else {
                include 'header.php';
                $_GET['message'] = 'usernotfound';
                include 'login-message.php';
                include 'footer.php';
                exit;
            }
        }
    }
}

include 'footer.php';
