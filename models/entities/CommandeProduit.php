<?php 

class CommandeProduit 
{

	protected $quantite;
	protected $produit;
	protected $commande;


	public function save($pdo){
	//On récupère l'id généré (auto-incrémenté) de la table personne

	try{
      $stmt2 = $pdo->prepare('SELECT MAX(id) FROM commande');

  
      $stmt2->execute();
      $obj = $stmt2->fetch(PDO::FETCH_OBJ);

      var_dump($obj);
                

      //On crée le client correspondant avec l'id correspondant
      //Préparation de la requête
      $stmt3 = $pdo->prepare('INSERT INTO commande_produit (com_id, prd_id) VALUES ("'. $obj .'", :produit)');

      //Binder les paramètres à la requête de manière sécurisée
      $stmt3->bindParam($obj, $this->commande, PDO::PARAM_INT);
      $stmt3->bindParam(':produit', $this->produit, PDO::PARAM_INT);
      // $stmt3->bindParam(':quantite', $this->quantite, PDO::PARAM_INT);

      // On exécute ensuite la requête préparée
      echo $stmt3;

      // $stmt3->execute();
      return "Votre commande a été enregistré avec succès";
  		}
  	catch(PDOException $e) {
      return "Votre commande a échoué, en voici la raison : " . $e->getMessage();
    	}

	}


	public function getQuantite() {
		return $this->quantite;
	}
	
	public function setQuantite($quantite) {
		$this->quantite = $quantite;
	}
	
	public function getProduit() {
		return $this->produit;
	}
	
	public function setProduit($produit) {
		$this->produit = $produit;
	}
	public function getCommande() {
		return $this->commande;
	}
	
	public function setCommande($commande) {
		$this->commande = $commande;
	}
}