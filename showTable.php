<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Datensätze anzeigen!</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
        <script src="myfunctions.js"></script>
        
    </head>
    <body>
        <h1>Datensätze anzeigen!</h1>
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
              $showAll = "SELECT * FROM tbl_personen;";
              mysqli_query($conn, "SET NAMES UTF8");
              $result = mysqli_query($conn, $showAll) or die (mysqli_error($conn));
              $dsAnzahl = mysqli_num_rows($result);
              $feldAnzahl = mysqli_num_fields($result);
                /*
              echo "<p>".$feldAnzahl." Spalten</p>";
              echo "<p>".$dsAnzahl." Datensätze</p>";
              echo "<hr>";
              */
             // Überschriften anzeigen
             echo "<div class='hl'>";
             $ds = mysqli_fetch_assoc($result);
             foreach ($ds as $index => $wert) {
                 echo "<div class='headline'>".strtoupper($index)."</div>";
             }
          
             // -------------- Inhalte anzeigen ---------------------------------------
             /* Setz den index wieder auf null, damit wieder von vorn angefangen wird*/
             mysqli_data_seek($result,0); 
             for ($i = 0; $i < $dsAnzahl; $i++) {
                $ds = mysqli_fetch_assoc($result);
                foreach ($ds as $wert) {
                    echo "<div class='inhalte'>".$wert."</div>";
                }
            }   
            echo "</div>";
            /*
            echo '<table border="1">';
            while ($zeile = mysqli_fetch_assoc($ds))
            {
              echo "<tr>";
              echo "<td>". $zeile['personalNr'] . "</td>";
              echo "<td>". $zeile['vorname'] . "</td>";
              echo "<td>". $zeile['nachname'] . "</td>";
              echo "<td>". $zeile['gehalt'] . "</td>";
              echo "<td>". $zeile['geburtstag'] . "</td>";
              echo "</tr>";
            }
            echo "</table>";
            */
        ?>
        <button onclick="window.location.href = 'createTable.php'">Datensatz hinzufügen</button>
    </body>
</html>