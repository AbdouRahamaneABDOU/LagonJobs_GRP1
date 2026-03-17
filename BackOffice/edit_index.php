<?php
//modification de l'offre   
require_once(__DIR__ . '/bdd.php');

$sqlQuery='SELECT * FROM  categorie';
$selectCat=$mysqlClient->prepare($sqlQuery);
$selectCat->execute();
$Cate=$selectCat->fetchAll();

$sqlQuery='SELECT * FROM  statut';
$selectStatut=$mysqlClient->prepare($sqlQuery);
$selectStatut->execute();
$Statut=$selectStatut->fetchAll();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification de l'offre</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header class="site-header">
        <div class="container header-inner">
            <a href="index.html" class="logo">
                <span class="wave"></span>Lagon<span>Jobs</span>
        </a>
            <nav class="nav">
                <a href="index.php">Tableau de bord</a>
                <a href="user.php">Utilisateurs</a>
                <a href="offre.php">Offres</a>
                <a href="contacts.php">Contact</a>
                
            </nav>
        </div>
    </header>
    
    <main class="hero">

        <div class="container">
            <h1>Modification de l'offre</h1>
            <form action="index.php" method="POST" class="form">

                <div>
                    <input name="mod_id" type="hidden" value="<?php echo $_POST['id_edit']?>">

                    <label>Titre</label>
                    <input type="text" name="mod_metier" value="<?php echo $_POST['Titre_edit']?>">
                    
                    <label>description</label>
                    <textarea name="mod_description" ><?php echo $_POST['Desc_edit']?></textarea>

                    <label for="listbox" name="categorie">Catégorie</label>
                    <select name="mod_categorie" >
                        <?php 
                        for ($i=0;$i<count($Cate);$i++) {
                            if(isset($_POST['Cat_edit']) && $Cate[$i]['Id']===intval($_POST['Cat_edit'])) { 
                                echo "<option value=".$Cate[$i]['Id']."selected>".$Cate[$i]['NomCategorie']."</option>";
                            }else{
                                echo "<option value=".$Cate[$i]['Id'].">".$Cate[$i]['NomCategorie']."</option>";
                            }
                        } ?>
                    </select>

                    <label for="listbox" name="statut">Statut</label>
                    <select name="mod_statut" >
                        <?php 
                        for ($i=0;$i<count($Statut);$i++) {
                            if(isset($_POST['Statut_edit']) && $Statut[$i]['Id']===intval($_POST['Statut_edit'])) { 
                                echo "<option value=".$Statut[$i]['Id']." selected>".$Statut[$i]['NomStatut']."</option>";
                            }else{
                                echo "<option value=".$Statut[$i]['Id'].">".$Statut[$i]['NomStatut']."</option>";
                            }
                        } ?>
                    </select>
                    <a href="index.php" class="btn">Annuler</a>
                    <button type="submit" class="btn">Modifier</button>
                    
                </div>
            </form>
                    
        </div>
    </main>
   
    <footer class="site-footer">
        <div class="container footer-inner">
            <p>© 2025 LagonJobs — Tous droits réservés</p>
            <b> Confidentialité  <a href="contact.html">Nous contacter</a> </b>
        </div>
    </footer>
</body>
</html>
