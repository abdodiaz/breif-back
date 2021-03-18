<?php
include('config.php');
if (isset($_POST['insert'])) {
    try {
        $name = $_POST['name'];
        $img =$_FILES['img']['name'];
        $upp="../Auteur/".$img;        
        move_uploaded_file($_FILES['img']['tmp_name'],$upp);
        $insert = "INSERT INTO `auteur`( `name`, `img`) VALUES ('$name','$img')";
        $db->query($insert);
        header("location: auteur.php");
    } catch (PDOException $e) {
        
        print "Erreur :" . $e->getMessage() . "<br>";
        die;
    }
}