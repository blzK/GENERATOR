<?php

include 'connect.php';
include 'Fonctions.php';

if (filter_input(INPUT_POST, 'rg') && filter_input(INPUT_POST, 'jurdiction') &&
        filter_input(INPUT_POST, 'type_aud') && filter_input(INPUT_POST, 'sect_aud') && filter_input(INPUT_POST, 'id_dossier', FILTER_VALIDATE_INT)) {
//    if (Fonctions::existRg(filter_input(INPUT_POST, 'rg'))) {
//        header("Location:audiance_form.php?form=siren_exist");
//    } else {
    $rg = filter_input(INPUT_POST, 'rg');
    $jurdiction = filter_input(INPUT_POST, 'jurdiction');
    $type_aud = filter_input(INPUT_POST, 'type_aud');
    $sect_aud = filter_input(INPUT_POST, 'sect_aud');
    $date_aud = filter_input(INPUT_POST, 'date_aud');
    $id_dossier = filter_input(INPUT_POST, 'id_dossier');
    $auteur = filter_input(INPUT_POST, 'auteur');
    if (Fonctions::setAudiance($rg, $jurdiction, $type_aud, $sect_aud, $id_dossier, $auteur)) {

        header("Location:dossiers.php");
    } else {
        include 'header.php';

        echo "<div class='alert alert-danger'> l' enregistrement a rencontré un problème.</div>";
    }
    echo"<div><a class='btn btn-lg btn-primary' href='index.php'>Retour à l'accueil</a></div>";

    include 'footer.php';
//    }
} else {
    header("Location:audiance_form.php?form=incomplet");
}

