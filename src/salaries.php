<?php
//include 'auth.php';
include 'connect.php';
require 'Fonctions.php';
include 'header.php';
?>
<div class="row">
    <h4 class="titre">Listes des salariés</h4>
    <table class="table table-condensed table-striped">
        <tr><th>Prénom & Nom</th><th>Em@il</th><th>Date de naissance</th><th>Modifier</th><th>Supprimer</th></tr>
        <?php foreach (Fonctions::getTables("salarie") as $salaries => $salarie) : ?>
            <tr id="line_<?php echo $salarie['id']; ?>">
                <td><?php echo $salarie['prenom_sal'] . " " . $salarie['nom_sal']; ?></td>
                <td><?php echo $salarie['email']; ?></td>
                <td><?php echo $salarie['bdate_sal']; ?></td>
                <td>
                    <a href="manager/modif_sal_form.php?val=<?php echo $salarie['id']; ?>" class="btn btn-primary" id="modif_<?php echo $salarie['id']; ?>">
                        Modifier
                    </a>
                </td>
                <td>
                    <label id-delete="<?php echo $salarie['id']; ?>" class="btn btn-danger delete" id="sup_<?php echo $salarie['id']; ?>">
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
            if (confirm('Etes-vous sûr de vouloir supprimer ce salarié ?')) {
                $("#sup_" + id).load("manager/delete_salarie.php?val=" + id)
                $("#line_" + id).hide();
            }
        });
    });
</script>
<?php
include 'footer.php';
