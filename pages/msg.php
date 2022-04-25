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

// $sql = "Select membre.nom,amis.idmembre1,amis.idmembre2 FROM membre JOIN amis ON membre.idmembre=amis.idmembre2 where amis.idmembre1='%s' and amis.dhaccept is not NULL;";
$sql0=" select count(*) from membre;";
$result0 = mysqli_query(dbconnect(), $sql0);
$row0=mysqli_fetch_assoc($result0);
// echo $row0['count(*)'];
// for ($i=1; $i <= $row0['count(*)']; $i++) { 
// $sql = "select * from message where idenvoie='%s' and idrecu='%s' or idenvoie='%s' and idrecu='%s' order by dhmsg desc limit 1;";
// $sql = sprintf($sql,$_SESSION['idconnect'],$i,$i,$_SESSION['idconnect']);
// echo $sql;
// $result = mysqli_query(dbconnect(), $sql);
// }

?>    
<!DOCTYPE html>
<html>
    <head>
        <title>Message</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
        <link href="../css/bootstrap.css" rel="stylesheet"> 
        <link href="style.css" rel="stylesheet"/>
    </head>
    <body>
    <h1>Message</h1>
    <ul class="nav nav-tabs">
          <li role="presentation"><a href="acceuil.php">Home</a></li>
          <li role="presentation"><a href="liste.php">Listes des Membres</a></li>
          <li role="presentation"><a href="amis.php">Amis & Demandes</a></li>
          <li role="presentation"><a href="recherche.php">Rechercher des membres</a></li>
          <li role="presentation"><a href="parprofil.php">Paramètre de profil</a></li>
          <li role="presentation" class="active"><a href="msg.php">messages</a></li>

    </ul>

  <p>liste de vos amis :</p>
    <table>
            <?php
            for ($i=1; $i <= $row0['count(*)']; $i++) { ?>
        <tr>
  <?php     $sql = "select * from message where idenvoie='%s' and idrecu='%s' or idenvoie='%s' and idrecu='%s' order by dhmsg desc limit 1;";
            $sql = sprintf($sql,$_SESSION['idconnect'],$i,$i,$_SESSION['idconnect']);
            // echo $sql;
            $result = mysqli_query(dbconnect(), $sql);
            $row=mysqli_fetch_assoc($result);
            ?>
            <td><a href="messag.php?ip=<?php echo $i ?>"><?php echo $row['msg'] ?></a></td>
        </tr>
         <?php   } ?>

  </table>

    </body>
    <footer><p><a href="../index.php">Déconnexion</a></p></footer>
    <script src="js/jquery.js"></script> 
    <script src="js/bootstrap.min.js"></script> 
</html>

<?php
mysqli_free_result($result);
?>
