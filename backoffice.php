<?php
include "header.php";


switch ($_SESSION['user']->Id_Droit) {
    case 1 :
        $user = 'administrateur';
        break;
    case 2 :
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
            
            ?>
			<div class="boardcard">
				<h2>Bonjour, <span style="color: #B6A886;"><?= $_SESSION['user']->Prenom_Utilisateur ?></span></h2> <br><br>
				<h3>Rôle : <?= $user ?></h3>
				<br>
                <div class = "btn"><button><a href="aside.php"> Modifier l'Accueil</a></button></div>
                
			</div>
		</div>
	</main>



</body>
</html>