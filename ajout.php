<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styleajout.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <title>Ajouter | CSE Lycée Saint Vincent</title>
</head>
<?php

//Connexion PDO
require_once "db.php";

if (isset($_POST['submit'])) {
    $nom = $_POST["nom"];
    $description = $_POST["description"];
    $lien = $_POST["lien"];
    $nom_image = $_FILES['image']['name'];
    $type_image = $_FILES['image']['tmp_name'];
    echo $nom_image;

    if (empty($nom) || empty($description) || empty($lien) || empty($nom_image)) {
        ?>
        <script>
            alert("Veuillez remplir tous les champs")
        </script>
        <?php
    } else {
        move_uploaded_file($_FILES['image']['tmp_name'], "assets/" . $nom_image);
        $sql = "INSERT INTO `image` (`Nom_Image`) VALUES (:image)";
        $sql = $pdo->prepare($sql);
        $sql->bindParam('image',$nom_image);
        $sql->execute();

        $sql = $pdo->prepare("SELECT Id_Image FROM image WHERE Nom_Image = :nom ");
        $sql->bindParam('nom',$nom_image);
        $sql->execute();
        $image = $sql->fetch();

        echo $image["Id_Image"];

        $sql = "INSERT INTO partenaire (Nom_partenaire, Description_partenaire, Lien_partenaire, Id_image) VALUES (:nom, :description, :lien, :image)";
        $sql = $pdo->prepare($sql);
        $sql->bindParam(':nom', $nom);
        $sql->bindParam(':description', $description);
        $sql->bindParam(':lien', $lien);
        $sql->bindParam(':image', $image["Id_Image"]);
        header("Location: partenariats.php");
        $sql->execute();
        echo "L'image a été uploadée avec succès";
    }
}

?>

<body>
<nav class="navbar">
    <div class="max-width">
        <ul class="menu">
            <li><a href="backoffice.php">Accueil</a></li>
            <li><a href="partenariats.php">Partenariats</a></li>
            <li><a href="">Billeterie</a></li>
            <li><a href="">Contact</a></li>
        </ul>
    </div>
    </div>
    <img class="logo" src="utilisateur.png" alt="user">
</nav>


<h1>Ajouter un partenaire</h1>

<div class="form">
    <form action="ajout.php" method="post" enctype="multipart/form-data">
        <div class="ligne">
            <label for="exampleFormControlInput1" class="form-label">Nom</label> <br>
            <input type="text" class="nom" id="exampleFormControlInput1 " name="nom">
        </div>
        <div class="ligne">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label> <br>
            <textarea class="description" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
        </div>
        <div class="ligne">
            <label for="exampleFormControlInput1" class="form-label">Lien</label> <br>
            <input type="url" class="lien" id="exampleFormControlInput1" placeholder="https://"
                   name="lien">
        </div>

        <div class="ligne">
            <label for="exampleFormControlInput1" class="form-label">Image</label> <br>
            <input type="file" class="image" id="exampleFormControlInput1" name="image">
        </div>

        <div class="submit">
            <a href="#"><button type="submit" class="btn btn-primary me-md-2" name="submit">Ajouter</button></a>
        </div>
    </form>
</div>

<div id="confirmModal" class="modal">
    <div class="modal-content">
        <h2> Le partenaire a été ajouté</h2>
        <div class="modal-buttons">
            <button id="cancelBtn">Confirmer</button>
        </div>
    </div>
</div>

</body>
</html>