<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="prud'home">
        <meta name="author" content="Eric Blaise Mohamed">
        <title>Projet</title>

        <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" />
        <link href="css/bootstrap-theme.min.css" type="text/css" rel="stylesheet" />
        <link href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" type="text/css" rel="stylesheet" />
        <link href="css/jquery-ui.css" type="text/css" rel="stylesheet" />

        <!--<link href="http://fonts.googleapis.com/css?family=Open+Sans|Oswald|Ubuntu|Patua+One" type="text/css" rel="stylesheet" />-->
        <link href="css/custom.css" type="text/css" rel="stylesheet" />
        <link href="css/signin.css" type="text/css" rel="stylesheet" />
         <link href="css/footer.css" type="text/css" rel="stylesheet" />
        <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery-ui.js"></script>
        <script type="text/javascript" src="js/jquery_adress.js"></script>



    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">

                <div class="navbar-inner">
                    <a class="col-lg-offset-2 pull-left" href="index.php"><img src="img/logo.png"
                                                                       height="60" alt="logo"
                                                                       /></a>
                    <div class="col-lg-offset-3">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                                <span class="sr-only">Navigation</span>
                                Menu
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>


                        </div>
                        <div class="collapse navbar-collapse navbar-ex1-collapse">
                            <ul class="nav navbar-nav">

                                <?php
								//démarrage d'une session
								session_start();
								//verification la variable de session a été initialisé
								if (isset($_POST['NAME']))
                                if ($_SESSION["NAME"]) {
                                    echo'<li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <span class="label label-success"><span class="glyphicon glyphicon-user"></span>' . $_SESSION["NAME"] . '</span> <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        
                                        <li>
                                            <a href="logout.php"><span class="glyphicon glyphicon-off"> </span> Déconnexion</a>
                                        </li>
                                    </ul>';
                                } else {
                                    echo' <li> 
                                    <a href="user_form.php">Créer un compte</a>
                                </li>';
                                }
                                ?>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span>Sociétés <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li class="list-group-item">
                                            <a href="societe_form.php">
                                                Ajouter une société 
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="societes.php">
                                                Afficher les sociétés
                                            </a>
                                        </li>


                                    </ul>
                                </li>

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span>Audiences <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li class="list-group-item">
                                            <a href="audiance_form.php">
                                                Ajouter une audience
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="audiances.php">
                                                Afficher les audiences
                                            </a>
                                        </li>


                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span>Salariés <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li class="list-group-item">
                                            <a href="salarie_form.php">
                                                Ajouter un salarié
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="salaries.php">
                                                Afficher les salariés
                                            </a>
                                        </li>


                                    </ul>
                                </li>

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span>Dossiers <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li class="list-group-item">
                                            <a href="dossier_form.php">
                                                Creer un dossier
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="dossiers.php">
                                                Afficher les dossier
                                            </a>
                                        </li>


                                    </ul>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

            <div class="row">
                <div class="col-lg-1">

                </div>
                <div class="col-lg-10">
</div>
