<?php

require_once "db.php";


$sql = "SELECT * FROM `partenaire`";
$statement = $pdo->prepare($sql);
$statement->execute();
$partenaires = $statement->fetchAll();

$sql = "SELECT * FROM `offre`";
$statement = $pdo->prepare($sql);
$statement->execute();
$offres = $statement->fetchAll();

if (isset($_POST['submit'])) {

    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    $part = $_POST["part"] != 'aucun' ? (int)$_POST["part"] : null;
    $offre = $_POST["offre"] != 'aucun' ? (int)$_POST["offre"] : null;

    if (empty($nom) || empty($prenom) || empty($email) || empty($message)) {
        ?>
        <script>
            alert("Veuillez remplir tous les champs")
        </script>
        <?php
    } else {
        $sql = "INSERT INTO message (Nom_Message, Prenom_Message, Email_Message, Contenu_Message, Id_Offre, Id_Partenaire)
VALUES (:nom, :prenom, :email, :message, :offre, :part)";
        $sql = $pdo->prepare($sql);
        $sql->bindParam('nom', $nom);
        $sql->bindParam('prenom', $prenom);
        $sql->bindParam('email', $email);
        $sql->bindParam('message', $message);
        $sql->bindParam('offre', $offre);
        $sql->bindParam('part', $part);
        $sql->execute();
        header("Location: contact.php");
    }
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
  include("navbar-contact.php");
  ?>

  <div class="page-accueil">
    <?php
    include("section-gauche-contact.php");
    ?>

    <?php
    include("section-droite-contact.php");
    ?>

  </div>

  <?php
  include("footer-contact.php");
  ?>











</body>

</html>

</html>