<?php
// echo "<pre>

session_start();
require 'database.php';


//check method
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo "You are not allowed to view this page";
    exit;
}

// Check if all fields are filled in
if (empty($_POST['tool_name']) || empty($_POST['tool_brand']) || empty($_POST['tool_category']) || empty($_POST['tool_price'])) {
    echo "Please fill in all fields";
    exit;
}

$id = $_GET['id'];
// $email = $_POST['email'];
// $password = $_POST['password'];
$tool_name = $_POST['tool_name'];
$tool_brand = $_POST['tool_brand'];
$tool_category = $_POST['tool_category'];
$tool_price = $_POST['tool_price'];

$sql = "UPDATE tools SET tool_name = :tool_name, tool_brand = :tool_brand, tool_category = :tool_category, tool_price = :tool_price WHERE tool_id = :id";

$stmt = $conn->prepare($sql);
$stmt->bindParam(":id", $id);
$stmt->bindParam(":tool_name", $tool_name);
$stmt->bindParam(":tool_brand", $tool_brand);
$stmt->bindParam(":tool_category", $tool_category);
$stmt->bindParam(":tool_price", $tool_price);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($stmt->execute()) {
    echo "is edited fr gang type shi n things of that nature";
}
