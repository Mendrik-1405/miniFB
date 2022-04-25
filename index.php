<?php
    session_start();
    if(isset($_GET['error'])){
        $erreur="E-mail ou Mot de passe invalide";
    } 
    elseif(isset($_GET['new'])){
        $erreur="Connectez-vous maintenant!";
    } 
    else {
        $erreur="";
    }
    session_destroy();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>page login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
        <link href="css/bootstrap.css" rel="stylesheet"> 
        <link href="style.css" rel="stylesheet"/>
    </head>
    <body>
    <center><h1>Login</h1></center>
    <center><p><?php echo $erreur; ?></p></center>
    <center>
        <form action="pages/traitelog.php" class="navbar-form navbar"  method="POST">
                <center><input type="text" name="email" class="form-control" placeholder="E-mail"></center>
                <center><input type="password" name="motdepasse" class="form-control" placeholder="Mot de passe"></center><br />
                <center><button type="submit" class="btn btn-default">se connecter</button> </center><br/>
        </form>
    </center>
    <center>
        <a href="pages/inscrit.php"><button type="button" class="btn btn-default btn-md"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> S'inscrire</button></a>
    </center>
    </body>

     <script src="js/jquery.js"></script> 
    <script src="js/bootstrap.min.js"></script> 
</html>



