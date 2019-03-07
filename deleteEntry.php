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
              error_reporting(E_ALL|E_STRICT);
              $servername = "localhost";
              $username = "root";
              $password = "";
              // Create connection
              $conn = mysqli_connect($servername, $username, $password, 'php_database');
              // Check connection
              if (!$conn) {
                  die("Connection failed: " . mysqli_connect_error());
              }
              
        ?>
        <button onclick="window.location.href = 'showTable.php'">Daten anzeigen</button>
    </body>
</html>