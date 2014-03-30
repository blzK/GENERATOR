<?php

include '../connect.php';
require '../Fonctions.php';

if (filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT) && filter_input(INPUT_POST, 'rg') && filter_input(INPUT_POST, 'jurdiction') &&
        filter_input(INPUT_POST, 'type_aud') && filter_input(INPUT_POST, 'sect_aud') && filter_input(INPUT_POST, 'date_aud')) {

    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $rg = filter_input(INPUT_POST, 'rg');
    $jurdiction = filter_input(INPUT_POST, 'jurdiction');
    $type_aud = filter_input(INPUT_POST, 'type_aud');
    $sect_aud = filter_input(INPUT_POST, 'sect_aud');
    $date_aud = filter_input(INPUT_POST, 'date_aud');
    $auteur = NULL;
    Fonctions::updateAudiance($id, $rg, $jurdiction, $type_aud, $sect_aud, $date_aud, $auteur);
    header("Location:../audiances.php");
} else {
    header("Location:modif_audiance_form.php?form=incomplet");
}

