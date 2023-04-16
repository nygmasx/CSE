
<?php
    include 'header.php';
    //Connexion PDO
    require 'db.php';

    if (isset($_GET['id'])){
        $id = $_GET['id'];

        $query = "SELECT * FROM partenaire WHERE Id_Partenaire = :id LIMIT 1";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam("id",$id);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        $nomexplode = explode(".",$nom_image);
        $ext = end($nomexplode);
        $nom_image = substr($nom_image,0,-(strlen($ext)+1));
        $nom_image .= "-".rand(1000,9999).".".$ext;
        move_uploaded_file($_FILES['imgpart']['tmp_name'], 'assets/' . $nom_image);
        $sql = $pdo->prepare("SELECT Nom_Image FROM image WHERE Id_Image = :id ");
        $sql->bindParam("id", $data['Id_Image']);
        $sql->execute();
        $nom_Image = $sql->fetch();

        if (isset($_POST['submit'])){
            $nom = $_POST['nom'];
            $description = $_POST['description'];
            $lien = $_POST['lien'];
            $nom_Image = $_FILES['image']['name'];
            try {

                $query = "UPDATE partenaire SET Nom_Partenaire =:nom, Description_Partenaire =:description, Lien_Partenaire =:lien, Id_Image =:image WHERE Id_Partenaire =:id";
                $stmt = $pdo->prepare($query);
                $stmt->bindParam(':nom', $nom);
                $stmt->bindParam(':description', $description);
                $stmt->bindParam(':lien', $nom);
                $stmt->bindParam(':image', $nom_Image['Id_Image']);
                $stmt->bindParam(':id', $id);
                $query_execute = $stmt->execute();

            }catch (PDOException $e){
                echo $e->getMessage();
            }
        }
        ?>


<head>
    <link rel="stylesheet" type="text/css" href="styleajout.css">
</head>

<body>
<h1>Modifier un partenaire</h1>

<div class="form">
    <form action="update.php" method="post" enctype="multipart/form-data">
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
