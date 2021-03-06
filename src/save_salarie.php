<?php

include 'connect.php';
include 'Fonctions.php';

if (filter_input(INPUT_POST, 'nom_sal') && filter_input(INPUT_POST, 'prenom_sal') &&
        filter_input(INPUT_POST, 'bdate_sal') && filter_input(INPUT_POST, 'nation_sal') && filter_input(INPUT_POST, 'ad_sal') && filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) {
    if (Fonctions::existEmailSal(filter_input(INPUT_POST, 'email'))) {
        header("Location:salarie_form.php?form=mail_exist");
    }
    $nom = filter_input(INPUT_POST, 'nom_sal');
    $prenom = filter_input(INPUT_POST, 'prenom_sal');
    $bdate_sal = filter_input(INPUT_POST, 'bdate_sal');
    $nation_sal = filter_input(INPUT_POST, 'nation_sal');
    $ad_sal = filter_input(INPUT_POST, 'ad_sal');
    $societe_sal = NULL;
    $auteur = filter_input(INPUT_POST, 'auteur');
    $email = filter_input(INPUT_POST, 'email');
    if (Fonctions::setSalarie($nom, $prenom, $bdate_sal, $nation_sal, $ad_sal, $societe_sal, $email, $auteur)) {

        header("Location:salaries.php");
    } else {
        include 'header.php';

        echo "<div class='alert alert-danger'> l' enregistrement a rencontré un problème.</div>";
    }
    echo"<div><a class='btn btn-lg btn-primary' href='index.php'>Retour à l'accueil</a></div>";
    include 'footer.php';
} else {
    header("Location:salarie_form.php?form=incomplet");
}

