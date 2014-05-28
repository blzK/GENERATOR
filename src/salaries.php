<?php
//include 'auth.php';
include 'connect.php';
require 'Fonctions.php';
include 'header.php';
?>
<div class="row">
    <div class="panel panel-warning">
        <div class="panel-heading">
            <h1 class="panel-title titre">Liste des salariés</h1>
        </div>
        <div class="panel-body">
            <form class="form-inline" role="form" action="" method="post">
                <div class="form-group">
                    <input type="search" class="form-control" name="chercher" id="chercher" placeholder="Chercher par nom, prenom ou email">
                </div>

                <button type="submit" class="btn btn-default">Chercher</button>
            </form>
            <br/>
            <table class="table table-condensed table-striped">
                <?php if (filter_input(INPUT_POST, 'chercher')) : ?>
                    <?php $salariess = Fonctions::getSearchSalarie("salarie", filter_input(INPUT_POST, 'chercher')); ?>
                <?php else : ?>
                    <?php $salariess = Fonctions::getTables("salarie"); ?>
                <?php endif; ?>
                <tr><th>Prénom & Nom</th><th>Em@il</th><th>Date de naissance</th><th>Auteur</th><th>Modifier</th><th>Supprimer</th></tr>
                <?php foreach ($salariess as $salaries => $salarie) : ?>
                    <tr id="line_<?php echo $salarie['id']; ?>">
                        <td><?php echo $salarie['prenom_sal'] . " " . $salarie['nom_sal']; ?></td>
                        <td><?php echo $salarie['email']; ?></td>
                        <td><?php echo $salarie['bdate_sal']; ?></td>
                        <td><?php echo $salarie['auteur']; ?></td>
                        <td>
                            <a href="manager/modif_sal_form.php?val=<?php echo $salarie['id']; ?>" class="btn btn-warning" id="modif_<?php echo $salarie['id']; ?>">
                                Modifier
                            </a>
                        </td>
                        <td>
                            <label id-delete="<?php echo $salarie['id']; ?>" class="btn btn-warning delete" id="sup_<?php echo $salarie['id']; ?>">
                                Supprimer
                            </label>
                        </td>
                    </tr> 
                <?php endforeach; ?>
            </table>
        </div>
    </div>

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
