<?php
include 'header.php';
?>
<?php
include 'twitter.php';
?>
<div class="panel panel-warning">

    <div class="panel-body">
        <h1 class="col-lg-offset-3">
            Lorem ipsum dolor sit amet
        </h1>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis mi metus, euismod at fringilla ut, volutpat at libero. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Etiam eget metus et neque ultricies porta id eu augue. Sed sit amet purus faucibus, convallis nulla eget, pretium nisl. Suspendisse tortor ante, venenatis sed ultricies eu, tristique sit amet felis. Etiam dolor neque, vehicula ut velit vel, pellentesque egestas justo. Quisque vulputate adipiscing leo. Vestibulum ut ipsum tristique, cursus ligula eget, suscipit magna. Pellentesque diam lectus, ultricies quis mi eget, commodo ultrices lorem. Suspendisse sed sapien arcu.

            Donec vitae erat a justo tincidunt fermentum in sed nibh. Pellentesque non purus non ipsum convallis adipiscing eget sit amet mauris. Sed tempus, arcu ac vestibulum fringilla, nisi est fermentum magna, a posuere sem dolor nec justo. Phasellus ut lobortis libero, sit amet mattis nisl. Ut ac tellus eu mauris blandit semper at sit amet augue. Suspendisse ut mi at mi commodo viverra. In ut odio vitae sem feugiat dignissim. Proin congue, est in luctus tempus, turpis enim mattis sem, vitae molestie leo augue in dui.

        </p>

        <div id="carousel-accueil" class="carousel slide" data-ride="carousel">
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
    </div>
</div>


<?php
include 'footer.php';
?>
