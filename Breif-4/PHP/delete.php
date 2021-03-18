<?php
include('config.php');
// delete
try{

    $id=$_POST['del'];
    $delete = "DELETE FROM `livres` WHERE `Id` =$id "; 
    $db->query($delete);
    header("location: books.php");
   
}
 catch (PDOException $e) {
    print "Erreur :" . $e->getMessage() . "<br>";
    die;
}
