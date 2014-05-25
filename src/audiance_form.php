<?php
include 'header.php';
require 'Fonctions.php';
include 'connect.php';

if (filter_input(INPUT_GET, 'val')) {
    $dossier = Fonctions::getDossierById(filter_input(INPUT_GET, 'val'));
}
?>

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title titre">Edition d'une audience</h3>
    </div>
    <div class="panel-body">
        <form action="save_audiance.php" method="post" class="form-horizontal" role="form">
            <input type="hidden" name="auteur" value="<?php echo $_SESSION["NAME"]; ?>">
            <div class="form-group">
                <label for="rg" class="col-sm-2 control-label">RG</label>
                <div class="col-sm-10">
                    <input type="text" name="rg" class="form-control" id="rg" required placeholder="rg">
                </div>
            </div>
            <div class="form-group">
                <label for="jurdiction" class="col-sm-2 control-label">Juridiction</label>
                <div class="col-sm-10">
                    <input type="text" name="jurdiction" class="form-control" id="jurdiction" required placeholder="juridiction">
                </div>
            </div>

            <div class="form-group">
                <label for="type_aud" class="col-sm-2 control-label">type d'audience</label>
                <div class="col-sm-10">
                    <input type="text" name="type_aud" class="form-control" id="type_aud" required placeholder="type d'audience">
                </div>
            </div>
            <div class="form-group">
                <label for="sect_aud" class="col-sm-2 control-label">section</label>
                <div class="col-sm-10">
                    <input type="text" name="sect_aud" class="form-control" id="sect_aud" required placeholder="section">
                </div>
            </div>

            <input type="hidden" id="id_dossier" name="id_dossier" value="<?php echo $dossier['id']; ?>">

            <div class="form-group">
                <label for="date_aud" class="col-sm-2 control-label">date de l'audience</label>
                <div class="col-sm-10">
                    <input type="date" name="date_aud" class="form-control" id="sect_aud" required placeholder="date de l'audience">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary" >Valider</button>
                    <button type="reset" class="btn btn-danger col-sm-offset-2" >Annuler</button>
                </div>
            </div>
        </form>
    </div>
</div>


<?php
include 'footer.php';
?>

