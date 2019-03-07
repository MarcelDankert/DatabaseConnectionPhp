<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Datenbank und Tabellen erstellen</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
        <script src="myfunctions.js"></script>
        
    </head>
    <body>
        <h2>Datenbank php_database und Tabelle erstellen</h2>
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

            // Create database
            mysqli_query($conn, "DROP DATABASE IF EXISTS php_database;");
            $sql = "CREATE DATABASE php_database;";
            if (mysqli_query($conn, $sql)) {
                echo "Datenbank wurde erstellt" . "<hr>";
                
            } else {
                echo "Fehler beim Erstellen der Datenbank: " . mysqli_error($conn) . "<hr>";
            }

            // sql to create table
            $sql = "CREATE TABLE php_database.tbl_personen (
                personalNr INT(11) AUTO_INCREMENT PRIMARY KEY, 
                vorname VARCHAR(30) NOT NULL,
                nachname VARCHAR(30) NOT NULL,
                gehalt DECIMAL(6,2) NOT NULL, 
                geburtstag DATE NOT NULL
                );";
                mysqli_query($conn, "USE php_database;");
                if (mysqli_query($conn, $sql)) {
                    echo "Tabelle tbl_personen wurde erstellt :-)<hr>";
                } else {
                    echo "Fehler beim Erstellen der Tabelle: " . mysqli_error($conn). "<hr>";
                }   
            $addPeople = "  INSERT INTO tbl_personen
                            VALUES
                            (null, 'Page', 'Jimmy', 9500.50, '1990-03-20'),
                            (null, 'Lord', 'John', 599.99, '1977-10-10'),
                            (null, 'Schwammkopf', 'Spongebob', 1599.99, '1999-11-11'),
                            (null, 'Star', 'Patrick',  99.99, '2000-02-02'),
                            (null, 'Mustermann', 'Max', 55.55, '1977-10-10'),
                            (null, 'Musterfrau', 'Maria', 777.77, '1977-10-10'),
                            (null, 'Dankert', 'Marcel', 9999.99, '1982-04-24');
            "; 
             if (mysqli_query($conn, $addPeople)) {
                echo "Datensätze eingefügt";
            } else {
                echo "Fehler beim Erstellen der Datensätze: " . mysqli_error($conn);
            } 
            echo "<hr>";
            mysqli_close($conn);
        ?>
        <button onclick="window.location.href = 'showTable.php'">Daten anzeigen</button>
       </body>
</html>