<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "You are not logged in, please login. ";
    echo "<a href='login.php'>Login here</a>";
    exit;
}

// Check if user is admin
if ($_SESSION['role'] != 'admin') {
    echo "You are not allowed to view this page, please login as admin";
    exit;
}

// Check request method
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo "You are not allowed to view this page";
    exit;
}

require 'database.php';

$name = isset($_POST['name']) ? $_POST['name'] : '';
$category = isset($_POST['category']) ? $_POST['category'] : ''; // corrected variable name
$price = isset($_POST['price']) ? $_POST['price'] : '';
$brand = isset($_POST['brand']) ? $_POST['brand'] : '';
$image = isset($_FILES['fileToUpload']) ? $_FILES['fileToUpload']["name"] : ''; // corrected file input name

// Include file for file upload handling
include 'tool_create_file_upload.php';

// Check if all required fields are set
if (empty($name) || empty($category) || empty($price) || empty($brand) || empty($image)) { // corrected variable name
    echo "Please fill all required fields";
    exit;
}

$sql = "INSERT INTO tools (tool_name, tool_category, tool_price, tool_brand, tool_image) VALUES (:name, :category, :price, :brand, :image)";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':name', $name, PDO::PARAM_STR);
$stmt->bindParam(':category', $category, PDO::PARAM_STR);
$stmt->bindParam(':price', $price, PDO::PARAM_STR);
$stmt->bindParam(':brand', $brand, PDO::PARAM_STR);
$stmt->bindParam(':image', $image, PDO::PARAM_STR);
$stmt->execute();

if ($stmt) {
    header("Location: tool_index.php");
    exit;
}

echo "Something went wrong";
