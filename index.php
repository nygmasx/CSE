<?php
require_once "db.php";
$sql = "SELECT * FROM `offre`";
$statement = $pdo->prepare($sql);
$statement->execute();
$offres = $statement->fetchAll();
foreach ($offres as $offre) {
    $query = "SELECT * FROM `offre_image` INNER JOIN `image` ON  `offre_image`.Id_Image = `image`.Id_Image  WHERE `offre_image`.Id_Offre = ?";
    $get_all_image = $pdo->prepare($query);
    $get_all_image->execute([$offre['Id_Offre']]);
    $images = $get_all_image->fetchAll();
}
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="style-front-raf.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Lycée Saint-Vincent</title>
  <script defer src='index.js'></script>

</head>

<body>

<!-- Ajout de la navbar à la page d'accueil -->
  
  <?php 
    include("navbar.php");
  ?>

<div class="page-accueil">
    <?php 
      include("section-gauche.php");
    ?>

    <?php
    include ("section-droite.php");
    ?>
  
</div>

    <?php
      include("footer.php");
    ?>
  
  









</body>

</html>