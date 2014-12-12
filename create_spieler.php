<?php

include "db_connection.php";
$con = new connection();
$con->connect();
$name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
echo "<p>Name: $name</p>";
$sql = "INSERT INTO `spieler` (`name`, `anzahl_spiele`, `anzahl_gewinne`) VALUES ('$name', 0, 0)";
$con->query($sql);
$con->close();
header("Location: mySQL_bsp_1.php");

