<?php
//include 'auth.php';
include 'connect.php';
require 'Fonctions.php';
include 'header.php';
?>
<div class="row">
    <h4 class="titre">Liste des sociétés</h4>
    <table class="table table-condensed table-striped">
        <tr><th>Nom</th><th>Siren</th><th>APE</th><th>Conseil</th><th>Modifier</th><th>Supprimer</th></tr>
        <?php foreach (Fonctions::getTables("societe") as $societes => $societe) : ?>
            <tr id="line_<?php echo $societe['id']; ?>">
                <td><?php echo $societe['nom']; ?></td>
                <td><?php echo $societe['siren']; ?></td>
                <td><?php echo $societe['ape']; ?></td>
                <td><?php echo $societe['av_soc']; ?></td>

                <td>
                    <a class="btn btn-primary" id="modif_<?php echo $societe['id']; ?>"  href="manager/modif_societe_form.php?val=<?php echo $societe['id'] ;?>">
                        Modifier
                    </a>
                    
                <td>
                    <label id-delete="<?php echo $societe['id']; ?>" class="btn btn-danger delete" id="sup_<?php echo $societe['id']; ?>" id="sup_<?php echo $societe['id']; ?>">
                        Supprimer
                    </label>
                </td>
            </tr> 
        <?php endforeach; ?>
    </table>
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
