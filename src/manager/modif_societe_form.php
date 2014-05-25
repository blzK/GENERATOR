<?php
session_start();

include 'header.php';
include '../connect.php';
require '../Fonctions.php';

if (filter_input(INPUT_GET, 'val')) {
    $societe = Fonctions::getSocieteById(filter_input(INPUT_GET, 'val'));
}
if (filter_input(INPUT_GET, 'form')) {
    if (filter_input(INPUT_GET, 'form') == "incomplet") {
        $msg = "<div class='alert alert-danger'>veillez remplir tous les champs du formulaire</div>";
    }
    echo $msg;
}
?>

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title titre">Edition d'une société</h3>
    </div>
    <div class="panel-body">
        <form action="update_societe.php" method="post" class="form-horizontal" role="form">
            <input type="hidden" name="id" value="<?php echo $societe['id']; ?>">
            <input type="hidden" name="auteur" value="<?php echo $_SESSION["NAME"]; ?>">
            <div class="form-group">
                <label for="nom" class="col-sm-2 control-label">Nom de la société</label>
                <div class="col-sm-10">
                    <input type="text" name="nom" value="<?php echo $societe['nom']; ?>" class="form-control" id="nom" required placeholder="Nom de la société">
                </div>
            </div>
            <div class="form-group">
                <label for="siren" class="col-sm-2 control-label">SIREN</label>
                <div class="col-sm-10">
                    <input type="text" name="siren" value="<?php echo $societe['siren']; ?>" class="form-control" id="siren" required placeholder="SIREN">
                </div>
            </div>
            <div class="form-group">
                <label for="ape" class="col-sm-2 control-label">Code NAF/APE</label>
                <div class="col-sm-10">
                    <input type="text" name="ape" value="<?php echo $societe['ape']; ?>" class="form-control" id="ape" required placeholder="Code NAF/APE">
                </div>
            </div>
            <div class="form-group">
                <label for="sect_soc" class="col-sm-2 control-label">Secteur d'activité</label>
                <div class="col-sm-10">
                    <input type="text" name="sect_soc" value="<?php echo $societe['sect_soc']; ?>" class="form-control" id="sect_soc" required placeholder="Secteur d'activité">
                </div>
            </div>
            <div class="form-group">
                <label for="av_soc" class="col-sm-2 control-label">Conseil de la société</label>
                <div class="col-sm-10">
                    <input type="text" name="av_soc" value="<?php echo $societe['av_soc']; ?>" class="form-control" id="av_soc" required placeholder="Conseil de la société">
                </div>
            </div>
            <div class="form-group">
                <label for="type" class="col-sm-2 control-label">Type de la société</label>
                <div class="col-sm-10">
                    <input type="text" name="type" value="<?php echo $societe['type']; ?>" class="form-control" id="type" required placeholder="Type de la société">
                </div>
            </div>
            <div class="form-group">
                <label for="ad" class="col-sm-2 control-label">Adresse</label>
                <div class="col-sm-10">
                    <textarea name="ad_soc"  rows="3" class="form-control" id="ad" required><?php echo $societe['ad_soc']; ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="avad_soc" class="col-sm-2 control-label">Avad_soc</label>
                <div class="col-sm-10">
                    <input type="text" name="avad_soc" value="<?php echo $societe['avad_soc']; ?>" class="form-control" id="avad_soc" required placeholder="avad_soc">
                </div>
            </div>
            <div class="form-group">
                <label for="bonis_soc" class="col-sm-2 control-label">Bonis de la société</label>
                <div class="col-sm-10">
                    <input type="text" name="bonis_soc"  value="<?php echo $societe['bonis_soc']; ?>" class="form-control" id="bonis_soc" required placeholder="bonis">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Modifier</button>
                    <button type="reset" class="btn btn-danger col-sm-offset-2">Annuler</button>
                </div>
            </div>
        </form>  </div>
</div>

<?php
include 'footer.php';


