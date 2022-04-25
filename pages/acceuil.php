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

$sql = "select * from publication;";
//echo $sql;
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
    <h1>Accueil</h1>
        <ul class="nav nav-tabs">
          <li role="presentation" class="active"><a href="acceuil.php">Home</a></li>
          <li role="presentation"><a href="liste.php">Listes des Membres</a></li>
          <li role="presentation"><a href="amis.php">Amis & Demandes</a></li>
          <li role="presentation"><a href="recherche.php">Rechercher des membres</a></li>
          <li role="presentation"><a href="parprofil.php">Paramètre de profil</a></li>
          <li role="presentation"><a href="msg.php">messages</a></li>
           </ul>
           <p>
                <form action="searchresult.php" method="POST">
                    Recherche : <input type="text" name="search" />
                    <input type="submit" name="valider" /> 
                </form>
           </p>
       

    <form action="publication.php" class="navbar-form navbar" method="POST" >
         <input type="text" name="textepub" placeholder="Exprimez-vous" /><br>
         <input type="radio" name="affichage" value="public" checked/>public
         <input type="radio" name="affichage" value="amis" />amis
        <input type="submit" name= "valider" value="publier" /> 
    </form>

     <table border="0px" style="width:50%">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['textepub']; ?></td>
            <td><?php echo $row['dhpubli']; ?></td>
            <td><a href="detailpub.php?idpubli=<?php echo $row['idpubli'] ?>">voir commentaire</a></td>
        </tr>
        <tr>
                <?php
                $sql2="select count(idreaction) from reaction where idpublication ='%s';";
                $sql2=sprintf($sql2,$row['idpubli']);
                // echo $sql2;
                $val = mysqli_query(dbconnect(), $sql2);
                while ($ligne = mysqli_fetch_assoc($val)) {
                ?>
                <td><a href="reactlist.php?idpubli=<?php echo $row['idpubli'] ?>">(<?php echo $ligne['count(idreaction)']; ?>)</a></td>
                <?php } ?>
            <td>
                <form action="reactpub.php?idpubli=<?php echo $row['idpubli'] ?>" method="post">
                    <select name="reaction">
                        <option value="1">j'aime</option>
                        <option value="2">j'adore</option>
                        <option value="3">hahaha</option>
                        <option value="4">triste</option>
                        <option value="5">wouah</option>
                        <option value="6">solidaire</option>
                        <option value="7">Grrr</option>
                    </select>
                    <input type="submit" value="Reagir" />   
                </form>
            </td>
            <td >
                <center>
                    <form action="commentaire.php?idpubli=<?php echo $row['idpubli'] ?>" method="POST">
                        <input type="text" name="texteco" />
                        <input type="submit" name= "valider" value="commenter" /> 
                     </form>
                </center>
            </td>
        </tr>
        <?php } ?>
        </table>

    </body>
    <footer><p><a href="../index.php">Déconnexion</a></p></footer>
    <script src="js/jquery.js"></script> 
    <script src="js/bootstrap.min.js"></script> 
</html>

<?php
mysqli_free_result($result);
?>
