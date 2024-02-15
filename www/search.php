<?php
session_start();
if (isset($_SESSION['voornaam']) && isset($_SESSION['achternaam'])) {
    echo $_SESSION['voornaam'] . " " . $_SESSION['achternaam'];
}

require 'database.php';

$time = time();
echo date('d-m-Y H:i:s', $time);

if (isset($_GET['search_submit'])) {
    if (!empty($_GET['search'])) {

        $zoekterm = $_GET['search'];
        $sql = "SELECT * FROM tools WHERE name LIKE :zoekterm";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':zoekterm', $zoekterm, PDO::PARAM_STR);
        $stmt->execute();

        $tools = $stmt->fetch(PDO::FETCH_ASSOC);
    }
}


$sql = "SELECT COUNT(*) AS aantal FROM tools";
$result = mysqli_query($stmt, $sql);
$resultaat_array = mysqli_fetch_assoc($result);
$aantal = $resultaat_array['aantal'];
echo $aantal



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gevonden tools</title>
</head>

<body>
    <div class="container">
        <form action="" method="get">
            <input type="text" name="search" id="search" placeholder="Zoek naar gereedschap">
            <button type="submit" name="search_submit">Zoek</button>
        </form>
    </div>
    <div class="container">
        <h1>Resultaten</h1>
        <?php foreach ($tools as $tool) : ?>
        <?php endforeach; ?>
    </div>
</body>

</html>