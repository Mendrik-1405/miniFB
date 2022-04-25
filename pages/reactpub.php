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
$reaction=$_POST['reaction'];
$idpubli=$_GET['idpubli'];

$sql0="select idreaction from reaction where idpublication ='%s' and idmembre='%s' and idreaction='%s';";
$sql0=sprintf($sql0,$idpubli,$_SESSION['idconnect'],$reaction);
$result=mysqli_query(dbconnect(),$sql0);
while ($row = mysqli_fetch_assoc($result)) {

if (isset($row['idreaction'])) {
$sqlA="delete from reaction where idpublication ='%s' and idmembre='%s';";
$sqlA=sprintf($sqlA,$idpubli,$_SESSION['idconnect']);
$reaction=0;
// echo $sqlA;
$sult=mysqli_query(dbconnect(),$sqlA);
}
}
if ($reaction!=0) {
    $sql="insert into reaction values('%s','%s','%s');";
    $sql=sprintf($sql,$idpubli,$_SESSION['idconnect'],$reaction);
    // echo $sql;
 $resultat=mysqli_query(dbconnect(),$sql);

$sql2="update reaction set idreaction='%s' where idpublication='%s' and idmembre='%s';";
$sql2=sprintf($sql2,$reaction,$idpubli,$_SESSION['idconnect']);
// echo $sql2;
$change=mysqli_query(dbconnect(),$sql2);
}
header('Location: acceuil.php');
?>