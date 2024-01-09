<?php

// Schrijf code waarmee je de instellingen van de ingelogde gebruiker ophaalt en toont
session_start();

if (!isset($_SESSION['isLoggedIn'])) {
    echo "inloggen maat!";
    exit;
}
require 'database.php';

$user_id = $_SESSION['user_id'];
$sql = "SELECT backgroundColor, font FROM users JOIN user_settings ON user_settings.user_id = users.id WHERE user_id = $user_id";
$result = mysqli_query($conn, $sql);

$data = mysqli_fetch_assoc($result);

include 'header.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Settings</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>User Settings</h1>
    <p>font: <?php echo $data['font']?></p>
    <p>bg-color: <?php echo $data['backgroundColor']?></p>
    <style>
        body{
            background-color: <?php echo $data['backgroundColor']?>;
            color:white;
        }
    </style>
</body>

</html>