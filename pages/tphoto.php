<?php
session_start();
    if(isset($_SESSION['idconnect'])){
        echo "";
    } 
    else {
        header('Location: ../index.php?new=1');
    }

include ('../inc/connection.php');

$profil=$_GET['pro'];

$sql="update membre set profil='%s' where idmembre='%s';";
$sql=sprintf($sql,$profil,$_SESSION['idconnect']);
$result = mysqli_query(dbconnect(), $sql);
// echo $sql;
header('location:parprofil.php');