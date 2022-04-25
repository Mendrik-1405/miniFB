<?php
include ('../inc/connection.php');
$nom=$_POST['nom'];
$email=$_POST['email'];
$datenaissance=$_POST['datenaissance'];
$motdepasse=$_POST['motdepasse'];

    $sql="insert into membre(email, motdepasse, nom, datenaissance) values('%s','%s','%s','%s');";
    $sql=sprintf($sql,$email,$motdepasse,$nom,$datenaissance);
    $resultat=mysqli_query(dbconnect(),$sql);

header('Location: ../index.php?new=1');

?>
