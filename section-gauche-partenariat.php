<head> 
<script defer src='index.js'></script>
</head>
<!-- Création de la section info -->

<section class="info">
    <div class="accueil">
        <div class="homelogo">
        <img src="assets/img/page-daccueil.png" alt="icone d'accueil">
        </div>
        <div class="arrow">
            <img src="assets/img/chevron.png" alt="icone de chevron">
        </div>
        <h3> <a href="index.php">Accueil</a></h3>
    </div>

    <!-- Création des accès rapides -->

    <div class="titre1">
      <h2>Accès rapide</h2>
    </div>

    <div class="raccourci1">
      <img src="assets/img/chevron.png" alt="icone de chevron">
      <a href="billeterie.php">Offres / Billeterie</a>
    </div>

    <div class="raccourci2">
      <img src="assets/img/chevron.png" alt="icone de chevron">
      <a href="contact.php">Nous contacter</a>
    </div>

    <!-- Création de la section informations de contact -->

    <div class="titre2">
      <h2>Informations de contact</h2>
    </div>
    <div class="info1">
      <img src="assets/img/chevron.png" alt="icone de chevron">
      <p>Par téléphone : <a href="tel:+33 3 03 03 03 03"><span>+33303030303</span></a></p>
    </div>
    <div class="info2">
      <img src="assets/img/chevron.png" alt="icone de chevron">
      <p> Par mail: <a href="mailto:cse@lyceestvincent.fr"><span>cse@lyceestvincent.fr</span></a> </p>
    </div>

    <div class="info3">
      <img src="assets/img/chevron.png" alt="icone de chevron">
      <p>Au lycée : <span> Bureau du CSE <br>(1er étage bâtiment Saint-Vincent)</span></p>
    </div>

    <!-- Création de la section partenaires -->

    <div class="titre3">
      <h2>Nos partenaires</h2>
    </div>
    <section class="banderole">
    <div class="contenant-slider">
       <div class="slider">
            <div class="fleche-gauche"><img src="assets/img/chevron.png"></div>
                <div class="contenant-image-slider">
                  <img src="assets/img/leonidas.png" class="slide-image 1" alt="">
                    <img src="assets/img/renault.png" class="slide-image 2" alt="Logo de Renault">
                            <img src="assets/img/astérix.jpg" class="slide-image 3" alt="Logo d'Astérix">
                                    </div>
                                    <div class="fleche-droite"><img src="assets/img/chevron.png"></div>
                                </div>

                                <div class="cont-btn">
                                    <div class="btn-nav gauche" data-index="1"></div>
                                    <div class="btn-nav milieu" data-index="2"></div>
                                    <div class="btn-nav droite" data-index="3"></div>
                                </div>
                              </div>

    </section>
    <div class="discover">
        <p>Découvrez tous <a href="partenariat.php">nos partenaires</a></p>
    </div>
  </section>
  
  <script>
    function initSlider() {
    const slider = document.querySelector('.contenant-image-slider');
    const slides = slider.querySelectorAll('.slide-image');
    const prevBtn = document.querySelectorAll('.fleche-gauche')[0];
    const nextBtn = document.querySelectorAll('.fleche-droite')[0];
    const dots = document.querySelectorAll('.btn-nav');
    let slideIndex = 0;
  
    function showSlide(n) {
      // Affiche le slide correspondant à l'index donné
      slides.forEach(slide => slide.style.display = 'none');
      dots.forEach(dot => dot.classList.remove('active'));
      slides[n].style.display = 'block';
      dots[n].classList.add('active');
    }
  
    function nextSlide() {
      // Passe au slide suivant
      slideIndex++;
      if (slideIndex > slides.length - 1) {
        slideIndex = 0;
      }
      showSlide(slideIndex);
  
      // Met à jour le bouton actif
      updateActiveButton();
    }
  
    function prevSlide() {
      // Passe au slide précédent
      slideIndex--;
      if (slideIndex < 0) {
        slideIndex = slides.length - 1;
      }
      showSlide(slideIndex);
  
      // Met à jour le bouton actif
      updateActiveButton();
    }
  
    function currentSlide(n) {
      // Affiche le slide correspondant au bouton cliqué
      slideIndex = n;
      showSlide(slideIndex);
  
      // Met à jour le bouton actif
      updateActiveButton();
    }
  
    function updateActiveButton() {
      // Met à jour le bouton actif
      dots.forEach((dot, index) => {
        if (index === slideIndex) {
          dot.classList.add('active');
        } else {
          dot.classList.remove('active');
        }
      });
    }
  
    // Affiche le premier slide et le bouton actif au chargement de la page
    showSlide(slideIndex);
    updateActiveButton();
  
    // Ajoute les événements click pour les flèches et les boutons
    prevBtn.addEventListener('click', prevSlide);
    nextBtn.addEventListener('click', nextSlide);
    dots.forEach((dot, index) => {
      dot.addEventListener('click', () => currentSlide(index));
      // Met à jour le bouton actif lorsqu'il est cliqué
      dot.addEventListener('click', updateActiveButton);
    });
  
    // Définit l'intervalle de temps entre chaque changement de slide en millisecondes
    const intervalTime = 5000;
  
    // Démarre l'animation automatique
    let slideInterval = setInterval(() => {
      nextSlide();
    }, intervalTime);
  
    // Arrête l'animation automatique lorsqu'un bouton est cliqué
    const sliderContainer = document.querySelector('.contenant-slider');
    sliderContainer.addEventListener('click', () => {
      clearInterval(slideInterval);
      slideInterval = setInterval(() => {
        nextSlide();
      }, intervalTime);
    });
  }
  
  if (document.querySelector('.banderole')) {
    initSlider();
  }
  </script>

</body>