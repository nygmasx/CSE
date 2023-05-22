
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
        <form class="searchbar" method="GET">
            <input type="text" name="searchbar" style="width" placeholder="Recherchez un administrateur">
            <button type="submit" name="Rechercher" title="Envoyer"><img src="img.png" alt="" style = "width:20px; " /></button>
        </form>
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
                if (isset($_GET['searchbar']) && !empty($_GET['searchbar'])) {
                    $recherche = htmlspecialchars($_GET['searchbar']);
                    $sql .= " WHERE Prenom_Utilisateur OR Nom_Utilisateur LIKE '%$recherche%'";
                }
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $admins = $stmt->fetchAll();
                $nbResultats = count($admins);
                foreach ($admins as $admin){
                    switch ($admin['Id_Droit']) {
                        case 1 :
                            $user = 'administrateur';
                            break;
                        case 2 :
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
                    </td>
                </tr>
                <?php }
                if($nbResultats == 0){
                    echo("<p> Votre recherche ne retourne rien. </p>");
                }
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
