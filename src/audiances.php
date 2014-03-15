<?php
//include 'auth.php';
include 'connect.php';
require 'Fonctions.php';
include 'header.php';
?>
<div class="row">
    <h4 class="titre">Liste des audiences</h4>
    <table class="table table-condensed table-striped">
        <tr><th>RG</th><th>Jurdiction</th><th>Type d'audience</th><th>Secteur d'audience</th><th>Date d'audience</th><th>Modifier</th><th>Supprimer</th></tr>
        <?php foreach (Fonctions::getTables("audiance") as $audiances => $audiance) : ?>
            <tr id="line_<?php echo $audiance['id']; ?>">
                <td><?php echo $audiance['rg']; ?></td>
                <td><?php echo $audiance['jurdiction']; ?></td>
                <td><?php echo $audiance['type_aud']; ?></td>
                <td><?php echo $audiance['sect_aud']; ?></td>
                <td><?php echo Fonctions::dateTimeSqlToFr($audiance['date_aud']); ?></td>
                <td>
                    <a href="manager/modif_audiance_form.php?val=<?php echo $audiance['id']; ?>" class="btn btn-primary" id="modif_<?php echo $audiance['id']; ?>">
                        Modifier
                    </a>
                </td>
                <td>
                    <label id-delete="<?php echo $audiance['id']; ?>" class="delete btn btn-danger" id="sup_<?php echo $audiance['id']; ?>">
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
            if (confirm('Etes-vous sûr de vouloir supprimer cette audience ?')) {
                $("#sup_" + id).load("manager/delete_audiance.php?val=" + id)
                $("#line_" + id).hide();
            }
        });
    });
</script>
<?php
include 'footer.php';
