<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Würfelspiel</title>
    </head>
    <body>
        <h1>Würfelspiel</h1>
        <?php
        require_once "db_connection.php";
        
        $con = new connection();
        $con->connect();
        
        $val = $con->query("SELECT 1 FROM spieler");
        if($val == FALSE)
        {
            echo "<p>Tabelle existiert nicht und wird erstellt.</p>";
            $sql = "CREATE TABLE spieler (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    name VARCHAR(30) NOT NULL,
                    anzahl_spiele INT,
                    anzahl_gewinne INT
                    )";
            $con->query($sql);
        }
        
        $sql = "SELECT * FROM `spieler`";
        $res = $con->query($sql);
        
        echo "<table border=1>"
                . "<tr>"
                    . "<td>Name</td>"
                    . "<td>Gespielte Spiele</td>"
                    . "<td>Gewonnene Spiele</td>"
                . "<tr>";
                while($dsatz = mysqli_fetch_assoc($res))
                {
                    echo "<tr>"
                        ."<td>".$dsatz['name']."</td>"
                        ."<td>".$dsatz['anzahl_spiele']."</td>"
                        ."<td>".$dsatz['anzahl_gewinne']."</td>"
                        ."</tr>";    
                }
        echo "</table>";

        $con->close();
        ?>
        <br>
        <a href="create_spieler.html">Neuer Spieler</a><br>
        <a href="neues_spiel.html">Neues Spiel</a>
        
    </body>
</html>
