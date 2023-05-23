<?php include "header.php";
include "db.php"; ?>

<head>
    <link rel="stylesheet" type="text/css" href="stylez.css">
</head>
<main>
    <div class="content">
        <h1>Liste des Offres</h1>
        <form class="searchbar" method="GET">
            <input type="text" name="searchbar">
            <button type="submit" name="Rechercher" title="Envoyer"><img src="img.png" alt="" style = "width:20px; "/></button>
        </form>
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
                <th>
                    <button class="ajout"><a href="ajoutOffre.php">Ajouter une Offre</a></button>
                </th>
            </tr>
            </thead>
            <tbody>
            <?php
            require_once "db.php";
            $sql = "SELECT * FROM `offre`";
            if (isset($_GET['searchbar']) && !empty($_GET['searchbar'])) {
                $recherche = htmlspecialchars($_GET['searchbar']);
                $sql .= " WHERE Nom_Offre LIKE '%$recherche%'";
            }
            $statement = $pdo->prepare($sql);
            $statement->execute();
            $offres = $statement->fetchAll();
            foreach ($offres as $offre) {
                $query = "SELECT * FROM `offre_image` INNER JOIN `image` ON  `offre_image`.Id_Image = `image`.Id_Image  WHERE `offre_image`.Id_Offre = ?";
                $get_all_image = $pdo->prepare($query);
                $get_all_image->execute([$offre['Id_Offre']]);
                $images = $get_all_image->fetchAll();

                ?>
                <tr>
                    <td class="nom"><b><?= $offre['Nom_Offre']; ?></b></td>
                    <td><?= $offre['Description_Offre']; ?></td>
                    <td><?= $offre['Date_Debut_Offre']; ?></td>
                    <td><?= $offre['Date_Fin_Offre']; ?></td>
                    <td><?= $offre['Nombre_Place_Min_Offre']; ?></td>
                    <td class="button">
                        <button class="modif"><a href="updateOffre.php?id=<?= $offre['Id_Offre'] ?>">Modifier</a>
                        </button>
                        <button class="supp"><a
                                    href="delete_offre.php?id=<?php echo $offre['Id_Offre']; ?>">Supprimer</a></button>
                    </td>
                    <td >
                        <?php
                        if (!empty($images)) {
                            foreach ($images as $img) {
                                ?>
                                <img style="max-width: 100px; max-height: 100px" src="assets/<?php echo $img['Nom_Image']; ?>">
                                <?php
                            }
                        }
                        ?>

                    </td>
                </tr>
            <?php }
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