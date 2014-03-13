<?php

include 'connect.php';
include 'Fonctions.php';

if (filter_input(INPUT_POST, 'defenseur') && filter_input(INPUT_POST, 'issue') &&
        filter_input(INPUT_POST, 'id_sal', FILTER_VALIDATE_INT) && filter_input(INPUT_POST, 'id_soc', FILTER_VALIDATE_INT) && filter_input(INPUT_POST, 'id_aud', FILTER_VALIDATE_INT)) {
//    if (Fonctions::exist(filter_input(INPUT_POST, ''))) {
//        header("Location:dossier_form.php?form=exist");
//    } else {
    $defenseur = filter_input(INPUT_POST, 'defenseur');
    $issue = filter_input(INPUT_POST, 'issue');
    $id_sal = filter_input(INPUT_POST, 'id_sal');
    $id_soc = filter_input(INPUT_POST, 'id_soc');
    $id_aud = filter_input(INPUT_POST, 'id_aud');
    $auteur = NULL;
    include 'header.php';
    if (Fonctions::setDossier($defenseur, $issue, $id_sal, $id_soc, $id_aud, $auteur)) {

        echo "<div class='alert alert-success'> Le dossier est enregistré!</div>";
    } else {
        echo "<div class='alert alert-danger'> l' enregistrement a rencontré un problème.</div>";
    }
    echo"<div><a class='btn btn-lg btn-primary' href='index.php'>Retour à l'accueil</a></div>";

    include 'footer.php';
//    }
} else {
    header("Location:dossier_form.php?form=incomplet");
}

