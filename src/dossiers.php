<?php
include 'connect.php';
require 'Fonctions.php';
include 'header.php';
?>
<div class="row">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h1 class="panel-title titre">Liste des dossiers</h1>
        </div>
        <div class="panel-body">
            <div class="col-lg-3">
                <h3>Filtrer</h3>
                <form action="" method="post" class="form-horizontal affiche" role="form">
                    <label for="defenseur" class="control-label">Défenseur</label>
                    <div class="">
                        <select id="defenseur" name="defenseur" class="form-control">
                            <option selected="selected" disabled="disabled">Séléctionnez un défenseur</option>
                            <?php foreach (Fonctions::getTables("dossier") as $dossiers => $dossier) : ?>
                                <option value="<?php echo $dossier['defenseur']; ?>"><?php echo $dossier['defenseur']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <label for="sal" class="col-sm control-label">Salarié</label>
                    <div class="">
                        <select id="sal" name="id_sal" class="form-control">
                            <option selected="selected" disabled="disabled">Séléctionnez un salarié</option>
                            <?php foreach (Fonctions::getTables("salarie") as $salaries => $salarie) : ?>
                                <option value="<?php echo $salarie['id']; ?>"><?php echo $salarie['prenom_sal'] . " " . $salarie['nom_sal']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <label for="soc" class="col-sm control-label">Société</label>
                    <div class="col-sm">
                        <select id="soc" name="id_soc" class="form-control">
                            <option selected="selected" disabled="disabled">Séléctionner une société</option>
                            <?php foreach (Fonctions::getTables("societe") as $societes => $societe) : ?>
                                <option value="<?php echo $societe['id']; ?>"><?php echo $societe['nom']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <!--
                    <label for="aud" class="col-sm control-label">Audiance</label>
                    <div class="col-sm">
                        <select id="aud" name="id_aud" class="form-control">
                            <option selected="selected" disabled="disabled">Séléctionner une audiance</option>
                    <?php foreach (Fonctions::getTables("audiance") as $audiances => $audiance) : ?>
                                                                                                                                                    <option value="<?php echo $audiance['id']; ?>"><?php echo $audiance['rg']; ?></option>
                    <?php endforeach; ?>         
                        </select>
                    </div>
                    -->
                    <br/>
                    <div class="col-sm-offset col-sm">
                        <button type="submit" class="btn btn-primary">Filtrer</button>
                        <button class="btn btn-primary">Réinitialiser</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-9">
                <?php
                if (filter_input(INPUT_POST, 'defenseur') ||
                        filter_input(INPUT_POST, 'id_sal', FILTER_VALIDATE_INT) ||
                        filter_input(INPUT_POST, 'id_soc', FILTER_VALIDATE_INT)) :
                    ?>
                    <?php $dossierss = Fonctions::getTablesAndSearch("dossier", filter_input(INPUT_POST, 'defenseur'), filter_input(INPUT_POST, 'id_sal'), filter_input(INPUT_POST, 'id_soc')); ?>
                <?php else : ?>
                    <?php $dossierss = Fonctions::getTables("dossier"); ?>
                <?php endif; ?>
                <?php foreach ($dossierss as $dossiers => $dossier) : ?>
                    <div class="panel panel-primary" id="line_<?php echo $dossier['id']; ?>">
                        <!-- Default panel contents -->
                        <div class="panel-heading">
                            <h4> <?php echo "DOSS_" . $dossier['id']; ?></h4>
                            créé par <?php echo $dossier['auteur']; ?>  le <?php echo Fonctions::dateTimeSqlToFr($dossier['date_doss']); ?>
                        </div>
                        <div class="panel-body">
                            <?php $salarie = Fonctions::getSalarieById($dossier['id_sal']); ?>
                            <?php $societe = Fonctions::getSocieteById($dossier['id_soc']); ?>

                            <h4><b>Salarié</b>: <?php echo $salarie['nom_sal'] . " " . $salarie['prenom_sal']; ?></h4>
                            <h4><b>Entreprise</b>: <?php echo $societe['nom']; ?></h4>
                            <h4><b>Défenseur</b>: <?php echo $dossier['defenseur']; ?></h4>

                            <div class="btn-group">
                                <label class="btn btn-default">
                                    <a href="audiance_form.php?val=<?php echo $dossier['id']; ?>" id="modif_<?php echo $dossier['id']; ?>">
                                        Ajouter une audiance
                                    </a>
                                </label>
                                <label class="btn btn-info">
                                    <a href="manager/modif_dossier_form.php?val=<?php echo $dossier['id']; ?>" id="modif_<?php echo $dossier['id']; ?>">
                                        Modifier
                                    </a>
                                </label>                        
                                <label class="active" id-active="<?php echo $dossier['id']; ?>" id="actif_<?php echo $dossier['id']; ?>" >
                                    <?php if ($dossier['actif'] == 1) : ?>
                                        <div class="btn btn-success">Activé</div>
                                    <?php else : ?>
                                        <div class="btn btn-danger">Désactivé</div>
                                    <?php endif; ?>
                                </label>
                                <label id-delete="<?php echo $dossier['id']; ?>" class="delete btn btn-danger" id="sup_<?php echo $dossier['id']; ?>">
                                    Supprimer
                                </label>
                            </div>

                            </p>
                        </div>

                        <!-- Table -->
                        <div class="panel panel-info col-lg-offset-1">
                            <div class="panel-heading">
                                <h1 class="panel-title titre">Liste des audiences</h1>
                            </div>
                            <div class="panel-body">
                                <table class="table table-condensed table-striped">
                                    <tr><th>RG</th><th>Juridiction</th><th>Type d'audience</th><th>Section</th><th>Date d'audience</th><th>Auteur</th><th>Modifier</th><th>Supprimer</th></tr>
                                    <?php foreach (Fonctions::getAudienceByIdDossier($dossier['id']) as $audiances => $audiance) : ?>
                                        <tr id="line-audiance_<?php echo $audiance['id']; ?>">
                                            <td><?php echo $audiance['rg']; ?></td>
                                            <td><?php echo $audiance['jurdiction']; ?></td>
                                            <td><?php echo $audiance['type_aud']; ?></td>
                                            <td><?php echo $audiance['sect_aud']; ?></td>
                                            <td><?php echo Fonctions::dateTimeSqlToFr($audiance['date_aud']); ?></td>
                                            <td><?php echo $audiance['auteur']; ?></td>
                                            <td>
                                                <a href="manager/modif_audiance_form.php?val=<?php echo $audiance['id']; ?>" class="btn btn-primary" id="modif-audiance_<?php echo $audiance['id']; ?>">
                                                    Modifier
                                                </a>
                                            </td>
                                            <td>
                                                <label id-delete-audiance="<?php echo $audiance['id']; ?>" class="delete-audiance btn btn-danger" id="sup-audiance_<?php echo $audiance['id']; ?>">
                                                    Supprimer
                                                </label>
                                            </td>
                                        </tr> 
                                    <?php endforeach; ?>
                                </table>                    </div>
                        </div>

                    </div>

                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function() {
        $(".active").click(function() {
            var id = $(this).attr("id-active");
            $("#actif_" + id).load("manager/active_dossier.php?val=" + id)
        });
        $(".delete").click(function() {
            var id = $(this).attr("id-delete");
            if (confirm('Etes-vous sûr de vouloir supprimer ce dossier ?')) {
                $("#sup_" + id).load("manager/delete_dossier.php?val=" + id)
                $("#line_" + id).hide();
            }
        });
        $(".delete-audiance").click(function() {
            var id = $(this).attr("id-delete-audiance");
            if (confirm('Etes-vous sûr de vouloir supprimer cette audience ?')) {
                $("#sup-audiance_" + id).load("manager/delete_audiance.php?val=" + id)
                $("#line-audiance_" + id).hide();
            }
        });
    });
</script>
<?php
include 'footer.php';
