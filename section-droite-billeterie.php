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

<!-- Création de la page de droite -->
  
<section class="partie-droite">
   

    


    <!-- Création de la section partenaires -->


    <div class="offre-billeterie">
      <h1>Dernières offres de la billeterie</h1>

      <?php
      $sql = "SELECT * FROM offre";
      $statement = $pdo->prepare($sql);
      $statement->execute();
      $offres = $statement->fetchAll();
      foreach ($offres as $offre) {
        $query = "SELECT * FROM `offre_image` INNER JOIN `image` ON  `offre_image`.Id_Image = `image`.Id_Image  WHERE `offre_image`.Id_Offre = ?";
        $get_all_image = $pdo->prepare($query);
        $get_all_image->execute([$offre['Id_Offre']]);
        $images = $get_all_image->fetchAll();


      ?>


        <div class="offre">
          <div class="haut-de-page">
            <div class="btn-offre">
              <p><?= $offre['Nom_Offre']; ?></p>
            </div>
            <div class="date-offre">
              <p>Offre valable du <?= $offre['Date_Debut_Offre']; ?> au <?= $offre['Date_Fin_Offre']; ?> </p>
            </div>
          </div>
          
          <div class="contenu-offre">
            <p><?= $offre['Description_Offre'] ?></p>
          </div>
          <form action="billeterie.php" method="get">
            <input type="hidden" name="Idoffre" value="<?= $offre['Id_Offre'] ?>">
            <button type="submit" class="en-savoir-plus" data-target="#modal1">
              <p><span>EN SAVOIR PLUS</span></p>
              <img src="assets/img/chevron.png" alt="image de chevron">
            </button>
          </form>
        </div>


      <?php } ?>

  </section>
  </div>
  </section>
  </div>
</body>
</html>