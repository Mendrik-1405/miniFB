<?php
session_start();
    if(isset($_SESSION['idconnect'])){
        echo "";
    } 
    else {
        header('Location: ../index.php?new=1');
    }
$sms=$_POST['sms'];
include ('../inc/connection.php');
if (($_POST['sms'])!=null) {
mysqli_set_charset(dbconnect(), "utf8");
$ide=$_GET['ide'];
    $sql="insert into message(idenvoie,idrecu,msg) values('%s','%s','%s');";
    $sql=sprintf($sql,$_SESSION['idconnect'],$_GET['ide'],$sms);
    // echo $sql;
 $resultat=mysqli_query(dbconnect(),$sql);
 header("Location: messag.php?ip=".$_GET['ide']);
}else{
	header("Location: messag.php?ip=".$_GET['ide']);
}

?>