<?php

class SuiviManager extends Manager
{
    public function Suivi($InfoSuivi, $id)
    {
        $sql = ('SELECT * FROM salestable WHERE id_customer = ? && etats = ? ORDER BY date_purchase desc');
        $request = $this->queryExecute($sql, array($id, $InfoSuivi));
        $tableau = $this->queryExecute($sql, array($id, $InfoSuivi));
        $result = "<table class='table'>
						<tr>
							<th>Reference</th>
							<th>Traitée</th>
							<th></th>
						</tr>";
        $drapeau = 1;
        if ($donnees = $request->fetch()) {
            while ($drapeau <= 20 && $donnees = $tableau->fetch()) {
                $result = $result . "
						 <tr>
							 <td>" . $donnees['id'] . "</a></td>
							 <td>" . $donnees['traitement'] . "</td>
							 <td> <a href='index.php?action=suivi&suivi=" . $InfoSuivi . "&id=" . $donnees['id'] . "' ><button class='btn btn-s btn-warning pull-right'> Voir détails </button> </a> </td>
						 </tr>";
                $drapeau = $drapeau + 1;
            }

            $result = $result . ' </table>';
            return $result;
        } else {
            $result = 'Pas de ' . $InfoSuivi . ' !';
        }
        return $result;

    }

    public function SuiviDetails($InfoSuivi, $id)
    {
        $sql = ('SELECT * FROM saleslines WHERE id_sale = ?');
        $request = $this->queryExecute($sql, array($id));
        $tableau = $this->queryExecute($sql, array($id));
        $result = "<table class='table'>
							 <tr>
								 <th></th>
								 <th>Nom article</th>
								 <th>Prix Unitaire</th>
								 <th>Quantité</th>
								 <th>Prix Ligne</th>
							 </tr>";
        if ($donnees = $request->fetch()) {
            while ($donnees = $tableau->fetch()) {
                $sql = ('SELECT * FROM articles where id = ?');
                $lignearticle = $this->queryExecute($sql, array($donnees['id_article']));
                if ($resultatligne = $lignearticle->fetch()) {
                    $prixLigne = array($resultatligne['price'], $donnees['quantity']);
                    $result = $result . "
							<tr>
								<th> <img src='images/plat" . $resultatligne['id'] . ".jpg'> </th>
								<th>" . $resultatligne['name'] . "</th>
								<th>" . $resultatligne['price'] . "</th>
								<th>" . $donnees['quantity'] . "</th>
								<th>" . array_product($prixLigne) . "</th>
							</tr>";
                }
            }

            $result = $result . ' </table>';
            return $result;
        } else {
            $result = 'Pas de détails de ' . $InfoSuivi . ' disponible !';
        }
        return $result;

    }

    public function SuiviProspect()
    {

        $Suivi = "Commande";
        $sql = ("SELECT * FROM salestable WHERE etats = ? && traitement = 'Non' ORDER BY date_purchase desc");
        $request = $this->queryExecute($sql, array($Suivi));
        $tableau = $this->queryExecute($sql, array($Suivi));
        $result = "<table class='table'>
						<tr>
							<th>Reference</th>
							<th>Traitée</th>
							<th></th>
							<th>Annulation de la commande</th>
						</tr>";
        $drapeau = 1;
        if ($donnees = $request->fetch()) {
            while ($drapeau <= 100 && $donnees = $tableau->fetch()) {
                $result = $result . "
						
						 <tr>	
							 <td>" . $donnees['id'] . "</a></td>
							 <td><form action='index.php?action=validation&id=" . $donnees['id'] . "' id=" . $drapeau . " method='post'>
									<input type='checkbox' onChange='document.getElementById(" . $drapeau . ").submit()'></input>
								</form>
							 <td> <a href='index.php?action=suivi&suivi=Commande&id=" . $donnees['id'] . "' ><button class='btn btn-s btn-warning pull-right'> Voir détails </button> </a> </td>
						    <td> <a href='index.php?action=delOrder&idOrder=" . $donnees['id'] . "' class=\"btn btn-warning\"><span class=\"glyphicon glyphicon-trash\"></span></a></td>
						 </tr>";
                $drapeau = $drapeau + 1;
            }
            $sqlUpdate = ('UPDATE salestable SET traitement = "Oui" WHERE etats = "Facture"');
            $this->queryExecute($sqlUpdate);
            $result = $result . "</table>";

            return $result;
        } else {
            $sqlUpdate = ('UPDATE salestable SET traitement = "Oui" WHERE etats = "Facture"');
            $this->queryExecute($sqlUpdate);
            $result = 'Pas de ' . $Suivi . ' !';
        }
        return $result;
    }

}