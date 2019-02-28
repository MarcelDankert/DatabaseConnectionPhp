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
        <h2>Datenbank Kaffeautomat und Tabelle erstellen</h2>
        <?php
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

            echo "<hr>";
            mysqli_close($conn);
        ?>
        <button onclick="window.location.href = 'showTable.php'">Daten anzeigen</button>
       </body>
</html>