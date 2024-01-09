<?php

require 'database.php';

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    echo "405 error. Niet de juiste request method gebruikt!!!!";
    exit;
}

if (empty($_POST['email'])) {
    echo "emailveld is verplicht om in te vullen. DUS DOEN JA!!!!";
    exit;
}

if (isset($_POST['email'])) {
    $email = $_POST['email'];
}

if (isset($_POST['password'])) {
    $password = $_POST['password'];
}

$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

if (is_array($user)) {

    if ($email == $user['email']) {

        if ($password == $user['password']) {
            //hier is iemand volledig correct ingelogd!!!
            session_start();
            $_SESSION['isLoggedIn'] = true;
            $_SESSION['user_id'] = $user["id"];
            $_SESSION['firstname'] = $user["firstname"];
            $_SESSION['ln'] = $user["lastname"];
            $_SESSION['message'] = "Je bent ingelogd";
            header("location: dashboard.php");
            exit;
        }
        $_SESSION['error_message'] = "Het wachtwoord is verkeerd";
        header("location: login.php");
        exit;
    }
}

$_SESSION['error_message'] = "Dit emailadres is onbekend";
header("location: login.php");
exit;
