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

$sql = "select * from commentaire where idpubli='%s' ;";
$sql=sprintf($sql,$idpubli);
// echo $sql;
$result = mysqli_query(dbconnect(), $sql);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>coms</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
        <link href="css/bootstrap.css" rel="stylesheet"> 
        <link href="style.css" rel="stylesheet"/>
    </head>
    <body>
    <h1>commentaire</h1>
      <table border="0px" style="width:40%">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['texteco']; ?></td>
            <td><center><?php echo $row['dhcommentaire']; ?></center></td>
        </tr>
        <?php } ?>
		</table>
        <p><a href="acceuil.php">Retour</a></p>

    </body>
</html>
<?php
mysqli_free_result($result);
?>