<?php
session_start();
if(!isset ($_SESSION['mail_utilisateur'])){
    header('Location: authentification.php');
}

    $idFormation = $_GET['idFormation'];

    include_once(__DIR__."/../controlleurs/FormationControlleur.php");
    $formationControlleur = new \controlleurs\FormationControlleur();

    if (isset($_POST['boutonModifierFormation'])) {
        $formationControlleur->modifierLaFormation($_POST['modifierFormationTitre'], $_POST['modifierFormationDescription'], $_POST['modifierFormationDateDebut'], $_POST['modifierFormationDateFin'], $_POST['modifierFormationPrix'], $_POST['modifierFormationCertification'], $_POST['modifierFormationNiveau'], $_POST['modifierFormationPhoto'], $idFormation);
        header('Location: admin.php');
        exit;
    }
?>
<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <title>Arbre du Savoir</title>
    <link href="css/modifier-produit.css" rel="stylesheet">
    <link href="css/menu.css" rel="stylesheet">
    <script src="js/modifier-produit.js"></script>
</head>
<body>
    <?php include("header.php")?>

    <form method='post'>
    <div class='body'>
        <div class='titre'>
            <h2>Modifier le produit</h2>
        </div>

        <?php

        $formationControlleur->saisieInputPageModifier($idFormation);

        ?>
    </div>
    </form>
    <footer>
        <h3>Condition d'utilisation</h3>
        <h3>Date mise à jour</h3>
        <h3>Réseaux sociaux</h3>
    </footer>
</body>
</html>

