<?php 

class CommandeProduit 
{

	private $quantite;

	private function save($pdo){
	//On récupère l'id généré (auto-incrémenté) de la table personne
      $stmt2 = $pdo->prepare('SELECT MAX(id) FROM commande');
      $stmt2->execute();
      $obj = $stmt2->fetch(PDO::FETCH_OBJ);

      //On crée le client correspondant avec l'id correspondant
      //Préparation de la requête
      $stmt3 = $pdo->prepare('INSERT INTO commande_produit (cmd_id, prd_id, quantite) VALUES (:id, :produit, :quantite)');

      //Binder les paramètres à la requête de manière sécurisée
      $stmt3->bindParam(':id', $obj->id, PDO::PARAM_INT);
      $stmt3->bindParam(':produit', $this->produit, PDO::PARAM_STR);
      $stmt3->bindParam(':quantite', $this->quantite, PDO::PARAM_STR);

      //On exécute ensuite la requête préparée
      $stmt3->execute();
	}


	public function getQuantite() {
		return $this->quantite;
	}
	
	public function setQuantite($quantite) {
		$this->quantite = $quantite;
	}
	

}