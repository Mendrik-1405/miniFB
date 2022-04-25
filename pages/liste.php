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
$sql2="select membre.idmembre,membre.nom,membre.datenaissance,membre.profil from amis JOIN membre on amis.idmembre2=membre.idmembre 
where amis.idmembre1='%s' ;";
$sql2=sprintf($sql2,$_SESSION['idconnect']);
//récuperer les membres
 $sql = "select idmembre,nom,datenaissance,profil from membre;";

$result2 = mysqli_query(dbconnect(), $sql2);
$result = mysqli_query(dbconnect(), $sql);

$row2 = mysqli_fetch_assoc($result2);
?>		
<!DOCTYPE html>
<html>
    <head>
        <title>member</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
        <link href="../css/bootstrap.css" rel="stylesheet"> 
        <link href="style.css" rel="stylesheet"/>
    </head>
    <body>
    <h1>Liste des membres</h1>
       <ul class="nav nav-tabs">
          <li role="presentation"><a href="acceuil.php">Home</a></li>
          <li role="presentation" class="active"><a href="liste.php">Listes des Membres</a></li>
          <li role="presentation"><a href="amis.php">Amis & Demandes</a></li>
          <li role="presentation"><a href="recherche.php">Rechercher des membres</a></li>
          <li role="presentation"><a href="parprofil.php">Paramètre de profil</a></li>
          <li role="presentation"><a href="msg.php">Messages</a></li>
        </ul>

     <table border="1">
        <tr>
            <th>photo de profil</th>
            <th>nom du membre</th>
            <th>date de naissance</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td width="95"height="125"><img src="../sary/<?php echo $row['profil'] ?>.png"width="95"height="125"></img></td>
            <td><center><?php echo $row['nom'] ?></center></td>
            <td><?php echo $row['datenaissance'] ?></td>
            <?php if ($_SESSION['idconnect']!=$row['idmembre'] and $row['idmembre']!=$row2['idmembre']) { ?>
            <td><a href="dmd.php?id2=<?php echo $row['idmembre'] ?>">ajouter</a></td> 
           <?php } 
           else if ($_SESSION['idconnect']!=$row['idmembre'] and $row['idmembre']==$row2['idmembre']) { ?>
             <td><a href="messag.php?ip=<?php echo $row['idmembre'] ?>">mess</a></td>

          <?php } ?>
        </tr>
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