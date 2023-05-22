<?php
include "header.php";
?>
<head>
    <link rel="stylesheet" type="text/css" href="stylemessage.css">
</head>
<main>
    <div class="content">
        <div class="title">
            <h1>Tous les messages</h1>
        </div>
        <form class="searchbar" method="GET">
            <input type="text" name="searchbar" style="width">
            <button type="submit" name="Rechercher" title="Envoyer"><img src="img.png" alt="" style = "width:20px; " /></button>
        </form>
        <div class="tablemessages">
            <table class="table">
                <thead>

                <tr>
                    <th class="tableNom">Nom Prénom</th>
                    <th class="tableEmail">Email</th>
                    <th class="tableContenu">Contenu</th>
                    <th class="tableOffre">Offre associée</th>
                    <th class="tablePart">Partenaire associé</th>
                    <th class="tableAction">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                require_once "db.php";
                $sql = "SELECT * FROM `message`";
                $statement = $pdo->prepare($sql);
                $statement->execute();
                $messages = $statement->fetchAll();
                foreach ($messages as $message){

                    $sql = "SELECT * FROM `offre` WHERE `Id_Offre` = ?";
                    $statement = $pdo->prepare($sql);
                    $statement->execute([$message['Id_Offre']]);
                    $offre = $statement->fetch();

                    $sql = "SELECT * FROM `partenaire` WHERE `Id_Partenaire` = ?";
                    $statement = $pdo->prepare($sql);
                    $statement->execute([$message['Id_Partenaire']]);
                    $partenaire = $statement->fetch();

                ?>
                <tr>
                    <td data-title="Nom Prénom"><?=$message['Nom_Message'] . " " . $message['Prenom_Message']; ?></td>
                    <td data-title="Email"><a href="mailto:"><?=$message['Email_Message'];?></a></td>
                    <td data-title="Contenu" class="colonneContenu"><?=$message['Contenu_Message'];?></td>
                    <td data-title="Offre"><?php echo $offre['Nom_Offre'] ?? "Aucun";?></td>
                    <td data-title="Partenaire"><?=$partenaire['Nom_Partenaire'] ?? "Aucun";?></td>
                    <td data-title="Action" class="actionBtn">
                        <button class="supp"><a href="delete_commentaires.php?id=<?php echo $message['Id_Message']; ?>">Supprimer</a></button>
                    </td>
                </tr>
                <?php }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <div id="confirmModal" class="modal">
        <div class="modal-content">
            <h2>Confirmer la suppression ?</h2>
            <p>Êtes-vous sûr de vouloir supprimer ce message ?</p>
            <div class="modal-buttons">
                <button id="confirmBtn">Confirmer</button>
                <button id="cancelBtn">Annuler</button>
            </div>
        </div>
    </div>

    <script type="text/javascript">
    	const deleteBtns = document.querySelectorAll('.supp a');
		const confirmModal = document.getElementById('confirmModal');
		const confirmBtn = document.getElementById('confirmBtn');
		const cancelBtn = document.getElementById('cancelBtn');
		let deleteUrl;

		deleteBtns.forEach((btn) => {
		  btn.addEventListener('click', (event) => {
		    event.preventDefault();
		    deleteUrl = btn.getAttribute('href');
		    confirmModal.style.display = 'block';
		  });
		});

		cancelBtn.addEventListener('click', () => {
		  confirmModal.style.display = 'none';
		});

		confirmBtn.addEventListener('click', () => {
		  window.location.href = deleteUrl;
		});
    </script>
</main>