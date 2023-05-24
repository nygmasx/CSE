<?php

require_once "db.php";
$id = $_GET['id'];
//if id exist
if (isset($id)) {
    //delete data
    $sql = "SELECT * FROM `offre` WHERE `Id_Offre` = :id";
    $part = $pdo->prepare($sql);
    $part->execute([':id' => $id]);
    $offre = $part->fetch(PDO::FETCH_OBJ);
    if ($offre) {
        try {

            $sql = "DELETE o, i FROM offre i INNER JOIN offre_image o ON o.Id_Offre = i.Id_Offre WHERE o.Id_Offre = ?";
            $statement = $pdo->prepare($sql);
            $statement->execute([(int)$id]);
            header("Location: back-billeterie.php");
        }catch(Exception $e){
            header("Location: back-billeterie.php");
        }
    } else {
        ?>
        <script>
            alert("Partenaire introuvable")
        </script>
        <?php
    }
}

?>

<?php