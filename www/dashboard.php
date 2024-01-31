<?php
// Path: www/dashboard.php
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "You are not logged in, please login. ";
    echo "<a href='login.php'>Login here</a>";
    exit;
}


if ($_SESSION['role'] != 'admin') {
    echo "You are not allowed to view this page, please login as admin";
    exit;
}


require 'header.php';

$sql = "SELECT * FROM users JOIN user_settings ON user_settings.user_id = users.id WHERE users.id =  1";
