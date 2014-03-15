<?php

$conn = mysql_connect("localhost", "web2", "") or die("impossible de trouver localhost");
mysql_select_db("web2", $conn) or die("Erreur de la connexion à la base de donnée");