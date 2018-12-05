<?php //var_dump($_SESSION['user']->id); ?>
<div class="col-lg-12">
    <div class="jumbotron col-lg-9 shopping-cart">

        <?php include "MessageFlash.php"; ?>

        <table class="table">

            <tr>
                <th>Nom du plat</th>
                <th>Famille d'algues</th>
                <th>Prix unité</th>
                <th>Quantité</th>
                <th>Prix total</th>
                <th>Action</th>
            </tr>
            <?php
            if($products) {
                foreach ($products as $product): ?>
                    <tr>
                        <td><?= $product->name ?></td>
                        <td><?= $product->family ?></td>
                        <td><?= number_format($product->price, 2, ',', ' '); ?>€</td>
                        <td class="td-qty">
                            <form method="post" action=""><input class="input-qty"
                                                                 name="shoppingCart[qty][<?= $product->id; ?>]"
                                                                 type="text"
                                                                 value="<?= $_SESSION['shoppingCart'][$product->id] ?>">
                                <button class="btn btn-warning" type="submit"><span
                                            class="glyphicon glyphicon-repeat"></span></button>
                            </form>
                        </td>
                        <td><?= number_format($product->price * $_SESSION['shoppingCart'][$product->id], 2, ',', ' '); ?>
                            €
                        </td>
                        <td>
                            <a href="index.php?action=shoppingCart&del=<?= $product->id ?>"
                               class="btn btn-warning"><span class="glyphicon glyphicon-trash"></span></a>
                        </td>
                    </tr>
                <?php endforeach;
            }
            ?>
        </table>
    </div>
    <?php if($products){ ?>
        <div class="total jumbotron col-lg-offset-1 col-lg-2">
            <h2 class="text-center">Récapitulatif</h2>
            <div class="col-lg-12">
                <p class="col-lg-6"><span>Articles</span> :</p>
                <p class="pull-right"><?=array_sum($_SESSION['shoppingCart']);?></p>
            </div>
            <div class="col-lg-12">
                <p class="col-lg-6"><span>Prix total</span> :</p>
                <p class="pull-right"><?php $total = 0; foreach ($products as $product) $total += $product->price * $_SESSION['shoppingCart'][$product->id]; echo $total?>€</p>
                <form action="index.php?action=shoppingCart" method="post">
                    <button type="submit" name="orderValidation" class="btn btn-warning btn lg">Valider Commande</button>
                </form>
            </div>
        </div>
<?php } ?>
</div>
