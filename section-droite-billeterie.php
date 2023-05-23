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

    <div class="offre-billeterie">
      <h1>Dernières offres de la billeterie</h1>
      <div class="offre">
        <div class="haut-de-page">
          <div class="btn-offre">
            <p><?= $offre['Nom_Offre']; ?></p>
          </div>
          <div class="date-offre">
            <p>Publié le <?= $offre['Date_Debut_Offre']; ?></p>
          </div>
        </div>
        <div class="contenu-offre">
          <p><?= $offre['Description_Offre']; ?></p>
        </div>
        <div class="en-savoir-plus">
          <p>EN SAVOIR PLUS</p>
          <img src="assets/img/chevron.png" alt="image de chevron">
        </div>
      </div>
      
      <div class="offre">
        <div class="haut-de-page">
          <div class="btn-offre">
            <p><?= $offre['Nom_Offre']; ?></p>
          </div>
          <div class="date-offre">
            <p>Publié le <?= $offre['Date_Debut_Offre']; ?></p>
          </div>
        </div>
        <div class="contenu-offre">
          <p><?= $offre['Description_Offre']; ?></p>
        </div>
        <div class="en-savoir-plus">
          <p>EN SAVOIR PLUS</p>
          <img src="assets/img/chevron.png" alt="image de chevron">
        </div>
      </div>
      
      <div class="offre">
        <div class="haut-de-page">
          <div class="btn-offre">
            <p><?= $offre['Nom_Offre']; ?></p>
          </div>
          <div class="date-offre">
            <p>Publié le <?= $offre['Date_Debut_Offre']; ?></p>
          </div>
        </div>
        <div class="contenu-offre">
          <p><?= $offre['Description_Offre']; ?></p>
        </div>
        <div class="en-savoir-plus">
          <p>EN SAVOIR PLUS</p>
          <img src="assets/img/chevron.png" alt="image de chevron">
        </div>
      </div>
      
      <div class="offre">
        <div class="haut-de-page">
          <div class="btn-offre">
            <p><?= $offre['Nom_Offre']; ?></p>
          </div>
          <div class="date-offre">
            <p>Publié le <?= $offre['Date_Debut_Offre']; ?></p>
          </div>
        </div>
        <div class="contenu-offre">
          <p><?= $offre['Description_Offre']; ?></p>
        </div>
        <div class="en-savoir-plus">
          <p>EN SAVOIR PLUS</p>
          <img src="assets/img/chevron.png" alt="image de chevron">
        </div>
      </div>

        
      </div>
    </div>
  </section>
</div>
</body>
</html>