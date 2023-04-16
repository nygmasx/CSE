<!DOCTYPE html>
<html lang="en">
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
        <form action="backoffice.php" method = "post">
            <fieldset>
                <legend>Connexion</legend>
                <label for="email">Email</label>
                <input type="text" name = "email" placeholder = "Email"> <br>
                <label for="password">Mot de passe</label>
                <input type="password" name = "password" placeholder = "Mot de passe">
                <input type="submit" value = "Connectez-vous"/>
            </fieldset>
        </form>
    </div>
</body>
</html>