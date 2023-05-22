<?php



session_start();

$get_url = $_SERVER['REQUEST_URI'];
$explode_url = explode('/', $get_url);
$end_url = end($explode_url);


if (empty($_SESSION['admin']) && $end_url != 'connexion.php'){
    header("Location: connexion.php");

}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <title>Administrateurs -- CSE Lycée Saint Vincent</title>
</head>
<body>

<nav class="navbar">
    <div class="max-width">
        <?php if (isset($_SESSION['admin'])){ ?>
        <ul class="menu">
            <li><a href="backoffice.php">Accueil</a></li>
            <li><a href="partenariats.php">Partenariats</a></li>
            <li><a href="back-billeterie.php">Billeterie</a></li>
            <li><a href="commentaires.php">Contact</a></li>
            <li><a href="administrateurs.php">Administrateurs</a></li>
        </ul>
        <?php }  else {?>
        <ul class="menu">
            <li><a href="connexion.php">Se Connecter</a></li>
        </ul>
        <?php } ?>
    </div>
    <a href ="#"><img class="logo" src="utilisateur.png" alt="user"></a>
    <div class="dropdown_menu">
					<li><a href="logout.php">Deconnexion</a></li>
	</div>
</nav>     
            <script src="script.js"></script>