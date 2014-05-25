<?php

include '../connect.php';
require '../Fonctions.php';


if (filter_input(INPUT_POST, 'defenseur') && filter_input(INPUT_POST, 'issue') &&
        filter_input(INPUT_POST, 'id_sal', FILTER_VALIDATE_INT) && filter_input(INPUT_POST, 'id_soc', FILTER_VALIDATE_INT) && filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT)) {

    $defenseur = filter_input(INPUT_POST, 'defenseur');
    $issue = filter_input(INPUT_POST, 'issue');
    $id_sal = filter_input(INPUT_POST, 'id_sal');
    $id_soc = filter_input(INPUT_POST, 'id_soc');
    $auteur = filter_input(INPUT_POST, 'auteur');
    $id = filter_input(INPUT_POST, 'id');
    if (Fonctions::updateDossier($id, $defenseur, $issue, $id_sal, $id_soc, $auteur)) {
        header("Location:../dossiers.php");
    } else {
        include '../header.php';
        echo "<div class='alert alert-danger'> l' enregistrement a rencontré un problème.</div>";
    }
    echo"<div><a class='btn btn-lg btn-primary' href='../index.php'>Retour à l'accueil</a></div>";

    include 'footer.php';
} else {
    header("Location:dossier_form.php?form=incomplet");
}

