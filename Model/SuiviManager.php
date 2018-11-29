<?php

class SuiviManager extends Manager
{
	public function Suivi($InfoSuivi,$id)
	{
		$sql = ('SELECT * FROM salestable WHERE id_customer = ? && etats = ? ORDER BY date_purchase desc');
		$request = $this->queryExecute($sql, array($id,$InfoSuivi));
		$tableau = $this->queryExecute($sql, array($id,$InfoSuivi));
		$result = "<table class='table'>
						<tr>
							<th>Reference</th>
							<th>Traitée</th>
						</tr>";
		$drapeau = 1;
		if($donnees = $request->fetch())
		{
			while($drapeau <= 20 && $donnees = $tableau->fetch())
			{
				 $result = $result."
						 <tr>
							 <th>".$donnees['id']."</a></th>
							 <th>".$donnees['traitement']."</th>
							 <th> <a href='index.php?action=suivi&suivi=".$InfoSuivi."&id=".$donnees['id']."' ><button class='btn btn-s btn-warning pull-right'> Voir détails </button> </a> </th>
						 </tr>";
						$drapeau = $drapeau +1;
			}
			
			$result = $result.' </table>';			
			return $result;
		}else
		{
			$result = 'Pas de '.$InfoSuivi.' !';
		}
		return $result;
		
	}
	
	public function SuiviDetails($InfoSuivi,$id)
	{
		$sql = ('SELECT * FROM saleslines WHERE id_sale = ?');
		$request = $this->queryExecute($sql, array($id));
		$tableau = $this->queryExecute($sql, array($id));
		$result = "<table class='table'>
						 <tr>
							 <th>Nom article</th>
							 <th>Prix Unitaire</th>
							 <th>Quantité</th>
							 <th>Prix Ligne</th>
						 </tr>";
		if($donnees = $request->fetch())
		{
			while($donnees = $tableau->fetch())
			{
				$sql = ('SELECT * FROM articles where id = ?');
				$lignearticle = $this->queryExecute($sql, array($donnees['id_article']));
				if($resultatligne = $lignearticle->fetch())
				{
					$prixLigne = array($resultatligne['price'],$donnees['quantity']);
					$result = $result."
							<tr>
								<th>".$resultatligne['name']."</th>
								<th>".$resultatligne['price']."</th>
								<th>".$donnees['quantity']."</th>
								<th>".array_product($prixLigne)."</th>
							</tr>";
				}
			}
			
			$result = $result.' </table>';			
			return $result;
		}else
		{
			 $result = 'Pas de détails de '.$InfoSuivi.' disponible !';
		}
		return $result;
		
	}
}