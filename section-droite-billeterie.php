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
            <p><?= $offre['Nom_Partenaire'];?></p>
          </div>
          <div class="date-offre">
            <p>Publié le 11 décembre 2022</p>
          </div>
        </div>
        <div class="contenu-offre">
          <p>Profitez de -20% sur une sélection de parfum, en partenariat avec l'enseigne Nocibé de Senlis.Merci de vous
            rendre au bureau du CSE pour pouvor passer commande</p>
        </div>
        <div class="en-savoir-plus">
          <p>EN SAVOIR PLUS</p>
          <img src="assets/img/chevron.png" alt="image de chevron">
        </div>
      </div>
      
      <div class="offre">
        <div class="haut-de-page">
          <div class="btn-offre">
            <p>OFFRE</p>
          </div>
          <div class="date-offre">
            <p>Publié le 09 décembre 2022</p>
          </div>
        </div>
        <div class="contenu-offre">
          <p>Achetez dès à présent votre sapin de noël en profitant du partenariat entre le lycée Saint-Vincent 
            et l'association des scouts De l'oise <br>Prix commun à tous : 30€ le petit sapin, 40€ le grand.</p>
        </div>
        <div class="en-savoir-plus">
          <p>EN SAVOIR PLUS</p>
          <img src="assets/img/chevron.png" alt="image de chevron">
        </div>
      </div>
      
      <div class="offre">
        <div class="haut-de-page">
          <div class="btn-offre">
            <p>OFFRE</p>
          </div>
          <div class="date-offre">
            <p>Publié le 10 novembre 2022 - Jusqu'au 30/01/2023</p>
          </div>
        </div>
        <div class="contenu-offre">
          <p>Offre négociée au près de Léonidas, profitez de - 10% toute l'année sur l'ensemble des chocolats dans la boutique de Senlis
            <br>Famille nombreuse (5 enfants et plus) : -5% supplémentaire</p>
        </div>
        <div class="en-savoir-plus">
          <p>EN SAVOIR PLUS</p>
          <img src="assets/img/chevron.png" alt="image de chevron">
        </div>
      </div>
      
      <div class="offre">
        <div class="haut-de-page">
          <div class="btn-offre">
            <p>OFFRE</p>
          </div>
          <div class="date-offre">
            <p>Publié le 11 février 2023 - Jusqu'au 30/05/2023</p>
          </div>
        </div>
        <div class="contenu-offre">
          <p> Offre spécial Nike! Bénéficiez d'une remise de 20% sur votre prochain achat en ligne en utilisant le code promo NIKE20. Cette offre est valable sur tous les produits de notre site web, y compris les nouveautés et les articles en promotion.
            <br>Profitez-en pour vous offrir les dernières tendances en matière de sport et de mode à petit prix. L'offre est limitée dans le temps, alors ne tardez pas !</p>
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