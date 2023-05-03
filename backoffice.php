<?php
include "header.php";


switch ($_SESSION['user']->Id_Droit) {
    case 1 :
        $user = 'utilisateur';
        break;
    case 2 :
        $user = 'administrateur';
        break;
    case 3 :
        $user = 'superadmin';
        break;
}
?>

	<main>
		<div class="home">
			<h1>Espace administrateurs</h1>
            <?php
            require_once "db.php";
            $sql = "SELECT * FROM `utilisateur`";
            $statement = $pdo->prepare($sql);
            $statement->execute();
            $utilisateurs = $statement->fetchAll();
            //var_dump($_SESSION["user"]);
            foreach ($utilisateurs as $utilisateur){
            ?>
			<div class="boardcard">
				<h2>Bonjour, <span style="color: #B6A886;"><?= $_SESSION['user']->Nom_Utilisateur ?></span></h2> <br><br>
				<h3>Rôle : <?= $user ?></h3>
				<br>
			</div>
            <?php

            }
            ?>
		</div>
	</main>



</body>
</html>