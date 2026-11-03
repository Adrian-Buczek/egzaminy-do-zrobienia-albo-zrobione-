<?php 
session_start();

if(!isset($_SESSION['login']) && !isset($_SESSION['haslo'])){
    header("Location: login.php");
}
if($_SESSION['login'] != "admin" && $_SESSION['haslo'] != "TajneHaslo321*"){
    header("Location: login.php");
}

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Przeglądaj wyniki</title>
</head>
<body>
    <header>
        <h1>Portal laboratorium</h1>
        <p><?php echo  $_SESSION['login']; ?></p>
        <a href="wyloguj.php">Wyloguj</a>
    </header>
    <main class="ztabelom">
        <h2>Wyniki pacjentów</h2>
        <table>
            <tr>
                <th>Imię pacjęta</th>
                <th>Nazwisko pacjęta</th>
                <th>PESEL</th>
                <th>Data zlecenia</th>
                <th>Data wykonania</th>
                <th>Wynik</th>
            </tr>
            <?php
            $conn = mysqli_connect("localhost", "root", "", "laboratorium");

            $sql = "SELECT p.imie, p.nazwisko, p.pesel, z.data zlecenie_data, w.data wynik_data, w.plik FROM pacjent p INNER JOIN zlecenie z ON p.id = z.idPacjenta LEFT JOIN wynik w ON w.idZlecenia = z.id;";
             $wynik = mysqli_query($conn, $sql); 

             while ($wiersz = mysqli_fetch_array($wynik)){


                echo "<tr>";
                echo "<td>" . $wiersz["imie"] .  "</td>";
                echo "<td>" . $wiersz["nazwisko"] . "</td>";
                echo "<td>" . $wiersz["pesel"] . "</td>";
                echo "<td>" . $wiersz["zlecenie_data"] . "</td>";
                echo "<td>" . $wiersz["wynik_data"] . "</td>";
                if(!is_null($wiersz['plik'])){
                    echo "<td><a href='" . $wiersz["plik"] . "'>wynik</a></td>";
                }

                echo "</tr>";

             }
             mysqli_close($conn);
            ?>
        </table>
    </main>
    <footer>
        <p>Strone wykonał : 0000000000</p>
    </footer>
</body>
</html>