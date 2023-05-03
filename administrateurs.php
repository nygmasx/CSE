
<?php
include "header.php";
?>
<head>
    <link rel="stylesheet" type="text/css" href="styleadmin.css">
</head>
<main>
    <div class="content">
        <div class="title">
            <h1>Liste des administrateurs</h1>
        </div>
        <div class="tablemessages">
            <table class="table">
                <thead>

                <tr>
                    <th class="tableNom">Nom Utilisateur</th>
                    <th class="tablePrenom">Prenom Utilisateur</th>
                    <th class="tableEmail">Email</th>
                    <th class="tableRole">Rôle</th>
                    <th class="tableAction">Action</th>
                    <th><button class="ajout"><a href="register.php">Ajouter un administrateur</a></button></th>
                </tr>
                </thead>
                <tbody>
                <?php
                require_once "db.php";
                $sql = "SELECT * FROM `utilisateur`";
                $statement = $pdo->prepare($sql);
                $statement->execute();
                $admins = $statement->fetchAll();
                foreach ($admins as $admin){
                    switch ($admin['Id_Droit']) {
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
                <tr>
                    <td data-title="Nom "><?=$admin['Nom_Utilisateur']; ?></td>
                    <td data-title="Prénom"><?=$admin['Prenom_Utilisateur'];?></a></td>
                    <td data-title="Email" class="colonneContenu"><a href="mailto:"><?=$admin['Email_Utilisateur'];?></td>
                    <td data-title="Role"><?=$user;?></td>
                    <td data-title="Action" class="actionBtn">
                        <button class="supp"><a href="">Supprimer</a></button>
                        <button class="modif"><a href="update_admin.php">Modifier</a></button>
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
            <p>Êtes-vous sûr de vouloir supprimer cet administrateur ?</p>
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
