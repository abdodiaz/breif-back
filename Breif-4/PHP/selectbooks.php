<?php
try{
$select ="SELECT * FROM `livres` ORDER BY id ";
$q=$db->query($select);
$q->setFetchMode(PDO::FETCH_ASSOC); 
}
catch (PDOException $e) {
    print "Erreur :" . $e->getMessage() . "<br>";
    die;
}
