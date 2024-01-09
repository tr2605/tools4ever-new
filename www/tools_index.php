<?php

require 'database.php';




$sql = "SELECT * FROM tools";

$result = mysqli_query($conn, $sql);

$all_tools = mysqli_fetch_all($result, MYSQLI_ASSOC); // Multidimensionaal Associatieve array
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php include 'header.php' ?>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>naam</th>
                <th>categorie</th>
                <th>prijs</th>
                <th>merk</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($all_tools as $tool) : ?>
                <tr>
                    <td><?php echo $tool['tool_id']; ?></td>
                    <td><?php echo $tool['tool_name']; ?></td>
                    <td><?php echo $tool['tool_category']; ?></td>
                    <td><?php echo $tool['tool_price']; ?></td>
                    <td><?php echo $tool['tool_brand']; ?></td>
                    <td>
                        <a href="tools_detail.php?id=<?php echo $tool['tool_id']; ?>">Bekijk detail</a>
                        <a href="tools_delete.php?id=<?php echo $tool['tool_id']; ?>">Verwijder</a>
                        <a href="tools_update.php?id=<?php echo $tool['tool_id']; ?>">Update</a>

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>