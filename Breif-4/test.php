elseif ((mysql_num_rows($rep) > 0)){//Si le fichier que l'on veut uploader EST DEJA dans la base de données
        echo $nomfichier;
?>  
        <p>
            Le type de fichier que vous &ecirc;tes sur le point d'ins&eacute;rer <strong>existe déja</strong> dans la base de donn&eacute;es. </br>
            <form name = "choix" method="post" action="">
                <p>
                    <!-- Affichage de la liste des emplcements ou le nom de ce fichier existe -->
                    <input type="radio" name="typefichier" value="existant" id="existant" /> Choisir un emplacement d&eacute;ja existant pour ce type de fichier <br/>
                    <input type="radio" name="typefichier" value="nouveau" id="nouveau" /> Cr&eacute;er un nouvel emplacement pour ce fichier <br/>
                    <input type="submit" value = "Valider" name = "validerchoix" />
                </p>
            </form>  
             
        </p>
         
<?php
            if($_POST['validerchoix']){
                if($_POST['typefichier'] == "existant"){
                    //Affichage de la liste déroulante composée de tous les emplacements suivant le type de fichier choisi
                         
                    $query = "SELECT * FROM fichier_template";
                    $rep = mysql_query($query);
                    if ($rep == 0) {
                        echo mysql_error();
                    }
                    else {
                        echo('<form action="" method="post" enctype="application/x-www-form-urlencoded">');
                        ?>
                        <select name = "listeEmp">
                            <?php
                                while ($row = mysql_fetch_array($rep)) {
                                    echo('<option value="' . $row["emplacement_ft"] . '">' . $row["emplacement_ft"] . "</option>");
                                }
                            echo("</select>");
                            echo'<input type="submit" value = "valider"/>';
                        echo('</form>');
                    }
                }
            }
    }