<?php
include('config.php');
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

<form action="insertaut.php" method="post" enctype="multipart/form-data">
        <label>name</label>
        <input type="text" name="name" id="name">
        <label>image</label>
        <input type="file" name="img" width="500px" height="600px" id="img">
        <input type="submit" name="insert" value="ok">
</form>
<table>
        <?php while ($row = $z->fetch()) : ?>
            <tr>
                <td><?php echo htmlspecialchars($row['id']) ?></td>
                <td><?php echo htmlspecialchars($row['name']); ?></td>
                <td><img src="../Auteur/<?php echo htmlspecialchars($row['img']) ?>" alt="immg" width="100px" height="100px"></td>
                <form action="updateaut.php" method="post">
                    <td><input type="submit" name="modifier"></td>
                    <input type="hidden" name="mod" value="<?php echo htmlspecialchars($row['id']) ?>">
                </form>
                <form action="deleteaut.php" method="post">
                    <input type="hidden" name="del" value="<?php echo htmlspecialchars($row['id']) ?>">
                    <td><input type="submit" value="supprimer"></td>
                </form>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>