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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update tool</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<input type="hidden" name="tool_id" value="<?php $id ?>">

<body>
    <header>
        <h1>Update Product</h1>
    </header>
    <form action="tools_update_process.php" method="post">
        <input type="hidden" name="tool_id" value="<?php echo $_GET['id']; ?>">
        <div class="form-group">
            <label for="tool_name">Naam tool</label>
            <input type="text" name="tool_name" value="<?php echo $tool['tool_name'] ?>">
        </div>
        <div class="form-group">
            <label for="tool_category">Categorie</label>
            <input type="text" name="tool_category" id="tool_category" value="<?php echo $tool['tool_category'] ?>">
        </div>
        <div class="form-group">
            <label for="tool_price">Prijs</label>
            <input type="number" name="tool_price" id="tool_price" value="<?php echo $tool['tool_price'] ?>">
        </div>
        <div class="form-group">
            <label for="tool_brand">Merk</label>
            <input type="text" name="tool_brand" id="tool_brand" value="<?php echo $tool['tool_brand'] ?>">
        </div>
        <button type="submit" name="submit">Update tool</button>
    </form>

</body>

</html>