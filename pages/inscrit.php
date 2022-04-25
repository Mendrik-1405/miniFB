<!DOCTYPE html>
<html>
    <head>
        <title>Ajouter client</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
        <link href="../css/bootstrap.css" rel="stylesheet"> 
        <link href="style.css" rel="stylesheet"/>
    </head>
    <body>
        <center><h1>Ajouter des clients</h1></center>
            <form action="ajouter.php" method="POST">
                    <center> Nom<center><input type="text" name="nom" /><br /></center></center></center>
                    <center>Email<center><input type="text" name="email" /><br /></center></center>
                    <center>date de naissance<center><input type="date" name="datenaissance" value="AAAA-MM-JJ"/></br></center></center>
                    <center>mot de passe<center><input type="text" name="motdepasse" /></center><br /></center>
                    <center><br/><input type="submit" name="valider" /> </center>
            </form>
        <center><p><a href="../index.php">Retour</a></p></center>
    </body>
</html>