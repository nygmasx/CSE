<?php
require_once "db.php";
$sql = "SELECT * FROM `offre` ORDER BY Id_Offre DESC LIMIT 3";
$statement = $pdo->prepare($sql);
$statement->execute();
$offres = $statement->fetchAll();
foreach ($offres as $offre) {
  $query = "SELECT * FROM `offre_image` INNER JOIN `image` ON  `offre_image`.Id_Image = `image`.Id_Image  WHERE `offre_image`.Id_Offre = ?";
  $get_all_image = $pdo->prepare($query);
  $get_all_image->execute([$offre['Id_Offre']]);
  $images = $get_all_image->fetchAll();
}
?>
<?php

if (isset($_GET['Idoffre'])) {
  $query = "SELECT * FROM `offre_image` INNER JOIN `image` ON  `offre_image`.Id_Image = `image`.Id_Image  WHERE `offre_image`.Id_Offre = ?";
  $get_all_image = $pdo->prepare($query);
  $get_all_image->execute([$_GET['Idoffre']]);
  $images = $get_all_image->fetchAll();
  $query = "SELECT * FROM offre WHERE Id_Offre = :id ";
  $get_Info = $pdo->prepare($query);
  $get_Info->bindParam("id", $_GET['Idoffre']);
  $get_Info->execute();
  $offre = $get_Info->fetch();

  $query = "SELECT * FROM `partenaire` WHERE `Id_Partenaire` = ?";
  $statement = $pdo->prepare($query);
  $statement->execute([$offre['Id_Partenaire']]);
  $partenaire = $statement->fetch();
   
  ?>

  <div class="modal" id="modal1" style="display:flex !important;">
    <div class="contenu hidden">
      <span class="fermer">&times;</span>
      <h2> <?=$partenaire['Nom_Partenaire']; ?> : <?= $offre['Nom_Offre']; ?> </h2>
      <div class="contenumodal">

      </div>
      <?php
      if (!empty($images)) {
        
      ?>
      <div class="date-offres">
        <p>Offre valable du <?= $offre['Date_Debut_Offre']; ?> au <?= $offre['Date_Fin_Offre']; ?> </p>
      </div>
        <div class="description-offre">
          <p><?= $offre['Description_Offre'] ?></p>
        </div>
            <div class="img-partenaires"> <?php
            foreach ($images as $img) { ?>
              <img src="assets/<?php echo $img['Nom_Image']; ?>" <?= count($images) >1 ? "style='width: calc(100% /".count($images).");'" : "" ?>>
            
            <?php } ?>
            
            </div>
      <?php
        
      }
      ?>
    </div>
  </div>
  </div>


  <script>
    //Fermer Modal
    let span = document.querySelector(".fermer");
    // Get the modal
    let modal = document.getElementById("modal1");

    span.onclick = function() {
      modal.style.display = "none";
      history.pushState(null, null, window.location.href.split("?")[0]);
    }
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
        history.pushState(null, null, window.location.href.split("?")[0]);
      }
    }
  </script>


<?php
}

?>
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


  <!-- Ajout de la navbar à la page d'accueil -->

  <?php
  include("navbar.php");
  ?>

  <div class="page-accueil">
    <?php
    include("section-gauche.php");
    ?>

    <?php
    include("section-droite.php");
    ?>

  </div>

  <?php
  include("footer.php");
  ?>











</body>

</html>