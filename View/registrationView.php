<?php
// déclaration des variables 
$CodeClient = isset($_POST['CodeClient']) ? $_POST['CodeClient'] : NULL;
$Nom = !empty($_POST['Nom']) ? $_POST['Nom'] : NULL;
$Prenom = !empty($_POST['Prenom']) ? $_POST['Prenom'] : NULL;
$email = !empty($_POST['email']) ? $_POST['email'] : NULL;


// menu 
$this->title = 'Accueil';
$this->menuLinks = '<a href="index.php?action=Inscription"> S\'inscrire </a>' ;
$this->menuLinks .= '<a href="index.php?action=Connexion"> Se connecter </a>';
?>

<div class="jumbotron">
	<form method="post">
		<p> pour vous inscrire veuillez rentrer les champs suivant :<br>
		Code Client: <input type="text" class="CodeClient"  name="CodeClient" required><br>	
		Nom    : <br>	
		<input type="text" name="Nom" required><br>
		Prenom : <br>	
		<input type="text" name="Prenom" required><br>
		Email  : <br>	
		<input type="email" name="email" required><br>
		<button type="submit">Inscription </button>
	</form>
		
		
</div>
<?php
	$this->registrationCtrl 	= new RegistrationController();
	$this->registrationCtrl->InscriptionV($CodeClient, $Nom, $Prenom, $email);	
?>