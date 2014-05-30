<?php
include 'header.php';
?>
<div class="panel panel-warning">

    <div class="panel-body">
        <div class="row jumbotron">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="titre">
                        Conseil de prud'homme
                    </h4>
                </div>
                <div class="panel-body">
                    <p>
                        Ce site permettra à notre collègue Blaise, qui siège au conseil de prud'homme, de pouvoir gérer
                        les dossiers des salariés qui ont des contentieux avec leurs employeurs.
                    </p>
                    <small class="col-lg-3">
                        Blaise PERTEV<br/>
                        Eric NINGABIYE<br/>
                        Mohamed Mbodji
                    </small>                
                </div>
            </div>

        </div>
        <div id="carousel-accueil" class="carousel slide col-lg-6" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-accueil" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-accueil" data-slide-to="1"></li>
                <li data-target="#carousel-accueil" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <div class="jumbotron">
                        <h2>
                            <img src="img/phomme.jpg" alt="prudhomme">
                            On cherche à resoudre tous les contentieux
                        </h2>
                    </div>
                </div>

                <div class="item">
                    <div class="annonce-accueil">
                        <h2>
                            <img src="img/prudhomme-1.png" alt="prudhomme">
                            Vous pouvez constater l'utilité du conseil selon ce graphique 
                        </h2>
                    </div>
                </div>
                <div class="item">
                    <div class="job-accueil">
                        <h2>
                            <img src="img/prdhomme.jpeg" alt="prudhomme">
                            Prud'homme fait la justice pour les salariés !
                        </h2>
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-accueil" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-accueil" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>
        <div class="col-lg-6">
            <?php
            include 'twitter.php';
            ?>
        </div>
    </div>
</div>


<?php
include 'footer.php';
?>
