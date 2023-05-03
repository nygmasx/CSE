<?php include "header.php";
include "db.php";

if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['droit'])&& isset($_POST['nom'])&& isset($_POST['prenom'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = password_hash($password, PASSWORD_BCRYPT);
    $droit = (int)$_POST['droit'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];

    //check if email exist
    $sql = "SELECT * FROM `utilisateur` WHERE `Email_Utilisateur` = :email";
    $statement = $pdo->prepare($sql);
    $statement->bindParam('email',$email);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_OBJ);
    if ($user) {
        ?>
        <script>
            alert("Email déjà utilisé")
        </script>
        <?php
    } else {
        //insert data
        $sql = "INSERT INTO `utilisateur` (`Nom_Utilisateur`, `Prenom_Utilisateur`, `Email_Utilisateur`, `Password_Utilisateur`, `Id_Droit`) VALUES (:nom,:prenom,:email, :password, :Id_Droit)";
        $statement = $pdo->prepare($sql);

        $statement->bindParam('nom',$nom);
        $statement->bindParam('prenom',$prenom);
        $statement->bindParam('email',$email);
        $statement->bindParam('password',$password);
        $statement->bindParam('Id_Droit',$droit);
        $statement->execute();
        header("Location: backoffice.php");
    }
}

?>

    <div class="form">
        <form method = "post">
            <fieldset>
                <legend>Modifiez un administrateur</legend>
                <label for="email">Email</label>
                <input type="text" name = "email" placeholder = "Email"> <br>
                <label for="nom">Nom</label>
                <input type="text" name = "nom" placeholder = "Nom"> <br>
                <label for="prenom">Prenom</label>
                <input type="text" name = "prenom" placeholder = "Prenom"> <br>
                <label for="password">Mot de passe</label>
                <label for="droit">droit</label>
                <select id="droit" name="droit">
                   <option value="1">utilisateur</option>
                    <option value="2">administrateur</option>
                    <option value="3">superadmin</option>
                </select>
                <input type="password" name = "password" placeholder = "Mot de passe">
                <input type="submit" value = "sinscrire"/>
            </fieldset>
        </form>
    </div>
</body>
</html>