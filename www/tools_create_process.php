<?php

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    echo "405 error. Niet de juiste request method gebruikt!!!!";
    exit;
}

if (!isset($_POST['submit'])) {
    echo "Je hebt niet op de knop gedrukt";
    exit;
}

if (!isset($_POST['tool_name']) || !isset($_POST["tool_category"]) || !isset($_POST["tool_price"]) || !isset($_POST["tool_brand"])) {
    echo "Een van de vereiste invulvelden wordt niet correct meegestuurd";
    exit;
}

//Notice: Undefined index: tool_name in tools_create_process.php on line number 19
if (empty($_POST['tool_name'])) {
    echo 'Je moet wel een naam opgeven!!';
    exit;
}

if (empty($_POST['tool_category'])) {
    echo 'Je moet wel een categorie opgeven!!';
    exit;
}

if (empty($_POST['tool_brand'])) {
    echo 'Je moet wel een merk opgeven!!';
    exit;
}


if (empty($_POST['tool_price'])) {
    echo 'Je moet wel een prijs opgeven!!';
    exit;
}

if (strlen($_POST['tool_name'])  <= 3) {
    echo "de naam moet minstens 3 karakters bevatten";
    exit;
}

require 'database.php';

$tool_name = $_POST['tool_name']; //
$tool_category = $_POST['tool_category'];
$tool_brand = $_POST['tool_brand'];
$tool_price = $_POST['tool_price'];

$sql = "INSERT INTO tools (tool_name, tool_category, tool_brand, tool_price) VALUES ('$tool_name', '$tool_category', '$tool_brand', '$tool_price') ";

if (mysqli_query($conn, $sql)) {
    header("location: tools_index.php");
}
