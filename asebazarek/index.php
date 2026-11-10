<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zdrowy bazarek</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <header>
        <h1>Zdrowy bazarek</h1>
    </header>
    <nav>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "bazar");
        $sql = "SELECT nazwa, plik FROM towar";
        $wynik = mysqli_query($conn, $sql);



        
        while ($wiersz = mysqli_fetch_array($wynik)) {
            $nplik = $wiersz['plik'];
            $nnazwa = $wiersz['nazwa'];
        echo "<img src=" . $nplik . " alt=" . $nnazwa . ">";
        }
        
        ?>

    </nav>
    <main>
        <div>
            <img src="market.png" alt="bazarek">
        </div>
        <section>
            <p>Wybierz owoc lub warzywo i podaj wagę:</p>
            <form method="POST">
                <select name="lista" id="lista">
                    <?php
                    $sql2 = "SELECT nazwa, cena, id FROM towar";
                    $wyniczek = mysqli_query($conn, $sql2);
                    while ($row = mysqli_fetch_assoc($wyniczek)) {
                        $nazwa = $row['nazwa'];
                        $idk = $row['id'];

                        echo "<option value='$idk'>$nazwa</opiton>";
                    }

                    ?>
                </select>
                <input type="number" name="waga">
                <button type="submit">Zamów</button>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    $waga = $_POST["waga"];
                    $id = $_POST["lista"];

                    $sql3 = "SELECT rodzaj, nazwa, cena, (cena * $waga) wartosc FROM towar WHERE id = $id";

                    $sql4 = "INSERT INTO zamowienie (id_towar, id_sklep, liczba_kg) VALUES ($id, 2, $waga);";

                    $dodaj = mysqli_query($conn, $sql4);
                    $wyswietl = mysqli_query($conn, $sql3);
                    while($ten = mysqli_fetch_array($wyswietl)) {
                        $rodzaj = $ten["rodzaj"];
                        $nazwaj = $ten["nazwa"];
                        $cena = $ten["wartosc"];

                        echo "$rodzaj $nazwaj wartość: $cena zł" ;
                    }
                }
                ?>
            </form>
        </section>
    </main>
    <footer>
        <p>Stronę opracował: 0000000000</p>
    </footer>
</body>

</html>