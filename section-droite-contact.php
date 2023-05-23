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
  

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Contactez-nous</title>
    <link href="contact.css" rel="stylesheet">
    <link rel="icon" href="images/Logo_parNodevo.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="header.css" rel="stylesheet">
    <link href="banderole.css" rel="stylesheet">
    <link href="footer.css" rel="stylesheet">
</head>
<body>


<main>
    <div class="all">

        <section class="contact">
            <div class="contenant-contact">
                <h1>Contactez-nous !</h1>
                <div class="contenant-formulaire">
                    <form action="#" method="post">
                        <input type="text" name="nom" placeholder="Nom" required>

                        <input type="text" name="prenom" placeholder="Prénom" required>

                        <input type="email" name="email" placeholder="E-mail" required>

                        <select name="offre" id="offre" required>
                            <option disabled value="offre">Une offre</option>
                            <?php
                            if (!empty($offres)) {
                                foreach ($offres as $offre) {
                                    ?>
                                    <option value="<?= $offre['Id_Offre'] ?>"><?= $offre['Nom_Offre'] ?></option>
                                    <?php
                                }
                            }

                            ?>
                            <option value="aucun">Aucune des propositions</option>
                        </select>
                        <select name="part" id="part" required>
                            <option disabled value="partenaire">Un partenaire</option>
                            <?php
                            if (!empty($partenaires)) {
                                foreach ($partenaires as $part) {
                                    ?>
                                    <option value="<?= $part['Id_Partenaire'] ?>"><?= $part['Nom_Partenaire'] ?></option>
                                    <?php
                                }
                            }

                            ?>
                            <option value="aucun">Aucune des propositions</option>
                        </select>

                        <textarea name="message" placeholder="Entrez votre message." required></textarea>

                        <button name="submit" type="submit">Envoyer</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</main>
</body>

  </section>
  </div>


</body>

</html>