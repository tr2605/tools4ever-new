<?php

if (isset($_GET['search_submit'])) {

    if (!empty($_GET['search'])) {
        $searchWord = $_GET['search'];

        if (strlen($searchWord) < 3) {
            echo "Meer dan drie karakters AUB";
            exit;
        }

        $sql = "SELECT * FROM tools WHERE tool_name LIKE '%$searchWord%' ";

        require 'database.php';
        $result = mysqli_query($conn, $sql);
        $tools = mysqli_fetch_all($result, MYSQLI_ASSOC); // tools data

        $numberOfItemsFound = mysqli_num_rows($result);  //3

        // echo '<pre>';
        // var_dump($tools);
        // echo '</pre>';
        // die;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoeken</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <form action="" method="get">
        <label for="search">Zoek</label>
        <input type="text" name="search" id="search" placeholder="Zoek gereedschap">
        <button type="submit" name="search_submit">Zoek!</button>
    </form>

    <div>
        <?php if (!empty($tools)) : ?>
            <h3>Aantal gevonden artikelen: <?php echo $numberOfItemsFound ?></h3>
            <div class="search-results">
                <table>
                    <tr>
                        <th>naam</th>
                        <th>prijs</th>
                        <th>merk</th>
                    </tr>
                    <?php foreach ($tools as $tool) : ?>
                        <tr>
                            <td><?php echo $tool['tool_name']; ?></td>
                            <td><?php echo $tool['tool_price']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        <?php else : ?>
            <div class="alert">Helaas geen tools gevonden</div>
        <?php endif ?>
    </div>
    <style>
        .alert {
            background-color: beige;
            border: 3px solid red;
            width: 100%;
            height: 50px;
            color: red;
        }
    </style>



</body>

</html>