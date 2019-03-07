<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Datensatz löschen!</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
        <script src="myfunctions.js"></script>
        
    </head>
    <body>
        <h1>Datensatz löschen!</h1>
        <hr>
        <?php
             if (isset($_POST['del'])) {   
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
    
                /* 
                * Eingabe der Formularfelder in Variablen speichern
                * Die mysqli_real_escape_string() Funktion dient zum maskieren von Zeichen, 
                * welche sonst in einem SQL statement stören würden.
                */
                
                $id = mysqli_real_escape_string($conn, $_POST['del']);
    
                // Werte der Variablen in die Datenbankanweisung packen
                $query = "DELETE FROM php_database.tbl_personen WHERE PersonalNr = ".$id;
        
                mysqli_query($conn, $query) or die (mysqli_error($conn));
    
                mysqli_close($conn);
            }
        ?>
        <button onclick="window.location.href = 'showTable.php'">Daten anzeigen</button>
    </body>
</html>