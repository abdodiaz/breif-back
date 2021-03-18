<?php
try{
    $select ="SELECT * FROM `auteur` ORDER BY id ";
    $z=$db->query($select);
    $z->setFetchMode(PDO::FETCH_ASSOC); 
    }
    catch (PDOException $e) {
        print "Erreur :" . $e->getMessage() . "<br>";
        die;
    }
    