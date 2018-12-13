<?php
$this->title = 'Passer une commande';
$this->menuLinks = '';
?>

<?php include "MessageFlash.php"; ?>

<legend class="listProducts-title">Catalogue produit</legend>
<div class="listProducts">
    <?php foreach ($products as $product): ?>
        <div class="jumbotron product">
            <h2><?=$product->name?></h2>
            <p><?= number_format($product->price,2,',',' ');?>€</p>
            <img src="images/plat<?=$product->id?>.jpg">
            <a title="Ajouter au panier" class="btn btn-warning btn-lg" href="index.php?action=shoppingCart&add=<?=$product->id?>"><span class="glyphicon glyphicon-shopping-cart"></span> </a>

        </div>
    <?php endforeach; ?>
</div>
