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
$id2=$_GET['ip'];
$sql = "Select nom,msg FROM message JOIN membre on message.idenvoie=membre.idmembre where idenvoie='%s'and idrecu='%s' or idenvoie='%s' and idrecu='%s' order by dhmsg asc;";
 $sql = sprintf($sql,$_SESSION['idconnect'],$_GET['ip'],$_GET['ip'],$_SESSION['idconnect']);
$result = mysqli_query(dbconnect(), $sql);
// echo $sql;
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
          <li role="presentation" class="active"><a href="msg.php">Messages</a></li>

    </ul>
    <table>
    	  <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['nom'] ?> :  <?php echo $row['msg'] ?></td>
        </tr>
        <?php } ?>
           
  </table>
    <form action="Sendms.php?ide=<?php echo $_GET['ip'] ?>" method="POST">
        Repondre : <input type="text" name="sms" />
        <input type="submit" name="Repondre" value="Send" /> 
    </form>

    </body>
    <footer>
        <p><a href="msg.php">Retour</a></p>
        <p><a href="../index.php">Déconnexion</a></p>
    </footer>


    <script src="js/jquery.js"></script> 
    <script src="js/bootstrap.min.js"></script> 
</html>

<?php
mysqli_free_result($result);
?>

