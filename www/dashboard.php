<?php

session_start();

if (!isset($_SESSION['message'])) {
    $_SESSION['error_message'] = "Je dient wel in te loggen";
    header("location: login.php");
    exit;
}


if (isset($_SESSION['firstname'])) {

    $welkomszin = "Beste " . $_SESSION['firstname'] . ", je bent ingelogd.";

    $vandaag =  date('d-m-Y', time());

    $sql = "SELECT COUNT(*) AS aantal FROM users WHERE role = 'employee'  ";
    require 'database.php';
    $result = mysqli_query($conn, $sql);

    $data = mysqli_fetch_assoc($result);

}






?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <?php include 'header.php' ?>
    <div class="parent">
        <div class="child">
            Vandaag is het: <?php echo $vandaag ?>
        </div>
        <div class="child">
            <?php echo $welkomszin ?>
        </div>
        <div class="child"></div>
    </div>

    <div class="data">
        <div class="child-of-data">
            Aantal medewerkers momenteel in dienst: <?php echo $data['aantal'] ?>
        </div>
    </div>
</body>

</html>