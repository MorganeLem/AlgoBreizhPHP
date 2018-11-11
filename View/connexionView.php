<?php
$this->title = 'Accueil';
$this->menuLinks = '<a href="index.php?action=Inscription"> S\'inscrire </a>' ;
$this->menuLinks .= '<a href="index.php?action=Connexion"> Se connecter </a>';
$CodeClient = isset($_POST['CodeClient']) ? $_POST['CodeClient'] : NULL;
$mdp = !empty($_POST['mdp']) ? $_POST['mdp'] : NULL;
?>

<div class="jumbotron">
	<p> pour vous connecter veuillez rentrer les champs suivant :<br>
	<form method="post">
		Code Client: <input type="text" class="CodeClient" name="CodeClient" required><br>	
		Mot de passe : <br>	
		<input type="password" name="mdp" required><br>
		<button type="submit" name="truc"> Connexion </button>
	</form>

<?php 
$this->connexionCtrl = new ConnexionController();
	$this->connexionCtrl->test($CodeClient, $mdp);	

?>
</div>