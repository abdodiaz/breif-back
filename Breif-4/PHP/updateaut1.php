<?php
include('config.php');
try{

    $id=$_POST['up'];
    $name=$_POST['namme'];
    $img =$_FILES['img']['name'];
    $upp="../books/".$img;        
    move_uploaded_file($_FILES['img']['tmp_name'],$upp);
    $update ="UPDATE `auteur` SET `name`='$name',`img`= '$img' WHERE `Id`=$id";
    $q=$db->query($update);
    $q->setFetchMode(PDO::FETCH_ASSOC);
header("location: auteur.php");
}
catch (PDOException $e){
    print "Erreur :" . $e->getMessage() . "<br>";
    die;
}