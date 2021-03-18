<?php
include('config.php');
try{

    $id=$_POST['up'];
    $name=$_POST['namme'];
    $prix= $_POST['prix'];
    $date=$_POST['date'];
    $img =$_FILES['img']['name'];
    $upp="../books/".$img;        
    move_uploaded_file($_FILES['img']['tmp_name'],$upp);
    $update ="UPDATE `livres` SET `Name`='$name',`prix`= $prix,`Ddate`= '$date',`Img`= '$img' WHERE `Id`=$id";
    $q=$db->query($update);
    $q->setFetchMode(PDO::FETCH_ASSOC);
header("location: books.php");
}
catch (PDOException $e){
    print "Erreur :" . $e->getMessage() . "<br>";
    die;
}