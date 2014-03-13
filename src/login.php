<?php
        include 'header.php';

?>
<div class="form">
    <?php
       if (filter_input(INPUT_GET, 'form')){
    if (filter_input(INPUT_GET, 'form') == "bad_pass") {
        $msg = "<div class='alert alert-danger'>veillez donner le même mot de passe</div>";
    }elseif (filter_input(INPUT_GET, 'form') == "incomplet") {
        $msg = "<div class='alert alert-danger'>veillez remplir tous les champs du formulaire</div>";
    }
    echo $msg;
}
?>
    <form action="auth.php" method="post" class="form-signin">
        <h2 class="form-signin-heading">Identifiez-vous:</h2>
        Login
        <input type="text" id="username" name="login" placeholder="login" required="required" class="form-control" autofocus />

        Mot de passe
        <input type="password" id="password" name="password" class="form-control" placeholder="mot de passe" required="required" />

        <input class="btn btn-primary" type="submit" id="_submit" name="_submit" value="valider" />
        <br/>

    </form>
</div>
<?php
        include 'footer.php';

