<?php
/* Deze code wordt nu met prepared statements 
 * gebruikt op tool_detail.php, deze 
 * gaan we ook gebruiken op tool_update.php
 */
require 'database.php';

if (!isset($_GET['id'])) { //check of id in de GET array bestaat
    echo "Er mist een id parameter";
    exit;
}

$id = $_GET['id'];

//query met placeholders
$sql = "SELECT * FROM tools WHERE tool_id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":id", $id);

if (!$stmt->execute()) { //als de query nueit gelukt is dan stoppen we het script
    echo "Er is iets fout gegaan, probeer het later weer";
    exit;
}

$tool = $stmt->fetch(PDO::FETCH_ASSOC);  //haal de data op als een asociatieve array

if (empty($tool)) { //als er iets mis gaat dan stoppen we het script
    echo "De data is niet correct opgehaald";
    exit;
}