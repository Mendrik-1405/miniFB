<?php
session_start();
    if(isset($_SESSION['idconnect'])){
        echo "";
    } 
    else {
        header('Location: ../index.php?new=1');
    }

include ('../inc/connection.php');

$search=isset($_GET['search'])? $_GET['search']: '';

$sql = "select * from membre where nom like '%s';";
$sql = sprintf($sql,"%".$search."%");


$result = mysqli_query(dbconnect(), $sql);

?>		
<html>
    <head>
        <title>Resultat</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
        <link href="../css/bootstrap.css" rel="stylesheet"> 
        <link href="style.css" rel="stylesheet"/>
    </head>
    <body>
    <h1>Résultat recherche</h1>
    <ul class="nav nav-tabs">
          <li role="presentation"><a href="acceuil.php">Home</a></li>
          <li role="presentation"><a href="liste.php">Listes des Membres</a></li>
          <li role="presentation"><a href="amis.php">Amis & Demandes</a></li>
          <li role="presentation" class="active"><a href="recherche.php">Rechercher des membres</a></li>
          <li role="presentation"><a href="parprofil.php">Paramètre de profil</a></li>
          <li role="presentation"><a href="msg.php">messages</a></li>

    </ul>

    <p>Votre recherche : <?php echo $search ?></p>
    <table border="1">
        <tr>
            <th>nom</th>
            <th>date de naissance</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['nom'] ?></td>
            <td><?php echo $row['datenaissance'] ?></td>
            <td><a href="dmd.php?id2=<?php echo $row['idmembre'] ?>">ajouter</a></td>
        </tr>
        <?php } ?>
        </table>
    <p><a href="recherche.php">Retour</a></p>
    </body>
    <footer><p><a href="../index.php">Déconnexion</a></p></footer>
    <script src="js/jquery.js"></script> 
    <script src="js/bootstrap.min.js"></script>     
</html>
<?php
mysqli_free_result($result);
?>