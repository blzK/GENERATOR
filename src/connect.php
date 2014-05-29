<?php

$conn = mysql_connect("localhost", "root", "pass") or die("erreur au niveau des identifiants, ou nom du serveur");
mysql_select_db("web2", $conn) or die("Erreur de la connexion à la base de donnée");
