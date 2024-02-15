<?php

//echo "<pre>";
//print_r($_POST);
//echo "<pre>";

$firstname  = $_POST['firstname'];
$lastname   = $_POST['lastname'];
$email      = $_POST['email'];
$password   = $_POST['password'];
$address    = $_POST['address'];
$city       = $_POST['city'];
$role       = $_POST['role'];
$user_id       = $_POST['user_id'];
$is_active  = 1;
require('database.php');

$sql = "UPDATE users SET firstname = :firstname, lastname = :lastname, email = :email, password = :password, address = :address,
        city = :city, role = :role WHERE id = :user_id";


$stmt = $conn->prepare($sql);
$stmt->bindParam(':firstname', $firstname);
$stmt->bindParam(':lastname', $lastname);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);
$stmt->bindParam(':address', $address);
$stmt->bindParam(':city', $city);
$stmt->bindParam(':role', $role);
$stmt->bindParam(':user_id', $user_id);

if ($stmt->execute()) {
    echo "we so fuckin goated";
} else {
    echo "washed";
}
