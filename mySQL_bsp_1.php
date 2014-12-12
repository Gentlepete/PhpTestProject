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
        include "db_connection.php";
        
        $con = new connection();
        $con->connect();
        
        $val = $con->query("SELECT 1 FROM spieler");
        if($val !== FALSE)
        {
           echo "<p>Tabelle existiert</p>";
        }
        else
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

        while($dsatz = mysqli_fetch_assoc($res))
        {
//            foreach($dsatz as $key => $value)
//            {
//                echo $value . "<br>";
//            }
            echo $dsatz["name"]
                .$dsatz["anzahl_spiele"]
                .$dsatz["anzahl_gewinne"]
                ."<br>";    
        }

        $con->close();
        ?>
        <a href="create_spieler.html">Neuer Spieler</a>
    </body>
</html>
