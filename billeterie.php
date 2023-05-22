<?php
require_once "db.php";
$sql = "SELECT * FROM `partenaire`";
$statement = $pdo->prepare($sql);
$statement->execute();
$partenaires = $statement->fetchAll();
?>
<!DOCTYPE html>
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
    <!-- Header de la page d'accueil -->

    <?php
      include("navbarbilleterie.php")
    ?>

    <!-- Partie principale de la page d'accueil de la billeterie -->
    
    <div class="page-accueil">
        <?php
        include("section-gauche-billeterie.php")
        ?>

        <?php
        include("section-droite-billeterie.php")
        ?>
    </div>

    <!-- Footer de la page billeterie -->
    
    <?php
        include("footer-billeterie.php")
        ?>

</body>
</html>
    <main>

</main>
 
</body>
</html>