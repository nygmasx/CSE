<?php
include "header.php";
?>
<head>
    <link rel="stylesheet" type="text/css" href="stylez.css">
</head>
<div class="titlePage">
<h1>Tous les messages</h1>
</div>
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
                <tr>
                    <td data-title="Nom Prénom"></td>
                    <td data-title="Email"><a href="mailto:"></a></td>
                    <td data-title="Contenu" class="colonneContenu"></td>
                    <td data-title="Offre"></td>
                    <td data-title="Partenaire"></td>
                    <td data-title="Action" class="actionBtn">
                        <button class="ajout"><a href="">Supprimer</a></button>
                    </td>
                </tr>
        </tbody>
    </table>
</div>