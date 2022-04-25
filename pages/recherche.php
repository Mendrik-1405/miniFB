<html>
    <head>
        <title>Recherche client</title>
         <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
        <link href="../css/bootstrap.css" rel="stylesheet"> 
        <link href="style.css" rel="stylesheet"/>
    </head>
    <body>
    <h1>Rechercher des clients</h1>
    <ul class="nav nav-tabs">
          <li role="presentation"><a href="acceuil.php">Home</a></li>
          <li role="presentation"><a href="liste.php">Listes des Membres</a></li>
          <li role="presentation"><a href="amis.php">Amis & Demandes</a></li>
          <li role="presentation" class="active"><a href="recherche.php">Rechercher des membres</a></li>
          <li role="presentation"><a href="parprofil.php">Paramètre de profil</a></li>
          <li role="presentation"><a href="msg.php">messages</a></li>
    </ul>

    <form action="resultat.php" method="GET">
        Recherche : <input type="text" name="search" />
        <input type="submit" name="valider" /> 
    </form>
        <footer><p><a href="../index.php">Déconnexion</a></p></footer>
        <script src="js/jquery.js"></script> 
        <script src="js/bootstrap.min.js"></script> 
    </body>
</html>