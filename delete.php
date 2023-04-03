<?php

require_once "db.php";
$id = $_GET['id'];
//if id exist
if (isset($id)) {
    //delete data
    $sql = "SELECT * FROM `partenaire` WHERE `Id_Partenaire` = :id";
    $part = $pdo->prepare($sql);
    $part->execute([':id' => $id]);
    $partenaire = $part->fetch(PDO::FETCH_OBJ);
    if ($partenaire) {
        try {
            $sql = "DELETE FROM `partenaire` WHERE `Id_Partenaire` = :id";
            $statement = $pdo->prepare($sql);
            $statement->bindParam('id',$id);
            $statement->execute();
            header("Location: partenariats.php");
        }catch(Exception $e){
            echo "Marche pas connard";
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