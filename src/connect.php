<?php

$conn = mysql_connect("sqletud.univ-mlv.fr", "eningabi", "web2") or die("erreur au niveau des identifiants, ou nom du serveur");
mysql_select_db("eningabi_db", $conn) or die("Erreur de la connexion à la base de donnée");
