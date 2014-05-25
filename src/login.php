<?php
session_start();

include 'header.php';
?>
<div class="form">
    <?php
    if (filter_input(INPUT_GET, 'form')) {
        if (filter_input(INPUT_GET, 'form') == "bad_pass") {
            $msg = "<div class='alert alert-danger'>veillez donner le même mot de passe</div>";
        } elseif (filter_input(INPUT_GET, 'form') == "incomplet") {
            $msg = "<div class='alert alert-danger'>veillez remplir tous les champs du formulaire</div>";
        }
        echo $msg;
    }
    ?>
    <form action="" method="post" class="form-signin">
        <h2 class="form-signin-heading">Identifiez-vous:</h2>
        <label for="username" data-type="u">  Login:</label>
        <input type="text" id="username" name="login" placeholder="login" required="required" class="form-control" autofocus />

        
        <label for="password" data-type="u">  Mot de passe:</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="mot de passe" required="required" />

        <input class="btn btn-primary" type="submit" id="_submit" name="_submit" value="valider" />
        <br/>

    </form>
</div>
<?php
include 'footer.php';

