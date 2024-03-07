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
require 'header.php';
$sql = "SELECT * FROM categories";
$stmt = $conn->prepare($sql);
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC); // Fixed variable name

?>

<main>
    <h1>Nieuw Gereedschap</h1>
    <div class="container">
        <form action="tool_create_process.php" method="post" enctype="multipart/form-data">
            <div>
                <label for="name">Naam:</label>
                <input type="text" id="name" name="name">
            </div>
            <div>
                <label for="category">Categorie:</label>
                <select type="text" id="category" name="category">
                    <?php foreach ($categories as $categorie) : ?> <!-- Fixed variable name -->
                        <option value="<?php echo $categorie['category_id']; ?>">
                            <?php echo $categorie['name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label for="price">Prijs:</label>
                <input type="number" id="price" name="price">
            </div>
            <div>
                <label for="brand">Merk:</label>
                <input type="brand" id="brand" name="brand">
            </div>
            <div>
                <label for="fileToUpload">Afbeelding:</label>
                <input type="file" id="fileToUpload" name="fileToUpload">
            </div>
            <button type="submit" name="submit" class="btn btn-success">Toevoegen</button>
        </form>
    </div>
</main>
<?php require 'footer.php' ?>