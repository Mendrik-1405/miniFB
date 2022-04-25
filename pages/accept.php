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

$sql="UPDATE amis set dhaccept=current_timestamp() where idmembre1='%s' and idmembre2='%s';";
$sql=sprintf($sql,$_GET['id1'],$_SESSION['idconnect']);

$sql2="insert into amis(idmembre1,idmembre2,dhaccept) values ('%s','%s',current_timestamp());";
$sql2=sprintf($sql2,$_SESSION['idconnect'],$_GET['id1']);

$sql3="insert into message(idenvoie,idrecu,msg) values ('%s','%s','vous pouvez discuter');";
$sql3=sprintf($sql3,$_SESSION['idconnect'],$_GET['id1']);

// echo $sql;
// echo $sql2;

$result = mysqli_query(dbconnect(), $sql);
$result2 = mysqli_query(dbconnect(), $sql2);
$result3 = mysqli_query(dbconnect(), $sql3);
header('location:amis.php');
?>