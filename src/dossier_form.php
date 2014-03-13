<?php
include 'connect.php';
include 'Fonctions.php';
include 'header.php';
if (filter_input(INPUT_GET, 'form')) {
    if (filter_input(INPUT_GET, 'form') == "incomplet") {
        $msg = "<div class='alert alert-danger'>veillez remplir tous les champs du formulaire</div>";
    } elseif (filter_input(INPUT_GET, 'form') == "exist") {
        $msg = "<div class='alert alert-danger'>vous avez choisi un SIREN qui existe déjà</div>";
    }
    echo $msg;
}
?>
<h4 class="titre">Edition d'un dossier</h4>
<hr/>
<form action="save_dossier.php" method="post" class="form-horizontal" role="form">
    <div class="form-group">
        <label for="defenseur" class="col-sm-2 control-label">Défenseur</label>
        <div class="col-sm-10">
            <input type="text" name="defenseur" class="form-control" id="defenseur" required placeholder="defenseur">
        </div>
    </div>
    <div class="form-group">
        <label for="issue" class="col-sm-2 control-label">Issue</label>
        <div class="col-sm-10">
            <input type="text" name="issue" class="form-control" id="issue" required placeholder="issue">
        </div>
    </div>
    <div class="form-group">
        <label for="sal" class="col-sm-2 control-label">Salarié</label>
        <div class="col-sm-10">
            <select id="sal" name="id_sal" class="form-control">
                <option selected="selected" disabled="disabled">Séléctionnez un salarié</option>
                <?php foreach (Fonctions::getTables("salarie") as $salaries => $salarie) : ?>
                    <option value="<?php echo $salarie['id']; ?>"><?php echo $salarie['prenom_sal'] . " " . $salarie['nom_sal']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="soc" class="col-sm-2 control-label">Société</label>
        <div class="col-sm-10">
            <select id="soc" name="id_soc" class="form-control">
                <option selected="selected" disabled="disabled">Séléctionner une société</option>
                <?php foreach (Fonctions::getTables("societe") as $societes => $societe) : ?>
                    <option value="<?php echo $societe['id']; ?>"><?php echo $societe['nom']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="aud" class="col-sm-2 control-label">Audiance</label>
        <div class="col-sm-10">
            <select id="aud" name="id_aud" class="form-control">
                <option selected="selected" disabled="disabled">Séléctionner une audiance</option>
                <?php foreach (Fonctions::getTables("audiance") as $audiances => $audiance) : ?>
                    <option value="<?php echo $audiance['id']; ?>"><?php echo $audiance['rg']; ?></option>
                <?php endforeach; ?>         
            </select>
        </div>
    </div>


    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Valider</button>
            <button type="reset" class="btn btn-danger col-sm-offset-2">Annuler</button>
        </div>
    </div>
</form>

<?php
include 'footer.php';
?>

