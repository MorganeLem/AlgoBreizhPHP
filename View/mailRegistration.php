<?php
$mail = $_POST['Email'];
if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail))
{
$passage_ligne = "\r\n";
}
else
{
$passage_ligne = "\n";
}

//=====Déclaration des messages au format texte et au format HTML.
$message_txt = "Bonjour ".$_POST['Prenom'].' '.$_POST['Nom']. $passage_ligne. 'Merci de vous être inscrit sur Algobreizh.com. Voici votre mot de passe : '.$pwd.$passage_ligne.'A bientôt sur Algobreizh.com !'.$passage_ligne.'L\'équipe AlgoBreizh';
$message_html = "<html><head></head><body><p><b>Bonjour ".$_POST['Prenom']." ".$_POST['Nom']."</b></p><p>Merci de vous être inscrit sur Algobreizh.com. Voici votre mot de passe : ".$pwd."</p><p>A bientôt sur Algobreizh.com !</p><p>L'équipe AlgoBreizh</p></body></html>";
//==========

//=====Création de la boundary
$boundary = "-----=".md5(rand());
//==========

//=====Définition du sujet.
$sujet = "Votre mot de passe Algobreizh.com";
//=========

//=====Création du header de l'e-mail
$header = "From: \"AlgoBreizh\"<contact@test-formation.ovh>".$passage_ligne;
$header .= "Reply-to: \"AlgoBreizh\" <contact@test-formation.ovh>".$passage_ligne;
$header .= "MIME-Version: 1.0".$passage_ligne;
$header .= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
//==========

//=====Création du message.
$message = $passage_ligne."--".$boundary.$passage_ligne;
//=====Ajout du message au format texte.
$message.= "Content-Type: text/plain; charset=\"UTF-8\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_txt.$passage_ligne;
//==========
$message.= $passage_ligne."--".$boundary.$passage_ligne;
//=====Ajout du message au format HTML
$message.= "Content-Type: text/html; charset=\"UTF-8\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_html.$passage_ligne;
//==========
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
//==========

//=====Envoi de l'e-mail.
mail($mail,$sujet,$message,$header);
//==========