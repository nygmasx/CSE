<?php include "header.php";
include "db.php";?>

<head>
    <link rel="stylesheet" type="text/css" href="stylez.css">
</head>
	<div class="content">
		<h1>Liste des partenaires</h1>

		<table class="table">
		<thead>
			<tr class="table-primary">
				<th>Nom</th>
				<th>Texte présentation</th>
				<th>Lien</th>
				<th>Action</th>
				<th>Image</th>
				<th><button class="ajout"><a href="ajout.php">Ajouter un partenaire</a></button></th>
			</tr>
		</thead>
		<tbody>
        <?php
        require_once "db.php";
        $sql = "SELECT * FROM `partenaire`";
        $statement = $pdo->prepare($sql);
        $statement->execute();
        $partenaires = $statement->fetchAll();
        foreach ($partenaires as $partenaire){

        ?>
			<tr>
				<td class="nom"><b><?=$partenaire['Nom_Partenaire']; ?></b></td>
				<td><?=$partenaire['Description_Partenaire'];?></td>
				<td><a class="link-primary" href="<?=$partenaire['Lien_Partenaire']; ?>">Découvrir</a></td>
				<td class="button"><button class="modif"><a href="update.php?id=<?= $partenaire['Id_Partenaire']?>">Modifier</a></button><button class="supp"><a href="delete.php?id=<?php echo $partenaire['Id_Partenaire']; ?>">Supprimer</a></button></td>
				<td><img src="assets/<?php echo $partenaire['Nom_Image'];?>"</td>
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


</body>
</html>