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
                /*$user = [
                    'login' => $statement['Email_Utilisateur'],
                    'nom' => $statement['Nom_Utilisateur'],
                    'prenom' => $statement['Prenom_Utilisateur'],
                    'mdp' => $statement['Password_Utilisateur']
                ];*/
                $_SESSION['user'] = $user;
                if ( $user->Id_Droit > 0 ){
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
        }else {
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
    <form method="post">
        <div class="formGroup">
            <h1 class="formTitle">Connexion</h1>
            <div class="inputGroup">
                <input type="email" id="email" required="" name="email" placeholder="Email">

            </div>
            <div class="inputGroup">
                <input type="password" id="password" required="" name="password" placeholder="Mot de passe">
            </div>

            <div class="cf-turnstile" data-sitekey="0x4AAAAAAAFLa8vY1BXDCBU2" data-callback="javascriptCallback"></div>


            <div class="btnGroup">
                <button type="submit">Se connecter</button>
            </div>
        </div>
    </form>
</div>
<script src="https://challenges.cloudflare.com/turnstile/v0/api.js?onload=onloadTurnstileCallback" defer>
    window.onloadTurnstileCallback = function () {
    turnstile.render('#example-container', {
        sitekey: '0x4AAAAAAAFLa8vY1BXDCBU2',
        callback: function(token) {
            console.log(`Challenge Success ${token}`);
        },
    });
};
</script>
</body>
</html>