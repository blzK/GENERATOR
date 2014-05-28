<?php
//include 'auth.php';
include 'connect.php';
require 'Fonctions.php';
include 'header.php';
?>
<div class="row">
    <div class="panel panel-warning col-lg-offset-1 col-lg-10 col-lg-offset-1">
        <div class="panel-heading">
            <h1 class="panel-title titre">Liste des sociétés</h1>
        </div>

        <div class="panel-body">
            <form class="form-inline" role="form" action="" method="post">
                <div class="form-group">
                    <input type="search" name="chercher" class="form-control" id="chercher" placeholder="chercher par nom ou siren">
                </div>

                <button type="submit" class="btn btn-default">Chercher</button>
            </form>
            <br/>

            <table class="table table-condensed table-striped">
                <?php if (filter_input(INPUT_POST, 'chercher')) : ?>
                    <?php $societess = Fonctions::getSearchSociete("societe", filter_input(INPUT_POST, 'chercher')); ?>
                <?php else : ?>
                    <?php $societess = Fonctions::getTables("societe"); ?>
                <?php endif; ?>
                <tr><th>Nom</th><th>Siren</th><th>APE</th><th>Conseil</th><th>Auteur</th><th>Modifier</th><th>Supprimer</th></tr>
                <?php foreach ($societess as $societes => $societe) : ?>
                    <tr id="line_<?php echo $societe['id']; ?>">
                        <td><?php echo $societe['nom']; ?></td>
                        <td><?php echo $societe['siren']; ?></td>
                        <td><?php echo $societe['ape']; ?></td>
                        <td><?php echo $societe['av_soc']; ?></td>
                        <td><?php echo $societe['auteur']; ?></td>

                        <td>
                            <a class="btn btn-warning" id="modif_<?php echo $societe['id']; ?>"  href="manager/modif_societe_form.php?val=<?php echo $societe['id']; ?>">
                                Modifier
                            </a>

                        <td>
                            <label id-delete="<?php echo $societe['id']; ?>" class="btn btn-warning delete" id="sup_<?php echo $societe['id']; ?>" id="sup_<?php echo $societe['id']; ?>">
                                Supprimer
                            </label>
                        </td>
                    </tr> 
                <?php endforeach; ?>
            </table>        </div>
    </div>

</div>
<script type="text/javascript">
    $(function() {

        $(".delete").click(function() {
            var id = $(this).attr("id-delete");

            if (confirm('Etes-vous sûr de vouloir supprimer cette société ?')) {
                $("#sup_" + id).load("manager/delete_soc.php?val=" + id)
                $("#line_" + id).hide();
            }
        });
    });
</script>
<?php
include 'footer.php';
