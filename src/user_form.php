<?php
include 'header.php';
if (filter_input(INPUT_GET, 'form')) {
    if (filter_input(INPUT_GET, 'form') == "bad_pass") {
        $msg = "<div class='alert alert-danger'>veillez donner le même mot de passe</div>";
    } elseif (filter_input(INPUT_GET, 'form') == "incomplet") {
        $msg = "<div class='alert alert-danger'>veillez remplir tous les champs du formulaire</div>";
    }
    echo $msg;
}
?>
<div class="panel panel-warning col-sm-offset-1 col-lg-10 col-sm-offset-1">
    <div class="panel-heading">
        <h3 class="panel-title titre">Edition d'un utilisateur</h3>
    </div>
    <div class="panel-body">
        <form action="save_user.php" method="post" class="form-horizontal" role="form">
            <div class="form-group">
                <label for="nom" class="col-sm-2 control-label">Nom</label>
                <div class="col-sm-10">
                    <input type="text" name="nom" class="form-control" id="nom" required placeholder="nom">
                </div>
            </div>
            <div class="form-group">
                <label for="prenom" class="col-sm-2 control-label">Prénom</label>
                <div class="col-sm-10">
                    <input type="text" name="prenom" class="form-control" id="prenom" required placeholder="prénom">
                </div>
            </div>
            <div class="form-group">
                <label for="login" class="col-sm-2 control-label">Login</label>
                <div class="col-sm-10">
                    <input type="text" name="login" class="form-control" id="login" required placeholder="Login">
                </div>
            </div>
            <div class="form-group">
                <label for="pw" class="col-sm-2 control-label">Mot de passe</label>
                <div class="col-sm-10">
                    <input type="password" name="mdp" class="form-control" id="pw" required placeholder="Mot de passe">
                </div>
            </div>
            <div class="form-group">
                <label for="pw2" class="col-sm-2 control-label">Retaper le mot de passe</label>
                <div class="col-sm-10">
                    <input type="password" name="mdp2" class="form-control" id="pw2" required placeholder="Mot de passe">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="email" required placeholder="Email">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Valider</button>
                    <button type="reset" class="btn btn-danger col-sm-offset-2">Annuler</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
include 'footer.php';
?>

