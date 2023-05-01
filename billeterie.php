<?php include "header.php";
include "db.php";?>

<head>
    <link rel="stylesheet" type="text/css" href="stylez.css">
</head>
<main>
	<div class="content">
		<h1>Liste des Offres</h1>

		<table class="table">
		<thead>
			<tr class="table-primary">
				<th>Offre</th>
				<th>Description de l'offre</th>
				<th>Date Début Offre</th>
				<th>Date Fin Offre</th>
				<th>Nb Places Min. Offre</th>
				<th>Action</th>
				<th>Image</th>
				<th><button class="ajout"><a href="ajout.php">Ajouter une Offre</a></button></th>
			</tr>
		</thead>
		<tbody>
        <?php
        require_once "db.php";
        $sql = "SELECT * FROM `offre`";
        $statement = $pdo->prepare($sql);
        $statement->execute();
        $offres = $statement->fetchAll();
        foreach ($offres as $offre){

        ?>
			<tr>
				<td class="nom"><b><?=$offre['Nom_Offre']; ?></b></td>
				<td><?=$offre['Description_Offre'];?></td>
				<td><?=$offre['Date_Debut_Offre'];?></td>
				<td><?=$offre['Date_Fin_Offre'];?></td>
				<td><?=$offre['Nombre_Place_Min_Offre'];?></td>
                <td class="button"><button class="modif"></td><a href="update.php?id=<?= $offre['Id_Offre']?>">Modifier</a></button><button class="supp"><a href="delete.php?id=<?php echo $partenaire['Id_Partenaire']; ?>">Supprimer</a></button></td>
				<td><img src="assets/<?php echo $offre['Nom_Image'];?>"</td>
			</tr>
        <?php  }
        ?>
		</tbody>
	</table>
	</div>

    <div id="confirmModal" class="modal">
        <div class="modal-content">
            <h2>Confirmer la suppression ?</h2>
            <p>Êtes-vous sûr de vouloir supprimer ce partenaire ?</p>
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

</body>
</html>