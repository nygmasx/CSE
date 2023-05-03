
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    //Connexion PDO
    require 'db.php';

    if (isset($_GET['id']) || isset($_POST['id'])){
        $id = $_GET['id'] ?? $_POST['id'];

        $query = "SELECT * FROM partenaire WHERE Id_Partenaire = :id LIMIT 1";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam("id",$id);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);



        if (isset($_POST['submit'])){
            $nom = $_POST['nom'];
            $description = $_POST['description'];
            $lien = $_POST['lien'];
            $nom_Image = $_FILES['image']['name'];
            $sql = "INSERT INTO `image` (`Nom_Image`) VALUES (:image)";
            $sql = $pdo->prepare($sql);
            $sql->bindParam('image',$nom_Image);
            $sql->execute();
            $last_id = $pdo->lastInsertId();
            try {
                move_uploaded_file($_FILES['image']['tmp_name'], 'assets/' . $nom_Image);
                $query = "UPDATE partenaire SET Nom_Partenaire =:nom, Description_Partenaire =:description, Lien_Partenaire =:lien, Id_Image =:image WHERE Id_Partenaire =:id";
                $stmt = $pdo->prepare($query);
                $stmt->bindParam(':nom', $nom);
                $stmt->bindParam(':description', $description);
                $stmt->bindParam(':lien', $nom);
                $stmt->bindParam(':image', $last_id);
                $stmt->bindParam(':id', $id);
                $query_execute = $stmt->execute();
                header("Location: partenariats.php");

            }catch (PDOException $e){
                echo $e->getMessage();
            }
        }
        ?>


<head>
    <link rel="stylesheet" type="text/css" href="styleajout.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>

<body>
<nav class="navbar">
    <div class="max-width">
        <ul class="menu">
        <li><a href="backoffice.php">Accueil</a></li>
            <li><a href="partenariats.php">Partenariats</a></li>
            <li><a href="billeterie.php">Billeterie</a></li>
            <li><a href="commentaires.php">Contact</a></li>
            <li><a href="administrateurs.php">Administrateurs</a></li>
        </ul>
    </div>
    </div>
    <img class="logo" src="utilisateur.png" alt="user">
</nav>
<div class="ajout">
    <h1>Modifier un partenaire</h1>

    <div class="form">
        <form action="update.php" method="post" enctype="multipart/form-data">
            <input type="hidden"  value="<?= $_GET['id'] ?? null ?>" name="id">

            <div class="ligne">
                <label for="exampleFormControlInput1" class="form-label">Nom</label> <br>
                <input type="text" class="nom" id="exampleFormControlInput1" value="<?= $data['Nom_Partenaire'];?>" name="nom">
            </div>
            <div class="ligne">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label> <br>
                <input class="description" id="exampleFormControlTextarea1" rows="3" value="<?= $data['Description_Partenaire'];?>" name="description" type="text"></input>
            </div>
            <div class="ligne">
                <label for="exampleFormControlInput1" class="form-label">Lien</label> <br>
                <input type="url" class="lien" value="<?=$data['Lien_Partenaire'];?>" id="exampleFormControlInput1" placeholder="https://"
                       name="lien">
            </div>

            <div class="ligne">
                <label for="exampleFormControlInput1" class="form-label">Image</label> <br>
                <input type="file" class="image" value="<?php echo $nom_Image['Nom_Image'] ;?>" id="exampleFormControlInput1" name="image">
            </div>

            <div class="submit">
                <a href="#"><button type="submit" class="btn btn-primary me-md-2" value="submit" name="submit">Modifier</button></a>
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
<?php
    } else{
        //echo "<h1  class='alert'>Erreur : ID Partenaire introuvable</h1>";
    }

?>


</html>
