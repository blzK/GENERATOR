<?php

include 'connect.php';
include 'Fonctions.php';

if (filter_input(INPUT_POST, 'nom') && filter_input(INPUT_POST, 'prenom') &&
        filter_input(INPUT_POST, 'login') && filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL) && filter_input(INPUT_POST, 'mdp') && filter_input(INPUT_POST, 'mdp2')) {
    if (filter_input(INPUT_POST, 'mdp') == filter_input(INPUT_POST, 'mdp2')) {
        $nom = filter_input(INPUT_POST, 'nom');
        $prenom = filter_input(INPUT_POST, 'prenom');
        $login = filter_input(INPUT_POST, 'login');
        $email = filter_input(INPUT_POST, 'email');
        $pass_word = filter_input(INPUT_POST, 'mdp');
        include 'header.php';
        if (Fonctions::setUser($nom, $prenom, $login, $pass_word, $email)) {

            echo "<div class='alert alert-success'> " . $login . " vous êtes enregistré!</div>";
        } else {
            echo "<div class='alert alert-danger'> " . $login . " votre enregistrement a rencontre un problème.</div>";
        }
        echo"<div><a class='btn btn-lg btn-primary' href='index.php'>Retour à l'accueil</a></div>";
        session_start();
        $_SESSION["NAME"] = $nom;
        $_SESSION["USERID"] = mysql_insert_id();
        include 'footer.php';
    } else {
        header("Location:user_form.php?form=bad_pass");
    }
} else {
    header("Location:user_form.php?form=incomplet");
}

