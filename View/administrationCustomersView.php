<?php

$this->title = 'Administration Client';
?>

<?php include "MessageFlash.php"; ?>

<legend>Liste des Clients</legend>

<div class="listCustomers">
    <div class="jumbotron product">
        <table class='table'>
            <tr>
                <th> Client</th>
            </tr>

            <?php foreach ($result as $custom): ?>
                <tr>
                    <td><?= $custom->firstname ?> <?= $custom->lastname ?>  </td>
                    <td><a href="index.php?action=adminCustomers&del=non&modify=yes&id=<?= $custom->id ?>" type="button"
                           class="btn btn-s btn-warning pull-right"> Modifier client</a></td>
                    <td><a href="index.php?action=adminCustomers&del=yes&id=<?= $custom->id ?>" type="button"
                           class="btn btn-s btn-danger pull-right"> Supprimer client </a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>


