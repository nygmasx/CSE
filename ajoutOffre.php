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
$sql = "SELECT * FROM `partenaire`";
$statement = $pdo->prepare($sql);
$statement->execute();
$partenaires = $statement->fetchAll();

if (isset($_POST['submit'])) {
    $nom = $_POST["nom"];
    $description = $_POST["description"];
    $nbplace = $_POST["nbplace"];
    $partenaire = $_POST['partenaire'];
    $date = $_POST['date'];
    $date2 = $_POST['date2'];
    $type_image = $_FILES['image']['tmp_name'];


    if (empty($nom) || empty($description) || empty($nbplace)|| empty($date)|| empty($date2) || empty($_FILES['image'])|| empty($partenaire)) {
        ?>
        <script>
            alert("Veuillez remplir tous les champs")
        </script>
        <?php
    } else {
        $query = "INSERT INTO `offre` (`Nom_Offre`,`Description_Offre`,`Date_Debut_Offre`,`Date_Fin_Offre`,`Nombre_Place_Min_Offre`,`Id_Partenaire`) VALUES (?,?,?,?,?,?)";

        $query = $pdo->prepare($query);
        $query->execute([$nom, $description, $date, $date2, $nbplace, $partenaire]);
        $id_offre = $pdo->lastInsertId();

        if (count($_FILES['image']['tmp_name']) > 0){
            foreach ($_FILES['image']['tmp_name'] as $key => $img){
                $nom_image = $_FILES['image']['name'][$key];
                move_uploaded_file($img, "assets/" . $nom_image);
                $sql = "INSERT INTO `image` (`Nom_Image`) VALUES (:image)";
                $sql = $pdo->prepare($sql);
                $sql->bindParam('image',$nom_image);
                $sql->execute();
                $last_id_img = $pdo->lastInsertId();


                $sql = "INSERT INTO `offre_image` (`Id_Image`,`Id_Offre`) VALUES (:image, :offre)";
                $sql = $pdo->prepare($sql);
                $sql->bindParam('image',$last_id_img);
                $sql->bindParam('offre',$id_offre);
                $sql->execute();

            }
            header("Location: back-billeterie.php");
        }

    }
}

?>

<body>
<nav class="navbar">
    <div class="max-width">
        <ul class="menu">
            <li><a href="backoffice.php">Accueil</a></li>
            <li><a href="partenariats.php">Partenariats</a></li>
            <li><a href="back-billeterie.php">Billeterie</a></li>
            <li><a href="commentaires.php">Contact</a></li>
            <li><a href="administrateurs.php">Administrateurs</a></li>
        </ul>
    </div>
    </div>
    <img class="logo" src="utilisateur.png" alt="user">
</nav>

<div class="ajout">
    <h1>Ajouter une Offre</h1>

    <div class="form">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="ligne">

                <div class="ligne">
                    <label for="exampleFormControlInput100" class="form-label">Partenaire</label>
                    <br>
                    <select type="text" style="color: #000;" class="nom" id="exampleFormControlInput100 " name="partenaire">
                        <?php
                        foreach ($partenaires as $part){
                            echo '<option value="' . $part['Id_Partenaire'] . '">' .$part['Nom_Partenaire'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <label for="exampleFormControlInput1" class="form-label">Nom de l'offre</label>
                <br>
                <input type="text" class="nom" id="exampleFormControlInput1 " name="nom">
            </div>

            
            <div class="ligne">
                <label for="exampleFormControlTextarea1" class="form-label">Description de l'offre</label> <br>
                <textarea class="description" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
            </div>
            <div class="ligne">
                <label for="exampleFormControlTextarea1" class="form-label">Date de début de l'offre</label> <br>
                <input type="date" name="date">
            </div>
            <div class="ligne">
                <label for="exampleFormControlTextarea1" class="form-label">Date de fin de l'offre</label> <br>
                <input type="date"  name="date2">
            </div>

            <div class="ligne">
                <label for="exampleFormControlTextarea1" class="form-label">Place Min. Offre</label> <br>
                <input type="number" class="nom" name="nbplace">
            </div>

            <div class="ligne">
                <label for="exampleFormControlInput1" class="form-label">Image</label> <br>
                <input multiple type="file" class="image" id="exampleFormControlInput1" name="image[]"><br>

            </div>

            <div class="submit">
                <a href="#"><button type="submit" class="btn btn-primary me-md-2" name="submit">Ajouter</button></a>
            </div>
        </form>
    </div>
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