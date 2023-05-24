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
            $sql2 = "DELETE FROM `message` WHERE `Id_Offre` = ?";
            $statement = $pdo->prepare($sql2);
            $statement->execute([(int)$id]);

            $sql2 = "DELETE FROM `offre_image` WHERE `Id_Offre` = ?";
            $statement = $pdo->prepare($sql2);
            $statement->execute([(int)$id]);

            $sql = "DELETE FROM offre WHERE Id_Offre = ?";
            $statement = $pdo->prepare($sql);
            $statement->execute([(int)$id]);
            header("Location: back-billeterie.php");
        }catch(Exception $e){
            echo $e;
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