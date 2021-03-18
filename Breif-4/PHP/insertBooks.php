<?php
include('config.php');
if (isset($_POST['insert'])) {
    try {
        $name = $_POST['name'];
        $price = $_POST['prix'];
        $date = $_POST['date'];
        $img =$_FILES['img']['name'];
        $upp="../books/".$img;        
        move_uploaded_file($_FILES['img']['tmp_name'],$upp);
        $insert = "INSERT INTO `livres`( `Name`, `prix`, `Ddate`, `Img`) VALUES ('$name',$price,'$date','$img')";
        $db->query($insert);
        $SelectMaxid="SELECT max(Id) as Id FROM `livres`";
        $x=$db->query($SelectMaxid);
        while ($row =$x->fetch()) 
        {
          $r= htmlspecialchars($row['Id'])  ;
        }
        $selectautId=$_POST['selbooks'];
        $db->query("INSERT INTO `livaut`(`Idliv`, `Idaut`) VALUES ($r,$selectautId)");
        header("location: books.php");
    } catch (PDOException $e) {
        print "Erreur :" . $e->getMessage() . "<br>";
        die;
    }
}