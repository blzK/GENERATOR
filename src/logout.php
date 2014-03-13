<?php

session_start();

session_destroy();

print("<h2 style='color:red'>Vous êtes maintenant déconnecté!</h2><BR>");
?>
<html>
<head>
<meta http-equiv="Refresh" content="2;url=index.php" />
</head>

<body align="center">
<h3>Retour à la page d'accueil!</h3>
<h4>Si vous voyez ce message plus de 2 secondes veillez cliquer sur le lien ci-dessous</h4>
<h5>Le lien: <a href="index.php">Accueil</a></h5>

</body>
</html>
