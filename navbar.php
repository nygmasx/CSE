<head>

    <link rel="stylesheet" href="style-front-raf.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <title>Lycée Saint-Vincent</title>

</head>


<!-- Header de la page d'accueil -->
<header>
    <div class="fond_gris">
    </div>

    <div class="fond_logo">
        <img src="assets/img/logosv.png" alt="Logo du lycée Saint Vincent">

    </div>
    </section>
    <section class="fond_bleu">
        <label class="menu__btn" for="menu__toggle">
            <span></span>
        </label>

        <!-- Création des éléments de la navbar -->
        <nav>
            <ul class="navbar_elements">
                <a href="index.php" class="active">
                    <li id="accueil">Accueil</li>
                </a>
                <a href="partenariat.php">
                    <li id="partenariat">Partenariat</li>
                </a>
                <a href="billeterie.php">
                    <li id="billeterie">Billeterie</li>
                </a>
                <a href="contact.php">
                    <li id="contact">Contact</li>
                </a>
            </ul>
            <div class="sideNavBackground">
                <div id="mySidenav" class="sidenav">
                    <a id="closeBtn" href="#" class="close">×</a>
                    <ul>
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="partenariat.php">Partenariat</a></li>
                        <li><a href="billeterie.php">Billeterie</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
            </div>
            </div>
            <div class="div-menu-burger">
                <a href="#" id="openBtn">
                    <span class="burger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </a>
            </div>
        </nav>


        <script>
            var bgsidenav = document.getElementsByClassName("sideNavBackground")[0];
            var sidenav = document.getElementById("mySidenav");
            var openBtn = document.getElementById("openBtn");
            var closeBtn = document.getElementById("closeBtn");
            setInterval(function(){
            if(sidenav.classList.contains("active")){          
                document.body.onclick = closeNav;
            }}, 5);
            
            openBtn.onclick = openNav;
            closeBtn.onclick = closeNav;

            /* Set the width of the side navigation to 250px */
            function openNav() {
                sidenav.classList.add("active");
            }

            /* Set the width of the side navigation to 0 */
            function closeNav() {
                sidenav.classList.remove("active");
                setTimeout(function(){
                    location.reload(true);
                },500);
            }

            
        </script>

    </section>
</header>