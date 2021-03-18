<?php
include('config.php');
// delete
try{

    $id=$_POST['del'];
    $delete = "DELETE FROM `auteur` WHERE `Id` =$id "; 
    $db->query($delete);
    header("location: auteur.php");
   
}
 catch (PDOException $e) {
    print "Erreur :" . $e->getMessage() . "<br>";
    die;
}