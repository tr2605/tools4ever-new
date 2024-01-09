<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maak nieuwe tool</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <h1>Nieuw Product</h1>
    </header>
    <form action="tools_create_process.php" method="post">
        <div class="form-group">
            <label for="tool_name">Naam tool</label>
            <input type="text" name="tool_name">
        </div>
        <div class="form-group">
            <label for="tool_category">Categorie</label>
            <input type="text" name="tool_category" id="tool_category">
        </div>
        <div class="form-group">
            <label for="tool_price">Prijs</label>
            <input type="number" name="tool_price" id="tool_price">
        </div>
        <div class="form-group">
            <label for="tool_brand">Merk</label>
            <input type="text" name="tool_brand" id="tool_brand">
        </div>
        <button type="submit" name="submit">Maak nieuwe tool</button>
    </form>

</body>

</html>