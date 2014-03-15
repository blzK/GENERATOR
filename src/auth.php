<?php

session_start();


if (!(isset($_SESSION["AUTH"]) && $_SESSION["AUTH"] == 1)) {
    if (!isset($_POST["login"]) || !isset($_POST["password"])) {
        $badlogin = 0;
        include("login.php");
        exit();
    }
// Verification Login

        //header("Location:user_form.php?form=bad_pass");

    include "connect.php";
    $login = $_POST["login"];
    $passwd = $_POST["password"];

    $SQL = "SELECT id,nom
             FROM user
             WHERE login='$login' AND pass_word='$passwd' ";
    $res = mysql_query($SQL);

    if (!$res || !(mysql_num_rows($res) > 0)) {
        $badlogin = 1;
        include("login.php");
        exit();
    } else {
        $_SESSION["AUTH"] = 1;
        $row = mysql_fetch_array($res);
        $_SESSION["NAME"] = $row['nom'];
        $_SESSION["USERID"] = $row['id'];
    }

    mysql_close($conn);
}
