<?php
session_start();
require 'database.php';

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

require 'header.php';
?>
<main>
    <table>
        <thead>
            <tr>
                <th>Voornaam</th>
                <th>Achternaam</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?php echo $user['firstname'] ?></td>
                    <td><?php echo $user['lastname'] ?></td>
                    <td><?php echo $user['email'] ?></td>
                    <td><?php echo $user['role'] ?></td>
                    <td>
                        <a href="users_detail.php?id=<?php echo $user['id'] ?>">Bekijk</a>
                        <a href="users_edit.php?id=<?php echo $user['id'] ?>">Wijzig</a>
                        <a href="users_delete.php?id=<?php echo $user['id'] ?>">Verwijder</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>
<?php require 'footer.php' ?>