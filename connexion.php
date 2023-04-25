<?php
require("db.php");
if (isset($_POST["submit"])) {
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);

    if (empty($email) || empty($password)) {
        echo "Veuillez remplir tous les champs.";
    } else {
        $sql = $pdo->prepare("SELECT * FROM utilisateur WHERE Email_Utilisateur = :email");
        $sql->execute(['email' => $email]);
        $user = $sql->fetch();
        if ($user && password_verify($password, $user['Password_Utilisateur'])) {
            $_SESSION["email"] = $email;
            $_SESSION["id"] = $user["Id_Utilisateur"];
            header('Location: backoffice.php');
            exit();
        } else {
            echo "Erreur de connexion.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Administrateurs</title>
</head>
<body>
    <div class="form">
        <form action="" method="post">
            <fieldset>
                <legend>Connexion</legend>
                <label for="email">Email</label>
                <input type="text" name="email" placeholder="Email"> <br>
                <label for="password">Mot de passe</label>
                <input type="password" name="password" placeholder="Mot de passe">
                <input type="submit" name="submit" value="Connectez-vous"/>
            </fieldset>
        </form>
    </div>
</body>
</html>
