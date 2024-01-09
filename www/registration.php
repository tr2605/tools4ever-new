<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register here!!!</title>
</head>

<body>
    <form action="registration-process.php" method="post">

        <div class="form-group">
            <label for="emailForm">Email</label>
            <input type="text" name="emailForm" id="emailForm" placeholder="Uw email-adres aub">
        </div>
        <div class="form-group">
            <label for="passwordForm">Wachtwoord</label>
            <input type="text" name="passwordForm" id="passwordForm" placeholder="Uw wachtwoord aub">
        </div>
        <div class="form-group">
            <label for="firstnameForm">Voornaam</label>
            <input type="text" name="firstnameForm" id="firstnameForm" placeholder="Uw voornaam aub">
        </div>
        <div class="form-group">
            <label for="lastnameForm">Achternaam</label>
            <input type="text" name="lastnameForm" id="lastnameForm" placeholder="Uw achternaam aub">
        </div>
        <div class="form-group">
            <label for="addressForm">Adres</label>
            <input type="text" name="addressForm" id="addressForm" placeholder="Uw adres aub">
        </div>
        <div class="form-group">
            <label for="cityForm">Stad</label>
            <input type="text" name="cityForm" id="cityForm" placeholder="Uw stad aub">
        </div>
        <div class="form-group">
            <label for="isNotActiveForm">Niet actief</label>
            <input type="radio" name="isActiveForm" id="isNotActiveForm" value="0" >
            <label for="isActiveForm">actief</label>
            <input type="radio" name="isActiveForm" id="isActiveForm" value="1" checked>
        </div>
        <div class="form-group">
            <label for="roleForm">Rol</label>
            <select name="roleForm" id="roleForm">
                <option value="administrator">BEHEERDER</option>
                <option value="employee">MEDEWERKER</option>
                <option value="customer">KLANT</option>
            </select>
        </div>
        <button type="submit" name="submit">Maak gebruiker</button>
    </form>
</body>

</html>