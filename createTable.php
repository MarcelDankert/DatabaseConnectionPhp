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

            // Create database
            mysqli_query($conn, "DROP DATABASE IF EXISTS kaffeeautomat;");
            $sql = "CREATE DATABASE kaffeeautomat;";
            if (mysqli_query($conn, $sql)) {
                echo "Database created successfully" . "<hr>";
                
            } else {
                echo "Error creating database: " . mysqli_error($conn) . "<hr>";
            }

            // sql to create table
            $sql = "CREATE TABLE tbl_personen (
                personalNr INT(11) AUTO_INCREMENT PRIMARY KEY, 
                firstname VARCHAR(30) NOT NULL,
                lastname VARCHAR(30) NOT NULL,
                gehalt DECIMAL(6,2) NOT NULL, 
                geburtstag DATE NOT NULL
                );";
                mysqli_query($conn, "USE kaffeeautomat;");
                if (mysqli_query($conn, $sql)) {
                    echo "Table tbl_personen created successfully<hr>";
                } else {
                    echo "Error creating table: " . mysqli_error($conn). "<hr>";
                }   
            $addPeople = "  INSERT INTO tbl_personen
                            VALUES
                            (null, 'Page', 'Jimmy', 9500.50, '1990-03-20'),
                            (null, 'Lord', 'John', 599.99, '1977-10-10'),
                            (null, 'Beck', 'Jeff', 0.99, '2000-01-05');
            "; 
             if (mysqli_query($conn, $addPeople)) {
                echo "Entitys created";
            } else {
                echo "Error creating entitys: " . mysqli_error($conn);
            } 
            echo "<hr>";
            mysqli_close($conn);
        ?>
        <button onclick="window.location.href = 'showTable.php'">Daten anzeigen</button>
       </body>
</html>