<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <title>piłka nożna</title>
        <link rel="stylesheet" href="./styl2.css">
    </head>
    <body>
        <div id="baner">
            <h3>Reprezentacja polski w piłce nożnej</h3>
            <img src="./obraz1.jpg" alt="reprezentacja">
        </div>
        <div id="lewy">
            <form method="post">
                <select name="pozycja">
                    <option value="1">Bramkarze</option>
                    <option value="2">Obrońcy</option>
                    <option value="3">Pomocnicy</option>
                    <option value="4">Napastnicy</option>
                </select>
                <input type="submit" value="Zobacz" name="submit"/>
            </form>
            <img src="./zad2.png" alt="piłka" />
            <p>Autor: 000000000</p>
        </div>
        <div id="prawy">
            <ol>
                <?php 
                    if (isset($_POST['submit'])){
                        $selectedValue = $_POST['pozycja'];
                        
                        if (!empty($selectedValue)){
                            $connection = mysqli_connect('localhost', "root", "", "egzamin") or die("Błąd w połączdniu z bazą.");
                            $query = "SELECT imie, nazwisko FROM zawodnik WHERE pozycja_id='$selectedValue'";

                            $result = mysqli_query($connection, $query) or die("Błąd w zapytaniu");

                            while ($row = mysqli_fetch_row($result)){
                                echo "<li><p>$row[0] $row[1]</p></li>";
                            }

                            mysqli_close($connection);
                        }
                        
                    }
                ?>
            </ol>
        </div>
        <div id="glowny">
            <h3>Liga mistrzów</h3>
        </div>
        <div id="liga">
            <?php 
                $connection = mysqli_connect('localhost', "root", "", "egzamin") or die("Błąd w połączdniu z bazą.");
                $query = "SELECT liga.zespol, liga.punkty, liga.grupa FROM liga ORDER BY liga.punkty DESC;";

                $result = mysqli_query($connection, $query) or die("Błąd w zapytaniu");

                while ($row = mysqli_fetch_row($result)){
                    echo "<section class='blok_druzyny'><h2>$row[0]</h2><h1>$row[1]</h1><p>grupa: $row[2]</p></section>";
                }

                mysqli_close($connection);

            ?>
        </div>
    </body>
</html>