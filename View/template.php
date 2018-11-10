<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <!-- On charge le CSS de bootstrap depuis le site directement -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div>

        <header class="container-fluid">

            <a href=<?= "index.php"?>>
                <img id="logo" class="col-xs-3 col-md-2 col-lg-1" src="images/logo512px.png">
            </a>
            <div class="text-right"><?= $menuLinks ?></div>

        </header>
        <?php include "messageFlash.php"; ?>
        <div class="container" id="contenu">
            <?= $contenu ?>
        </div>
        <footer class="text-center">
            Projet AlgoBreizh 2019
        </footer>

    </div>

</body>
</html>