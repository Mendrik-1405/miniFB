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

$sql = "select profil from membre where idmembre='%s';";
$sql=sprintf($sql,$_SESSION['idconnect']);
// echo $sql;
$result = mysqli_query(dbconnect(), $sql);

?>		

<!DOCTYPE html>
<html>
    <head>
        <title>TP</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
        <link href="../css/bootstrap.css" rel="stylesheet"> 
        <link href="style.css" rel="stylesheet"/>
    </head>
    <body>
    <h1>profil</h1>
        <ul class="nav nav-tabs">
          <li role="presentation"><a href="acceuil.php">Home</a></li>
          <li role="presentation"><a href="liste.php">Listes des Membres</a></li>
          <li role="presentation"><a href="amis.php">Amis & Demandes</a></li>
          <li role="presentation"><a href="recherche.php">Rechercher des membres</a></li>
          <li role="presentation" class="active"><a href="parprofil.php">Paramètre de profil</a></li>
          <li role="presentation"><a href="msg.php">messages</a></li>

        </ul>
        <p>votre photo de profil actuelle :</p>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <p><img src="../sary/<?php echo $row['profil'] ?>.png"width="95"height="125"></img></p>
        <?php } ?>
    <center><table>
        <p>cliquez pour changer la photo de profil :</p>
        	<tr>
        		<td width="95"height="125"><a href="tphoto.php?pro=0"><img src="../sary/0.png"width="95"height="125"></img></a></td>
        		<td width="95"height="125"><a href="tphoto.php?pro=1"><img src="../sary/1.png"width="95"height="125"></img></a></td>
        		<td width="95"height="125"><a href="tphoto.php?pro=2"><img src="../sary/2.png"width="95"height="125"></img></a></td>
        		<td width="95"height="125"><a href="tphoto.php?pro=3"><img src="../sary/3.png"width="95"height="125"></img></a></td>
        		<td width="95"height="125"><a href="tphoto.php?pro=4"><img src="../sary/4.png"width="95"height="125"></img></a></td>
        	</tr>
        	<tr>
        		<td width="95"height="125"><a href="tphoto.php?pro=5"><img src="../sary/5.png"width="95"height="125"></img></a></td>
        		<td width="95"height="125"><a href="tphoto.php?pro=6"><img src="../sary/6.png"width="95"height="125"></img></a></td>
        		<td width="95"height="125"><a href="tphoto.php?pro=7"><img src="../sary/7.png"width="95"height="125"></img></a></td>
        		<td width="95"height="125"><a href="tphoto.php?pro=8"><img src="../sary/8.png"width="95"height="125"></img></a></td>
        		<td width="95"height="125"><a href="tphoto.php?pro=9"><img src="../sary/9.png"width="95"height="125"></img></a></td>
        	</tr>
        </table></center>
 	</body>
</html>