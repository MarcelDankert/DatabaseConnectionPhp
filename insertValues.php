<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Datensatz hinzufügen</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="myfunctions.js"></script>

</head>

<body>
    <h1>Datensatz hinzufügen</h1>
    <hr>
    <?php
    if (isset($_POST['submit'])) {   
            error_reporting(E_ALL|E_STRICT);
            $servername = "localhost";
            $username = "root";
            $password = "";
            // Create connection
            $conn = mysqli_connect($servername, $username, $password);
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Eingabe der Formularfelder in Variablen speichern
            $vorname = mysqli_real_escape_string($conn, $_POST['vorname']);
            $nachname = mysqli_real_escape_string($conn, $_POST['nachname']);
            $gehalt = mysqli_real_escape_string($conn, $_POST['gehalt']);
            $geburtstag = mysqli_real_escape_string($conn, $_POST['geburtstag']);

            // Werte der Variablen in die Datenbankanweisung packen
            $query = "INSERT INTO php_database.tbl_personen
                      VALUES
                      (null,'".$vorname."','".$nachname."',".$gehalt.",'".$geburtstag."')";

            mysqli_query($conn, "SET NAMES UTF8");

            mysqli_query($conn, $query);

            mysqli_close($conn);
        }
        ?>
    <div id="wrapper">
        <form action="./insertValues.php" method="post">
            <fieldset>
                <legend>Neuen Datensatz anlegen</legend>
                <div class="form">
                    <label for="vorname">Vorname*</label>
                    <input type="text" id="vorname" name="vorname" maxlength="300" required>
                </div>
                <div class="form">
                    <label for="nachname">Nachname*</label>
                    <input type="text" id="nachname" name="nachname" maxlength="300" required>
                </div>
                <div class="form">
                    <label for="gehalt">Gehalt*</label>
                    <input type="number" step="0.01" id="gehalt" name="gehalt" maxlength="5" required>
                </div>
                <div class="form">
                    <label for="geburtstag">Geburtstag*</label>
                    <input type="date" id="geburtstag" name="geburtstag" required>
                </div>
                <div class="form">
                <label> </label>
                    <input type="submit" name="submit" value="Datensatz speichern">
                </div>
            </fieldset>
        </form>

    </div>
    <button onclick="window.location.href = 'showTable.php'">Daten anzeigen</button>
</body>

</html>