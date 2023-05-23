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
    <div class="bienvenue">
      <h2>CSE Lycée Saint Vincent</h2>
      <p>Nous vous souhaitons la bienvenue sur le site du comité social et économique du lycée Saint-Vincent à Senlis.
        <br>
        Découvrez l’<span>équipe</span> et le <span>rôle</span> et missions de votre CSE.
      </p>
    </div>

    <!-- Création de la section offre billeterie -->


    <div class="offre-billeterie">
      <h1>Dernières offres de la billeterie</h1>
    
    <?php
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
            <p>Publié le <?= $offre['Date_Debut_Offre']; ?></p>
          </div>
        </div>
        <div class="contenu-offre">
          <p><?= $offre['Description_Offre'] ?></p>
        </div>
        <div class="en-savoir-plus" data-target="#modal1">
          <p><span>EN SAVOIR PLUS</span></p>
          <img src="assets/img/chevron.png" alt="image de chevron">

          
          <div class="modal" id="modal1">
            <div class="contenu hidden">
              <span class="fermer">&times;</span>
              <h1>PROJET 1</h1>
              <div class="contenumodal">
                <img src="projetalex.png">
                <p>C'est le premier projet effectué en classe. Ce fut pour moi l'occasion d'expérimenter pour la première fois l'utilisation du langage HTML et CSS. Le but était de reproduire le plus fidèlement possible un exemple de CV. Je m'occupais de la partie où Alex donne ses données personnelles.</p>
                < </div>
                  <div class="temps">
                    <h3>Temps accordé : <span>~ 2 heures</span></h3>
                  </div>
                  <div class="techno">
                    <h3>Technologies utilisées :</h3>
                    <img src="html.png">
                    <img src="css.png">
                  </div>
              </div>
            </div>
          </div>
        </div>
<?php } ?>

  </section>
  </div>

  <script>
    //Fermer Modal
    let span = document.getElementsByClassName("fermer")[0];
    // Get the modal
    let modal = document.getElementById("modal");
    span.onclick = function() {
      modal.style.display = "none";
    }
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  </script>
</body>

</html>