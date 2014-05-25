<?php

include '../connect.php';
require '../Fonctions.php';

if (filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT) && filter_input(INPUT_POST, 'nom') && filter_input(INPUT_POST, 'siren') &&
        filter_input(INPUT_POST, 'ape') && filter_input(INPUT_POST, 'sect_soc') && filter_input(INPUT_POST, 'av_soc') && filter_input(INPUT_POST, 'type') && filter_input(INPUT_POST, 'ad_soc') && filter_input(INPUT_POST, 'avad_soc') && filter_input(INPUT_POST, 'bonis_soc')) {

    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $nom = filter_input(INPUT_POST, 'nom');
    $siren = filter_input(INPUT_POST, 'siren');
    $ape = filter_input(INPUT_POST, 'ape');
    $sect_soc = filter_input(INPUT_POST, 'sect_soc');
    $av_soc = filter_input(INPUT_POST, 'av_soc');
    $type = filter_input(INPUT_POST, 'type');
    $ad_soc = filter_input(INPUT_POST, 'ad_soc');
    $avad_soc = filter_input(INPUT_POST, 'avad_soc');
    $bonis_soc = filter_input(INPUT_POST, 'bonis_soc');
    $auteur = filter_input(INPUT_POST, 'auteur');
    if (Fonctions::updateSociete($id, $nom, $siren, $ape, $sect_soc, $av_soc, $type, $ad_soc, $avad_soc, $bonis_soc, $auteur)) {

        header("Location:../societes.php");
    } else {
        include 'header.php';

        echo "<div class='alert alert-danger'> l' enregistrement a rencontre un problème.</div>";
    }
    echo"<div><a class='btn btn-lg btn-primary' href='../index.php'>Retour à l'accueil</a></div>";

    include 'footer.php';
} else {
    header("Location:societe_form.php?form=incomplet");
}

