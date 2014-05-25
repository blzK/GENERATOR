<?php
include 'header.php';
include 'auth.php';

if (filter_input(INPUT_GET, 'form')) {
    if (filter_input(INPUT_GET, 'form') == "incomplet") {
        $msg = "<div class='alert alert-danger'>veillez remplir tous les champs du formulaire</div>";
    } elseif (filter_input(INPUT_GET, 'form') == "siren_exist") {
        $msg = "<div class='alert alert-danger'>vous avez choisi un SIREN qui existe déjà</div>";
    }
    echo $msg;
}
?>
<h4 class="titre">Edition d'une société</h4>
<hr/>
<form action="save_societe.php" method="post" class="form-horizontal" role="form">
    <div class="form-group">
        <label for="nom" class="col-sm-2 control-label">Nom de la société</label>
        <div class="col-sm-10">
            <input type="text" name="nom" class="form-control" id="nom" required placeholder="Nom de la société">
        </div>
    </div>
    <div class="form-group">
        <label for="siren" class="col-sm-2 control-label">SIREN</label>
        <div class="col-sm-10">
            <input type="text" name="siren" class="form-control" id="siren" required placeholder="SIREN">
        </div>
    </div>
    <div class="form-group">
        <label for="ape" class="col-sm-2 control-label">Code NAF/APE</label>
        <div class="col-sm-10">
            <input type="text" name="ape" class="form-control" id="ape" required placeholder="Code NAF/APE">
        </div>
    </div>
    <div class="form-group">
        <label for="sect_soc" class="col-sm-2 control-label">Secteur d'activité</label>
        <div class="col-sm-10">
            <input type="text" name="sect_soc" class="form-control" id="sect_soc" required placeholder="Secteur d'activité">
        </div>
    </div>
    <div class="form-group">
        <label for="av_soc" class="col-sm-2 control-label">Conseil de la société</label>
        <div class="col-sm-10">
            <input type="text" name="av_soc" class="form-control" id="av_soc" required placeholder="Conseil de la société">
        </div>
    </div>
    <div class="form-group">
        <label for="type" class="col-sm-2 control-label">Type de la société</label>
        <div class="col-sm-10">
            <input type="text" name="type" class="form-control" id="type" required placeholder="Type de la société">
        </div>
    </div>
    <div class="form-group">
        <label for="ad" class="col-sm-2 control-label">Adresse</label>
        <div class="col-sm-10">
            <textarea name="ad_soc"  rows="3" class="form-control" id="ad" required>Adresse</textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="avad_soc" class="col-sm-2 control-label">Type de la société</label>
        <div class="col-sm-10">
            <input type="text" name="avad_soc" class="form-control" id="avad_soc" required placeholder="Conseil">
        </div>
    </div>
    <div class="form-group">
        <label for="bonis_soc" class="col-sm-2 control-label">Type de la société</label>
        <div class="col-sm-10">
            <input type="text" name="bonis_soc" class="form-control" id="bonis_soc" required placeholder="status">
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


