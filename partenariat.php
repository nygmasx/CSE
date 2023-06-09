<?php
require_once "db.php";
$sql = "SELECT * FROM `partenaire`";
$statement = $pdo->prepare($sql);
$statement->execute();
$partenaires = $statement->fetchAll();
foreach ($partenaires as $partenaire) {
  $id_image = $partenaire['Id_Image'];
  $sql2 = $pdo->prepare("SELECT * FROM `image` WHERE `Id_Image` = ?");
  $sql2->execute([$id_image]);
  $data = $sql2->fetch();
}
?>
<?php

if (isset($_GET['Id_Partenaire'])) {
  $query = "SELECT * FROM `partenaire_image` INNER JOIN `image` ON  'Partenaire_image`.Id_Image = `image`.Id_Image  WHERE `Partenaire_image`.Id_Partenaire = ?";
  $get_all_image = $pdo->prepare($query);
  $get_all_image->execute([$_GET['Id_Partenaire']]);
  $images = $get_all_image->fetchAll();
  $query = "SELECT * FROM offre WHERE Id_Partenaire = :id ";
  $get_Info = $pdo->prepare($query);
  $get_Info->bindParam("id", $_GET['Id_Partenaire']);
  $get_Info->execute();
  $partenaire = $get_Info->fetch();

  $query = "SELECT * FROM `partenaire` WHERE `Id_Partenaire` = ?";
  $statement = $pdo->prepare($query);
  $statement->execute([$_GET['Id_Partenaire']]);
  $partenaire = $statement->fetch();

?>

  <div class="modal" id="modal1" style="display:flex !important;">
    <div class="contenu hidden">
      <span class="fermer">&times;</span>
      <h2> <?= $partenaire['Nom_Partenaire']; ?> </h2>
      <div class="contenu-modal">
         <p><?= $partenaire['Description_Partenaire'] ?></p>
       </div>
       
      <?php
      if (!empty($images)) {

      ?>

        <div class="img-partenaires"> <?php
                                      foreach ($images as $img) { ?>
            <img src="assets/<?php echo $img['Nom_Image']; ?>" <?= count($images) > 1 ? "style='width: calc(100% /" . count($images) . ");'" : "" ?>>

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
  include("navbar-partenariat.php");
  ?>

  <div class="page-accueil">
    <?php
    include("section-gauche.php");
    ?>

    <?php
    include("section-droite-partenariat.php");
    ?>

  </div>

  <?php
  include("footer-partenariat.php");
  ?>

</body>

</html>