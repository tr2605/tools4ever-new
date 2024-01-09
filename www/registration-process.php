<?php

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    echo "405 error. Niet de juiste request method gebruikt!!!!";
    exit;
}

if (!isset($_POST['submit'])) {
    echo "Je hebt niet op de knop gedrukt";
    exit;
}

// var_dump($_POST);
// die;

if (
    !isset($_POST['emailForm'])    ||
    !isset($_POST["passwordForm"]) ||
    !isset($_POST["firstnameForm"])  ||
    !isset($_POST["lastnameForm"]) ||
    !isset($_POST["addressForm"])  ||
    !isset($_POST["cityForm"]) ||
    !isset($_POST["isActiveForm"]) ||
    !isset($_POST["roleForm"])
) {
    echo "Een van de vereiste invulvelden wordt niet correct meegestuurd";
    exit;
}

if (empty($_POST['emailForm'])) {
    echo "Het emailadres is verplicht!";
    exit;
}

require 'database.php';


$email = $_POST['emailForm'];
$password = $_POST['passwordForm'];
$firstname = $_POST['firstnameForm'];
$lastname = $_POST['lastnameForm'];
$address = $_POST['addressForm'];
$city = $_POST['cityForm'];

$sql = "INSERT INTO users (email, password, firstname, lastname, address, city ) 
            VALUES ('$email', '$password', '$firstname', '$lastname', '$address', '$city')";

if(mysqli_query($conn, $sql)){
    echo "Je bent geregistreerd!";
}

