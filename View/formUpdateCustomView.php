<?php

$this->title = 'Edition Client';
?>

<div class="jumbotron">

    <?php include "MessageFlash.php"; ?>

    <form method="POST" action="">
        <div class="form-group">
            <label class="label-modif-custom">Nom :</label>
            <input name="lastname" class="input-modif-custom form-control" type="text" value="<?= $customer->lastname ?>">
        </div>
        <div class="form-group">
            <label class="label-modif-custom">Prénom : </label>
            <input name="firstname" class="input-modif-custom form-control" type="text" value="<?= $customer->firstname?> ">
        </div>

        <div class="form-group">
            <label class="label-modif-custom">Email : </label>
            <input name="email" class="input-modif-custom form-control" type="text" value="<?= $customer->email?> ">
        </div>

        <button class="btn btn-lg btn-warning pull-right" type="submit"><span class="glyphicon glyphicon-chevron-right"> </span> Modifier les informations</button>


    </form>
</div>
