<?php

require_once "db.php";
$sql = "SELECT * FROM `info_accueil`";
$statement = $pdo->prepare($sql);
$statement->execute();
$infos = $statement->fetch();

if (isset($_POST['submit'])) {
    $id = (int)$_POST['id'];
    $phone = (int)$_POST['phone'];
    $email = $_POST['email'];
    $adresse = $_POST['address'];
    $title = $_POST['title'];
    $message = $_POST['message'];
    if (isset($phone) && isset($email) && isset($adresse) && isset($title) && isset($message)) {
        $sql = "UPDATE info_accueil SET Num_Tel_Info_Accueil=:phone, Email_Info_Accueil=:email, Emplacement_Bureau_Info_Accueil=:adresse, Titre_Info_Accueil=:title, Texte_Info_Accueil=:message WHERE Id_Info_Accueil=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['phone' => $phone, 'email' => $email, 'adresse' => $adresse, 'title' => $title, 'message' => $message, 'id' => $id]);
         header("Location: backoffice.php");
       
    }
}
?>


<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styleaside.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <title>Ajouter | CSE Lycée Saint Vincent</title>
</head>
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
    <h1>Modifiez les informations de contact</h1>

        <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" value="<?= $infos['Id_Info_Accueil'] ?>" name="id">
                <label for="exampleFormControlInput100" class="form-label">Numéro de téléphone :</label>
                <input type="tel" id="phone" name="phone" value="<?= $infos['Num_Tel_Info_Accueil'] ?>" required>
                <label for="exampleFormControlInput1" class="form-label">Adresse e-mail :</label>
                <input type="email" id="email" name="email" value="<?= $infos['Email_Info_Accueil'] ?>" required>

                <label for="exampleFormControlTextarea1" class="form-label">Adresse Postale :</label>
                <input type="text" name="address" value="<?= $infos['Emplacement_Bureau_Info_Accueil'] ?>" required></input>
                <label for="exampleFormControlTextarea1" class="form-label">Date de début de l'offre</label>
                <input type="text" name="title" value="<?= $infos['Titre_Info_Accueil'] ?>" required></input>
                <label for="exampleFormControlTextarea1" class="form-label">Date de fin de l'offre</label>
                <textarea name="message"><?= $infos['Texte_Info_Accueil'] ?></textarea>

           
            <div class="submit">
                <a href="#"><button type="submit" class="btn btn-primary me-md-2" name="submit">Ajouter</button></a>
            </div>
        </form>
    </div>
</div>
</body>

</html>