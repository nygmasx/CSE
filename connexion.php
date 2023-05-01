<?php


include "header.php";
include "db.php";

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    //check if email exist
    $sql = "SELECT * FROM `utilisateur` WHERE `Email_Utilisateur` = :email";
    $statement = $pdo->prepare($sql);
    $statement->bindParam('email',$email);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_OBJ);
    if (!$user) {
        ?>
        <script>
            alert("n'existe pas")
        </script>
        <?php
    } else {
        //select data and verify password bcrypt select Email_Utilisateur Password_Utilisateur
        $sql = "SELECT * FROM `utilisateur` WHERE `Email_Utilisateur` = :email";
        $statement = $pdo->prepare($sql);
        $statement->bindParam('email',$email);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_OBJ);
        if ($user) {
            var_dump($password , $user->Password_Utilisateur);
            if (password_verify($password, $user->Password_Utilisateur)) {

                $_SESSION['user'] = $user;
                if ( $user->Id_Droit > 1 ){
                    $_SESSION['admin'] = true;
                }
                header("Location: backoffice.php");
            } else {
                ?>
                <script>
                    alert("Mot de passe incorrect")
                </script>
                <?php
            }
        } else {
            ?>
            <script>
                alert("Utilisateur introuvable")
            </script>
            <?php
        }
    }
}

?>

<div class="form">
    <form method = "post">
        <fieldset>
            <legend>S'inscrire</legend>
            <label for="email">Email</label>
            <input type="text" name = "email" placeholder = "Email"> <br>
            <label for="password">Mot de passe</label>
            <input type="password" name = "password" placeholder = "Mot de passe">
            <input type="submit" value = "sinscrire"/>
        </fieldset>
    </form>
</div>
</body>
</html>