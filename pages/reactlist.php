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
$idpubli=$_GET['idpubli'];

$sql1 = "select idreaction,membre.nom from reaction JOIN membre on reaction.idmembre=membre.idmembre where idreaction='1' and idpublication='%s';";
$sql1=sprintf($sql1,$idpubli);
// echo $sql1;
$result1 = mysqli_query(dbconnect(), $sql1);
$nbr_react1 = mysqli_num_rows($result1);

$sql2 = "select idreaction,membre.nom from reaction JOIN membre on reaction.idmembre=membre.idmembre where idreaction='2' and idpublication='%s';";
$sql2=sprintf($sql2,$idpubli);
// echo $sql2;
$result2 = mysqli_query(dbconnect(), $sql2);
$nbr_react2 = mysqli_num_rows($result2);

$sql3 = "select idreaction,membre.nom from reaction JOIN membre on reaction.idmembre=membre.idmembre where idreaction='3' and idpublication='%s';";
$sql3=sprintf($sql3,$idpubli);
// echo $sql3;
$result3 = mysqli_query(dbconnect(), $sql3);
$nbr_react3 = mysqli_num_rows($result3);

$sql4 = "select idreaction,membre.nom from reaction JOIN membre on reaction.idmembre=membre.idmembre where idreaction='4' and idpublication='%s';";
$sql4=sprintf($sql4,$idpubli);
// echo $sql4;
$result4 = mysqli_query(dbconnect(), $sql4);
$nbr_react4 = mysqli_num_rows($result4);

$sql5 = "select idreaction,membre.nom from reaction JOIN membre on reaction.idmembre=membre.idmembre where idreaction='5' and idpublication='%s';";
$sql5=sprintf($sql5,$idpubli);
// echo $sql5;
$result5 = mysqli_query(dbconnect(), $sql5);
$nbr_react5 = mysqli_num_rows($result5);

$sql6 = "select idreaction,membre.nom from reaction JOIN membre on reaction.idmembre=membre.idmembre where idreaction='6' and idpublication='%s';";
$sql6=sprintf($sql6,$idpubli);
// echo $sql6;
$result6 = mysqli_query(dbconnect(), $sql6);
$nbr_react6 = mysqli_num_rows($result6);
// 
$sql7 = "select idreaction,membre.nom from reaction JOIN membre on reaction.idmembre=membre.idmembre where idreaction='7' and idpublication='%s';";
$sql7=sprintf($sql7,$idpubli);
// echo $sql7;
$result7 = mysqli_query(dbconnect(), $sql7);
$nbr_react7 = mysqli_num_rows($result7);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>reaction</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
        <link href="../css/bootstrap.css" rel="stylesheet"> 
        <link href="style.css" rel="stylesheet"/>
    </head>
    <body>
    <h1>reaction</h1>
     <ul class="nav nav-tabs">
          <li role="presentation" class="active"><a href="acceuil.php">Home</a></li>
          <li role="presentation"><a href="liste.php">Listes des Membres</a></li>
          <li role="presentation"><a href="amis.php">Amis & Demandes</a></li>
          <li role="presentation"><a href="recherche.php">Rechercher des membres</a></li>
          <li role="presentation"><a href="parprofil.php">Paramètre de profil</a></li>
     </ul>

    <p>reaction j'aime(<?php echo $nbr_react1; ?>):</p>
        <?php while ($row1 = mysqli_fetch_assoc($result1)) { ?>
            <p><?php echo $row1['nom']; ?></p>     
        <?php } ?>

     <p>reaction j'adore(<?php echo $nbr_react2; ?>):</p>
        <?php while ($row2 = mysqli_fetch_assoc($result2)) { ?>
            <p><?php echo $row2['nom']; ?></p>     
        <?php } ?>

     <p>reaction hahaha(<?php echo $nbr_react3; ?>):</p>
        <?php while ($row3 = mysqli_fetch_assoc($result3)) { ?>
            <p><?php echo $row3['nom']; ?></p>     
        <?php } ?>

     <p>reaction triste(<?php echo $nbr_react4; ?>):</p>
        <?php while ($row4 = mysqli_fetch_assoc($result4)) { ?>
            <p><?php echo $row4['nom']; ?></p>     
        <?php } ?>

     <p>reaction wouah(<?php echo $nbr_react5; ?>):</p>
        <?php while ($row5 = mysqli_fetch_assoc($result5)) { ?>
            <p><?php echo $row5['nom']; ?></p>     
        <?php } ?>

     <p>reaction solidaire(<?php echo $nbr_react6; ?>):</p>
        <?php while ($row6 = mysqli_fetch_assoc($result6)) { ?>
            <p><?php echo $row6['nom']; ?></p>     
        <?php } ?>

     <p>reaction Grrr(<?php echo $nbr_react7; ?>):</p>
        <?php while ($row7 = mysqli_fetch_assoc($result7)) { ?>
            <p><?php echo $row7['nom']; ?></p>     
        <?php } ?>


        <p><a href="acceuil.php">Retour</a></p>

    </body>
</html>