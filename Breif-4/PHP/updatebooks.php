<?php
include('config.php');
try{
    $id=$_POST['mod'];
   $select ="SELECT * FROM `livres` WHERE id=$id ";
$q=$db->query($select);
$q->setFetchMode(PDO::FETCH_ASSOC); 
}

catch (PDOException $e) {
    print "Erreur :" . $e->getMessage() . "<br>";
    die;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

      <?php while ($row = $q->fetch()) : ?>
        <form action="updatebooks1.php" method="post"  enctype="multipart/form-data">
        <label ><?php echo htmlspecialchars($row['Id']) ?></label>
        <label>name</label>
        <input type="text" name="namme" id="name" value="<?php echo htmlspecialchars($row['Name']) ?>">
        <label>prix</label>
        <input type="text" name="prix" id="prix"value="<?php echo htmlspecialchars($row['prix']) ?>">
        <label>date</label>
        <input type="date" name="date" id="date"value="<?php echo htmlspecialchars($row['Ddate']) ?>">
        <?php while ($row = $z->fetch()) : ?>
        <?php echo "<option value= '".htmlspecialchars($row['id'])."'>".htmlspecialchars($row['name'])."</option>" ?>
        <?php endwhile; ?>
        <label>image</label>
        <img src="../books/<?php echo htmlspecialchars($row['Img']) ?>" alt="immg" width="100px" height="100px">
        <input type="file" name="img" id="img" value="">
        <input type="hidden" name="up" value="<?php echo htmlspecialchars($row['Id']) ?>">
        <input type="submit" name="update" value="ok">
        </form>
        <?php endwhile; ?>
    </body>

</html>