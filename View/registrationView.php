<?php
//définition des variables 

$this->title = 'S\'inscrire';
$this->menuLinks = '<nav><a href="index.php?action=connection">Se connecter</a></nav>';
?>

<div class="jumbotron">

	<?php include "MessageFlash.php"; ?>
	
	<form action="" method="post">
		<fieldset>
			<legend> Pour vous inscrire veuillez renseigner les champs suivant :<br> </legend>
			<div class="form-group"><label> Code Client: </label> <input class="form-control" type="text" name="CodeClient" required></div>
			<div class="form-group"><label> Nom        : </label> <input class="form-control" type="text" name="Nom"        required></div>
			<div class="form-group"><label> Prenom     : </label> <input class="form-control" type="text" name="Prenom"     required></div>
			<div class="form-group"><label> Email      : </label> <input class="form-control" type="text" name="Email"      required></div>
			<button type="submit"  class="btn btn-lg btn-warning pull-right"><span class="glyphicon glyphicon-chevron-right"> </span> Inscription </button>
		</fieldset>
	</form>
		
		
</div>