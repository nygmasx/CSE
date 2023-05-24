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
        $query = "SELECT * FROM `image` INNER JOIN `partenaire` ON  `image`.Id_Image = `partenaire`.Id_Image  WHERE `partenaire`.Id_Partenaire = ?";
        $get_all_image = $pdo->prepare($query);
        $get_all_image->execute([$partenaire['Id_Partenaire']]);
        $images = $get_all_image->fetch();


      ?>


        <div class="partenaire">
          <div class="détail-partenaire" style="display:flex";>
            <div class="image-partenaire">
                <img src="assets/<?= $images['Nom_Image'] ?>">
            </div>

            <div class="info-partenaire">
                 <div class="nom-partenaire">  
                    <h3><?= $partenaire['Nom_Partenaire']; ?> </h3>
                </div>
                <div class="contenu-partenaire"> 
                     <p><?= $partenaire['Description_Partenaire'] ?></p>
                </div>
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