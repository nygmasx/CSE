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
        Découvrez l’<span>équipe</span> et le <span>rôle</span> et missions de votre CSE.</p>
    </div>

    <!-- Création de la section offre billeterie -->

    <div class="offre-billeterie">
      <h1>Dernières offres de la billeterie</h1>
      <div class="offre">
        <div class="haut-de-page">
          <div class="btn-offre">
            <p>OFFRE</p>
          </div>
          <div class="date-offre">
            <p>Publié le 11 décembre 2022</p>
          </div>
        </div>
        <div class="contenu-offre">
          <p>Profitez de -20% sur une sélection de parfum, en partenariat avec l'enseigne Nocibé de Senlis.Merci de vous
            rendre au bureau du CSE pour pouvor passer commande</p>
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
                      <     </div>
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

      <div class="btn-offres">
        <a href="billeterie.php">Découvrir toutes nos offres ></a>
        
      </div>
    </div>
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