<?php

require_once "db.php";
$id = $_GET['id'];
//if id exist
if (isset($id)) {
    //delete data
    $sql = "SELECT * FROM `message` WHERE `Id_Message` = :id";
    $part = $pdo->prepare($sql);
    $part->execute([':id' => $id]);
    $msg = $part->fetch(PDO::FETCH_OBJ);
    if ($msg) {
        try {
            $sql = "DELETE FROM `message` WHERE `Id_Message` = ?";
            $statement = $pdo->prepare($sql);
            $statement->execute([(int)$id]);
            header("Location: commentaires.php");
        } catch (Exception $e) {
            header("Location: commentaires.php");
        }

    }
}