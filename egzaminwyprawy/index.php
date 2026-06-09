<?php
//SELECT nazwa FROM miejsca ORDER BY nazwa ASC;
//SELECT cena FROM miejsca WHERE nazwa = "Malbork"
//SELECT nazwa, cena, link_obraz FROM miejsca WHERE link_obraz LIKE "0%";
//SELECT m.nazwa, ROUND(AVG(w.liczba_doroslych), 2) FROM miejsca m INNER JOIN wycieczki w ON w.id_miejsca = m.id_miejsca GROUP BY m.nazwa;
//CREATE TABLE klienci (
    //id_klienta INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    //imie VARCHAR(20),
    //nazwisko VARCHAR(40),
    //data_ur DATE
//);

//zrobiona tutaj baza wyprawyegz ale normalie ma być "wyprawy"
$conn = mysqli_connect("localhost","root","","wyprawyegz");
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biuro turystyczne</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <nav>
        <ol>
            <li>
                <a href="wczasy.html">Wczasy</a>
            </li>
            <li>
                <a href="wycieczki.html">Wycieczki</a>
            </li>
            <li>
                <a href="allinclusive.html">All inclusive</a>
            </li>
        </ol>
    </nav>
    <main>
        <aside>
            <h3>Twój cel wyprawy</h3>
            <form method="POST">
                <label for="mwycieczki">Miejsce wycieczki:</label>
                <select name="mwycieczki" id="mwycieczki">
                <?php
                    
                
                    $sql = "SELECT nazwa FROM miejsca;";
                    $result = mysqli_query($conn,$sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        $miejsce = $row['nazwa'];
                        echo "<option value='$miejsce'>$miejsce</opiton>";
                    }

                ?>
                
                    

                </select>
                <label for="Ldoroslych">Ile dorosłych?</label>
                <input type="number" name="Ldoroslych" id="Ldoroslych">
                <label for="ldzieci">Ile dzieci?</label>
                <input type="number" name="Ldzieci" id="Ldzieci">
                <label for="termin">Termin</label>
                <input type="date" name="dataa" >
                <button name="przycisk">Symulacja ceny</button>
                <h4>Koszt wycieczki</h4>
                <?php
                if($_SERVER['REQUEST_METHOD'] === 'POST'){
                    $dorosli = $_POST['Ldoroslych'];
                    $dzieci = $_POST['Ldzieci'];
                    $datka = $_POST['dataa'];
                    
                    $sql2 = "SELECT cena FROM miejsca"
                }




                ?>

            </form>
            
        </aside>
        <section>
            <h3>Wycieczki</h3>

        </section>
    </main>
    <footer>
        <p>
            Autor: 0000000000
        </p>
    </footer>
    <?php
    mysqli_close($conn);
    ?>
</body>
</html>