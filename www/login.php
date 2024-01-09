<?php

session_start();
if(isset($_SESSION['error_message'])){
    echo $_SESSION['error_message'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="login_process.php" method="post">
        <input type="text" name="email" id="">
        <input type="text" name="password" id="">
        <button type="submit">Login!!</button>
    </form>

</body>
</html>
