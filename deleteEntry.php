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
              $showAll = "SELECT * FROM tbl_personen;";
              mysqli_query($conn, "SET NAMES UTF8");
              $result = mysqli_query($conn, $showAll) or die (mysqli_error($conn));
              $dsAnzahl = mysqli_num_rows($result); // ermittelt Zeilen
              $feldAnzahl = mysqli_num_fields($result); // ermittelt spalten
                /*
              echo "<p>".$feldAnzahl." Spalten</p>";
              echo "<p>".$dsAnzahl." Datensätze</p>";
              echo "<hr>";
              */
             // ----------------Überschriften anzeigen -------------------------------
             echo "<div class='hl_del'>";
             $ds = mysqli_fetch_assoc($result);
             echo "<div class='headline'>AUSWAHL</div>";
             foreach ($ds as $index => $wert) {
                 echo "<div class='headline'>".strtoupper($index)."</div>";
             }
          
             // -------------- Inhalte anzeigen ---------------------------------------
             /* Setz den index wieder auf null, damit wieder von vorn angefangen wird*/
             mysqli_data_seek($result,0); 
             for ($i = 0; $i < $dsAnzahl; $i++) {
                $ds = mysqli_fetch_row($result); // extrahiert jeden Datensatz
                echo "<div class='inhalte'><input type='radio' name='del'></div>"; // Werte anzeigen
                foreach ($ds as $wert) {
                    echo "<div class='inhalte'>".$wert."</div>"; // Werte anzeigen
                }
            }   
            echo "</div>";
        ?>
        <button onclick="window.location.href = 'showTable.php'">Daten anzeigen</button>
    </body>
</html>