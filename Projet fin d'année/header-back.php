<header>
    <div class="hautnav"></div>
    <nav class="navbar">
        <div class="nav-links">
            <img src="images/se-deconnecter.png" class="logout" id="logout-img">
            <a href="index.php" id="logout-text">Déconnexion</p>
            <ul class="contenant-liste">
                <div id="accueil" class="fond-nav"><li class="boutons-liste"><a class="liennav" href="backoffice.php">Accueil</a></li></div>
                <div id="partenariat" class="fond-nav"><li class="boutons-liste"><a class="liennav" href="partenaire-back.php">Partenaires</a></li></div>
                <div id="billetterie" class="fond-nav"><li class="boutons-liste"><a class="liennav" href="billetterie-back.php">Offres</a></li></div>
                <div id="contact" class="fond-nav"><li class="boutons-liste"><a class="liennav" href="contact-back.php">Messagerie</a></li></div>
            </ul>
        </div>
        <div class="dropdown_menu">
            <ul class="contenant-liste">
                <div id="accueil" class="fond-nav"><li class="boutons-liste"><a class="liennav" href="index.php">Accueil</a></li></div>
                <div id="partenariat" class="fond-nav"><li class="boutons-liste"><a class="liennav" href="partenaire.php">Partenaires</a></li></div>
                <div id="billetterie" class="fond-nav"><li class="boutons-liste"><a class="liennav" href="billetterie.php">Offres</a></li></div>
                <div id="contact" class="fond-nav"><li class="boutons-liste"><a class="liennav" href="contact.php">Messagerie</a></li></div>
                <div id="logout" class="fond-nav"><li class="boutons-liste"><a class="liennav" href="index.php">Deconnexion</a></li></div>
            </ul>
        </div>
        <img src="images/menu-btn.png" alt="menu hamburger" class="menu-hamburger">
    </nav>
</header>

<script>
    
// Sélectionnez l'image "logout" en utilisant son identifiant
var logoutImg = document.getElementById("logout-img");

// Sélectionnez l'élément texte de déconnexion en utilisant son identifiant
var logoutText = document.getElementById("logout-text");

// Ajouter un gestionnaire d'événements de clic à l'image "logout"
logoutImg.addEventListener("click", function() {
    // Afficher le texte de déconnexion
    logoutText.style.display = "block";

});
</script>