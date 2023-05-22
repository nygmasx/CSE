<?php
include ('C:\xampp\htdocs\projet_final\db.php');
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Nos Partenaires</title>
        <link href="partenaire.css" rel="stylesheet">
        <link rel="icon" href="images/Logo_parNodevo.png">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        <link href="header.css" rel="stylesheet">
        <link href="banderole.css" rel="stylesheet">
        <link href="footer.css" rel="stylesheet">
    </head>
    <body>
        <?php include ('header.php');?>
        <main>
            <div class="all">
                <?php include ('banderole.php'); ?>
                <?php
                $sql = "SELECT * FROM `partenaire`";
                $statement = $pdo->prepare($sql);
                $statement->execute();
                $partenaires = $statement->fetchAll();
                foreach ($partenaires as $partenaire){
                $id_image = $partenaire['Id_Image'];
                $sql2 = $pdo->prepare("SELECT * FROM `image` WHERE `Id_Image` = ?");
                $sql2->execute([$id_image]);
                $data = $sql2->fetch();

                ?>
                <section class="partenaire">
                    <div class="contenant-partenaire">
                        <h1>Nos partenaires</h1>
                        <div class="contenant-ligne-partenaire">
                            <ul class="contenant-liste-partenaire">
                                <div class="carre-partenaire">
                                    <li class="liste-partenaire">
                                        <div class="image-partenaire">
                                            <img src="C:\xampp\htdocs\projet_final\assets\<?php echo $data['Nom_Image'];?>">
                                        </div>
                                        <h2><?= $partenaire['Nom_Partenaire'];?></h2>
                                        <div class="texte-partenaire">
                                            <p style="text-align: center;: ;"><?=$partenaire['Description_Partenaire'];?></p>
                                        </div>
                                        <a class="redirection" href="#" id="myBtn">Découvrir</a>
                                    </li>
                                    <div id="myModal" class="modal">
                                <!-- Modal content -->
                                <div class="modal-content">
                                    <span class="close">&times;</span>
                                    <div class="header-modal">
                                        <h3><?= $partenaire['Nom_Partenaire'];?></h3>
                                    </div>
                                    <div class="body-modal">
                                        <div class="photo-partenaire">
                                            <img src="C:\xampp\htdocs\projet_final\assets\<?php echo $data['Nom_Image'];?>" class="photo">
                                        </div>
                                        <p style="text-align: center;: ;"><?=$partenaire['Description_Partenaire'];?></p>
                                    </div>
                                    <div class="footer-modal">
                                        <a class="lien-offre" href="<?=$partenaire['Lien_Partenaire']; ?>">Lien vers le partenaire</a>
                                    </div>
                                    <script src="modale.js" defer></script>
                                </div>
                                </div>
                            </ul>
                        </div>
                    </div>
                </section>
            </div>
        </main>
        <?php
        }
        ?>
        ?>
        <?php include ("footer.php"); ?>
        <script src="script.js" defer></script>
    </body>
</html>