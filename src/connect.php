<?php

$conn = mysql_connect("localhost", "root", "") or die("impossible de trouver localhost");
mysql_select_db("web2", $conn) or die("Errer de la connexion à la base de donnée");