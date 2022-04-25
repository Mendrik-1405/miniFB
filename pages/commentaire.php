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
$texteco=$_POST['texteco'];
$idpubli=$_GET['idpubli'];

    $sql="insert into commentaire(texteco,idpubli) values('%s','%s');";
    $sql=sprintf($sql,$texteco,$idpubli);
    // echo $sql;
 $resultat=mysqli_query(dbconnect(),$sql);
header('location:acceuil.php');

?>