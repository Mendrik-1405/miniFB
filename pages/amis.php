<?php
session_start();
    if(isset($_SESSION['idconnect'])){
        echo "";
    } 
    else {
        header('Location: ../index.php?new=1');
    }


include ('../inc/connection.php');
mysqli_set_charset(dbconnect(), "utf8");


$sql = "Select membre.nom,amis.idmembre1,amis.idmembre2 FROM membre JOIN amis ON membre.idmembre=amis.idmembre2 where amis.idmembre1='%s' and amis.dhaccept is not NULL;";
$sql = sprintf($sql,$_SESSION['idconnect']);
$sql2 ="Select membre.nom,amis.idmembre1,amis.idmembre2 FROM membre JOIN amis ON membre.idmembre=amis.idmembre1 where amis.idmembre2='%s' and amis.dhaccept is NULL;";
$sql2 = sprintf($sql2,$_SESSION['idconnect']);
 $result = mysqli_query(dbconnect(), $sql);
 $result2 = mysqli_query(dbconnect(), $sql2);
?>		
<!DOCTYPE html>
<html>
    <head>
        <title>amis</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
        <link href="../css/bootstrap.css" rel="stylesheet"> 
        <link href="style.css" rel="stylesheet"/>
    </head>
    <body>
    <h1>Vos relations</h1>
       <ul class="nav nav-tabs">
          <li role="presentation"><a href="acceuil.php">Home</a></li>
          <li role="presentation"><a href="liste.php">Listes des Membres</a></li>
          <li role="presentation" class="active"><a href="amis.php">Amis & Demandes</a></li>
          <li role="presentation"><a href="recherche.php">Rechercher des membres</a></li>
          <li role="presentation"><a href="parprofil.php">Paramètre de profil</a></li>
          <li role="presentation"><a href="msg.php">messages</a></li>

    </ul>

    <p>liste de vos amis :</p>
     <table>
        <?php while ($row1 = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row1['nom'] ?></td>
        <?php } ?>
	</table>

        <p>les demandes reçus :</p>
     <table>
        <?php while ($row = mysqli_fetch_assoc($result2)) { ?>
        <tr>
            <td><?php echo $row['nom'] ?></td>
            <td><a href="accept.php?id1=<?php echo $row['idmembre1'] ?>">accepter</a></td>
        <?php } ?>
    </table>
        <p><a href="acceuil.php">Retour</a></p>

    </body>
    <footer><p><a href="../index.php">Déconnexion</a></p></footer>
    <script src="js/jquery.js"></script> 
    <script src="js/bootstrap.min.js"></script> 
</html>
<?php
mysqli_free_result($result);
?>


