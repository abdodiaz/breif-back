<?php
include('config.php');
include('selectbooks.php');
include('selectaut.php');
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

    <form action="insertBooks.php" method="post" enctype="multipart/form-data">
        <label>name</label>
        <input type="text" name="name" id="name">
        <label>prix</label>
        <input type="text" name="prix" id="prix">
        <label>date</label>
        <input type="date" name="date" id="date">
        <label>auteur</label>
        
        <select name="selbooks" id="sel" multiple>
        <?php while ($row = $z->fetch()) : ?>
        <?php echo "<option value= '".htmlspecialchars($row['id'])."'>".htmlspecialchars($row['name'])."</option>" ?>
        <?php endwhile; ?>
        </select>
        
        <label>image</label>
        <input type="file" name="img" width="500px" height="600px" b id="img">
        <input type="submit" name="insert" value="ok">
    </form>


    <table>
        <?php while ($row = $q->fetch()) : ?>
            <tr>
                <td><?php echo htmlspecialchars($row['Id']) ?></td>
                <td><?php echo htmlspecialchars($row['Name']); ?></td>
                <td><?php echo htmlspecialchars($row['prix']); ?></td>
                <td><?php echo htmlspecialchars($row['Ddate']); ?></td>
                <td><img src="../books/<?php echo htmlspecialchars($row['Img']) ?>" alt="immg" width="100px" height="100px"></td>
                <form action="updatebooks.php" method="post">
                    <td><input type="submit" name="modifier"></td>
                    <input type="hidden" name="mod" value="<?php echo htmlspecialchars($row['Id']) ?>">
                </form>
                <form action="delete.php" method="post">
                    <input type="hidden" name="del" value="<?php echo htmlspecialchars($row['Id']) ?>">
                    <td><input type="submit" value="supprimer"></td>
                </form>
            </tr>
        <?php endwhile; ?>
    </table>
</body>

</html>