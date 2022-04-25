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
$textepub=$_POST['textepub'];
$affichage=$_POST['affichage'];

    $sql="insert into publication(textepub,affichage) values('%s','%s');";
    $sql=sprintf($sql,$textepub,$affichage);
    // echo $sql;
 $resultat=mysqli_query(dbconnect(),$sql);

header('Location: acceuil.php');

?>