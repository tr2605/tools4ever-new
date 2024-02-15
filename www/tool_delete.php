<?php

require 'database.php';

$id = $_GET['id'];

$sql = "DELETE FROM tools WHERE tool_id = :id";

$stmt = $conn->prepare($sql);
$stmt->bindParam(":id", $id);
if($stmt->execute()){
    header('Location: tool_index.php');
    exit();
}
else
echo "ER GAAT WAT MIS";

?>