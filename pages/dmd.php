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
$sql="insert into amis(idmembre1,idmembre2) values ('%s','%s');";
$sql=sprintf($sql,$_SESSION['idconnect'],$_GET['id2']);
$result = mysqli_query(dbconnect(), $sql);
 header('location:acceuil.php');
 ?>