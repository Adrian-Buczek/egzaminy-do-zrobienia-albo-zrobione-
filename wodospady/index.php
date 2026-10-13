<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Wodospady</title>
</head>
<body>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "wodospady");

    ?>
    <header>
        <h2>Łowcy wodospadów</h2>
    </header>
    <main>
        <div>
            <?php
            $sql2 = "SELECT idKontynent , nazwa FROM kontynenty";

            $wynik2 = mysqli_query($conn, $sql2);

            while ($od = mysqli_fetch_assoc($wynik2)){
                $id = $od['idKontynent'];
                echo"<a href='?id=$id'>" . $od['nazwa'] . "</a>";
            }
            ?>
            
        </div>
        <section>
            <table>
                <tr>
                    <th>Identyfikator</th>
                    <th>Państwo</th>
                    <th>Nazwa wodopsadu</th>
                    <th>Wysokość</th>
                </tr>
                <?php
                if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])){
                    $idkontynentu = $_GET['id'];
                    $sql3 = "SELECT idObiekt, panstwo, nazwa, wartoscCechy FROM obiekty WHERE nazwaCechy = 'wysokość' AND idKontynent = $idkontynentu ";

                $wynik3 = mysqli_query($conn, $sql3);

                while ($wier = mysqli_fetch_assoc($wynik3)){
                    echo"<tr>";
                    echo"<td>" . $wier["idObiekt"] . "</td>";
                    echo"<td>" . $wier["panstwo"] . "</td>";
                    echo"<td>" . $wier["nazwa"] . "</td>";
                    echo"<td>" . $wier["wartoscCechy"] . "</td>";
                    echo"</tr>";
                }
                }else{
                $sql3 = "SELECT idObiekt, panstwo, nazwa, wartoscCechy FROM obiekty WHERE nazwaCechy = 'wysokość' ";

                $wynik3 = mysqli_query($conn, $sql3);

                while ($wier = mysqli_fetch_assoc($wynik3)){
                    echo"<tr>";
                    echo"<td>" . $wier["idObiekt"] . "</td>";
                    echo"<td>" . $wier["panstwo"] . "</td>";
                    echo"<td>" . $wier["nazwa"] . "</td>";
                    echo"<td>" . $wier["wartoscCechy"] . "</td>";
                    echo"</tr>";
                }
                }
                
                ?>
            </table>
            <h4>Wpisz osiągnięcie do bazy</h4>
            
                <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $id_turysta = $_POST['turysta'];
                    $id_wodospad = $_POST['idwodospad'];
                    $sql_add = "INSERT INTO osiagniecia (idObiekt, idTurysta) VALUES ($id_wodospad, $id_turysta)";
                    mysqli_query($conn, $sql_add);
                }                
                ?>
            <form action="" method='POST'>
                <label for="idwodospad">identyfikator wodospadu</label>
                <input type="number" name="idwodospad">
                <label for="turysta">turysta</label>
                <select name="turysta" id="turysta">
                    
                    <?php
                    $sql = "SELECT idTurysta, nick FROM turysci";
    
                    $wynik = mysqli_query($conn, $sql);
    
                    while ($wiersz = mysqli_fetch_assoc($wynik)){
                        $id = $wiersz['idTurysta'];
                        $nick =$wiersz['nick'];
                        echo "<option value='$id'>$nick</option>";
                    }
                    ?>
                    
                </select>
                <button name="baton">Wpisz</button>

            </form>
        </section>
    </main>
    <article>
        <h3>Wodospady w Polsce</h3>
        <img src="kamienczyk.jpg" alt="wodospad">
        <img src="siklawica.jpg" alt="wodospad">
        <img src="siklawa.jpg" alt="wodospad">
        <img src="wilczki.jpg" alt="wodospad">
    </article>
    <footer>
        <p>Autor:000000000000</p>
    </footer>
    <?php
    mysqli_close($conn);
    ?>
</body>
</html>