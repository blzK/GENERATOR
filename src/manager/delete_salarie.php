<?php
include '../connect.php';
require '../Fonctions.php';
$id = filter_input(INPUT_GET, "val");
$dossier=Fonctions::supprimeSalarie($id);
