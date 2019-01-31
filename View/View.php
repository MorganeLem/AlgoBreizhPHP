<?php

class Vue {

    // Nom du fichier associé à la vue
    private $fichier;
    
    // Titre de la vue (défini dans le fichier vue)
    private $title;

    public function __construct($action) {

        // Détermination du nom du fichier vue à partir de l'action
        $this->fichier = "View/" . $action . ".php";
    }

    // Génère et affiche la vue
    public function generer($donnees) {
        // Génération de la partie spécifique de la vue
        $contenu = $this->genererFichier($this->fichier, $donnees);
        // Génération du gabarit commun utilisant la partie spécifique
        if(session_status()== PHP_SESSION_NONE){
            session_start();
        }
        if(isset($_SESSION['user'])) {
            ob_start(); ?>

            <div class="btn-group">
                <a href="index.php?action=order" class="btn btn-default">Passer une commande</a>
                <a href="index.php?action=shoppingCart" class="btn btn-default"><span class="glyphicon glyphicon-shopping-cart"></span></a>
            </div>

            <div class="btn-group">

                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    Bonjour <?= $_SESSION['user']->firstname ?> <span class="caret"></span></button>

                <ul class="dropdown-menu dropdown-menu-right" >

                    <li><a href="index.php?action=suivi&suivi=Commande"><span class="glyphicon glyphicon-file"></span> Mes Commandes</a></li>

                    <li><a href="index.php?action=suivi&suivi=Facture"><span class="glyphicon glyphicon-file"></span> Mes Factures</a></li>

                    <li><a href="#"><span class="glyphicon glyphicon-user"></span> Mon Compte</a></li>
					
					<?php
					if($_SESSION['user']->Statut === "Téléprospecteur")
					{
						echo "<li><a href='index.php?action=Prospect'><span class='glyphicon glyphicon-user'></span> Toute Commandes</a></li>" ;
					}
					?>
                    <li class="divider"></li>

                    <li><a href="index.php?action=logout"><span class="glyphicon glyphicon-remove"></span> Déconnection</a></li>

                </ul>

            </div>
            <?php $this->menuLinks = ob_get_clean();
        }
        $vue = $this->genererFichier('View/template.php',
                array('title' => $this->title, 'menuLinks' => $this->menuLinks, 'contenu' => $contenu));

        // Renvoi de la vue au navigateur
        echo $vue;
    }

    // Génère un fichier vue et renvoie le résultat produit
    private function genererFichier($fichier, $donnees) {
        if (file_exists($fichier)) {
            // Rend les éléments du tableau $donnees accessibles dans la vue
            extract($donnees);
            // Démarrage de la temporisation de sortie
            ob_start();
            // Inclut le fichier vue
            // Son résultat est placé dans le tampon de sortie
            require $fichier;
            // Arrêt de la temporisation et renvoi du tampon de sortie
            return ob_get_clean();
        }
        else {
            throw new Exception("Fichier '$fichier' introuvable");
        }
    }

}