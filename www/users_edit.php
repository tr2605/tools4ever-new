<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "You are not logged in, please login. ";
    echo "<a href='login.php'>Login here</a>";
    exit;
}

if ($_SESSION['role'] != 'admin') {
    echo "You are not allowed to view this page, please login as admin";
    exit;
}

require 'database.php';
$id = $_GET['id'];
$sql = "SELECT * FROM users WHERE id = :id";
$stmt = $conn->prepare("SELECT * FROM users WHERE id = :id");
$stmt->bindParam(":id", $id);
if ($stmt->execute()) {
    if ($stmt->rowCount()) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        require('header.php');
        echo "<main>";
        echo "geen gebruiker gevonden met deze ID";
        echo "</main>";
    }
}
require('header.php');
?>
<main>
    <div class="container">
        <form action="users_update.php" method="post">
            <input type="hidden" name="user_id" value="<?php echo $user["id"]; ?>">
            <div class="form-group">
                <label for="firstname">Voornaam:</label>
                <input type="text" name="firstname" id="firstname" value="<?php echo $user["firstname"]; ?>">
            </div>
            <div class="form-group">
                <label for="lastname">Achternaam:</label>
                <input type="text" name="lastname" id="lastname" value="<?php echo $user["lastname"]; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" value="<?php echo $user["email"]; ?>">
            </div>
            <div class="form-group">
                <label for="password">Wachtwoord:</label>
                <input type="text" name="password" id="password" value="<?php echo $user["password"]; ?>">
            </div>
            <div class="form-group">
                <label for="address">Adres:</label>
                <input type="text" name="address" id="address" value="<?php echo $user["address"]; ?>">
            </div>
            <div class="form-group">
                <label for="city">Stad:</label>
                <input type="text" name="city" id="city" value="<?php echo $user["city"]; ?>">
            </div>
            <!--  <div class="form-group">
                <label for="backgroundColor">Kleur:</label>
                <input type="color" name="backgroundColor" id="backgroundColor" value="<?php echo $user["backgroundColor"]; ?>">
            </div>-->
            <!-- <div class="form-group">
                <label for="font">Lettertype:</label>
                <select id='font' onChange="return fontChange();" name="font">
                </select>
            </div> -->
            <div class="form-group">
                <label for="role">Rol:</label>
                <select name="role" id="role">
                    <option value="">Selecteer Rol</option>
                    <option value="admin" <?php if ($user["role"] == "admin") echo "selected"; ?>>Admin</option>
                    <option value="employee" <?php if ($user["role"] == "employee") echo "selected"; ?>>Werknemer</option>
                </select>
            </div>
            <input type="submit" value="Edit User">
        </form>
    </div>
</main>

<?php require('footer.php') ?>