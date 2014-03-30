<?php

include '../connect.php';
require '../Fonctions.php';


if (filter_input(INPUT_POST, 'defenseur') && filter_input(INPUT_POST, 'issue') &&
        filter_input(INPUT_POST, 'id_sal', FILTER_VALIDATE_INT) && filter_input(INPUT_POST, 'id_soc', FILTER_VALIDATE_INT) && filter_input(INPUT_POST, 'id_aud', FILTER_VALIDATE_INT)) {

    $defenseur = filter_input(INPUT_POST, 'defenseur');
    $issue = filter_input(INPUT_POST, 'issue');
    $id_sal = filter_input(INPUT_POST, 'id_sal');
    $id_soc = filter_input(INPUT_POST, 'id_soc');
    $id_aud = filter_input(INPUT_POST, 'id_aud');
    $auteur = NULL;
    Fonctions::updateDossier($defenseur, $issue, $id_sal, $id_soc, $id_aud, $auteur);
    header("Location:dossier_form.php?form=incomplet");
} else {
    header("Location:dossier_form.php?form=incomplet");
}

