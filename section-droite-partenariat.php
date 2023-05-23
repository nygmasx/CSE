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
    
    <!-- Création de la section offre billeterie -->


    <div class="partenariat">
      <h1>Voici nos partenaires !</h1>

      <?php
      $statement = $pdo->prepare($sql);
      $statement->execute();
      $offres = $statement->fetchAll();
      foreach ($partenaires as $partenaire) {
        $query = "SELECT * FROM `partenaire_image` INNER JOIN `image` ON  `partenaire_image`.Id_Image = `image`.Id_Image  WHERE `partenaire_image`.Id_Offre = ?";
        $get_all_image = $pdo->prepare($query);
        $get_all_image->execute([$partenaire['Id_Partenaire']]);
        $images = $get_all_image->fetchAll();


      ?>


        <div class="partenaire">
            <div class="image-partenaire">

            </div>

            <div class="info-partenaire">
                 <div class="nom-partenaire">  
                    <p><?= $partenaire['Nom_Partenaire']; ?> </p>
                </div>
                <div class="contenu-partenaire"> contenu offre
                     <p><?= $partenaire['Description_Partenaire'] ?></p>
                </div>
          </div>
          
          <form action="partenariat.php" method="get">
            <input type="hidden" name="Id_Partenaire" value="<?= $partenaire['Id_Partenaire'] ?>">
            <button type="submit" class="en-savoir-plus" data-target="#modal1">
              <p><span>EN SAVOIR PLUS</span></p>
              <img src="assets/img/chevron.png" alt="image de chevron">
            </button>
          </form>
        </div>


      <?php } ?>

  </section>
  </div>


</body>

</html>