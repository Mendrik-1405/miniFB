<?php
session_start();
$_SESSION['email']=$_POST['email'];
$_SESSION['mdp']=$_POST['motdepasse'];

require ('../inc/functions.php');

$row=check_log($_SESSION['email'],$_SESSION['mdp']);
$_SESSION['idconnect']=$row['idmembre'];

if(isset($row['idmembre']))
	{
        header('location:acceuil.php');
    } 
    else 
    {
       header('Location: ../index.php?error=1');
    }

?>

