<?php
session_start();

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['haslo'] = $_POST['haslo'];
}
if(isset($_SESSION['login']) && isset($_SESSION['haslo'])){

    if($_SESSION['login'] == "admin" && $_SESSION['haslo'] == "TajneHaslo321*"){
        header("Location: wyniki.php");
    }
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Zaloguj się</title>
</head>
<body>
    <header class="heder">
        <h1>Portal laboratorium</h1>
    </header>
    <main class="mejn">
        <form method='POST'>

            <h2>Zaloguj się do systemu</h2>
            <label for="login">Login:
                <input type="text" name="login">
            </label>
            <label for="haslo">Hasło:
                <input type="password" name="haslo">
            </label>
            <button name="baton">Zaloguj</button>
        </form>

    </main>
    <footer>
        <p>Strone wykonał : 0000000000</p>
    </footer>
</body>
</html>