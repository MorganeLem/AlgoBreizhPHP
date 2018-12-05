<?php
if(session_status()== PHP_SESSION_NONE){
    session_start();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <!-- On charge le CSS de bootstrap depuis le site directement -->
    <link <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<?php

?>
<body>
    <div>

        <header class="container-fluid">

            <a href=<?= "index.php"?>>
                <img id="logo" class="col-xs-3 col-md-2 col-lg-1" src="images/logo512px.png">
            </a>
            <div class="pull-right"><?= $menuLinks ?></div>

        </header>
        <div class="container" id="contenu">
            <?= $contenu ?>
        </div>

        <footer>
            <p class="text-center">Projet AlgoBreizh 2019</p>
        </footer>

    </div>

</body>
</html>