<?php
class Produit
{

	private $id;
	private $reference;
	private $libelle;
	private $description;
	private $prixUnitaire;
	private $quantite;


	public function save($pdo) {
  
    //Si l'id est renseigné à l'appel de la méthode alors c'est une mise à jour, sinon $id équivaut à false et alors l'objet client actuel doit faire l'objet d'un nouvel enregistrement.
    if($this->id) {
      //appeler la bonne méthode
      $message = $this->update($pdo);
      return $message;
    } else {
      $message = $this->insert($pdo);
      return $message;
    }
  }

  private function insert($pdo) {

    try {
      //Exécuter la requête insert d'une personne en base de donnée
      //Préparation de la requête

      $stmt = $pdo->prepare('INSERT INTO produit (id, ref, libelle, quantite_stock, prix_unitaire, description) VALUES ( :id, :ref, :libelle, :quantite, :prix, :descr)');


      //Binder les paramètres à la requête de manière sécurisée
      $stmt->bindParam(':ref', $this->reference, PDO::PARAM_STR);
      $stmt->bindParam(':libelle', $this->libelle, PDO::PARAM_STR);
      $stmt->bindParam(':quantite', $this->quantite_stock, PDO::PARAM_STR);
      $stmt->bindParam(':prix', $this->prix_unitaire, PDO::PARAM_STR);
      $stmt->bindParam(':descr', $this->description, PDO::PARAM_STR);

   
      return "Votre nouveau client a été enregistré avec succès";

    }
    catch(PDOException $e) {
      return "Votre enregistrement a échoué, en voici la raison : " . $e->getMessage();
    }

  }

  private function update($pdo) {

    try {
      //Exécuter la requête update d'une personne en base de donnée
      //Préparation de la requête

      $stmt = $pdo->prepare('UPDATE produit SET ref = :ref, libelle = :libelle, description = :descr, quantite_stock = :quantite, prix_unitaire = :prix WHERE id = :id');

      //Binder les paramètres à la requête de manière sécurisée
      $stmt->bindParam(':ref', $this->reference, PDO::PARAM_STR);
      $stmt->bindParam(':libelle', $this->libelle, PDO::PARAM_STR);
      $stmt->bindParam(':quantite', $this->quantite_stock, PDO::PARAM_STR);
      $stmt->bindParam(':prix', $this->prix_unitaire, PDO::PARAM_STR);
      $stmt->bindParam(':descr', $this->description, PDO::PARAM_STR);
      $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);


      //On exécute ensuite la requête préparée
      $stmt->execute();



      return "Votre client a été mis à jour avec succès";

    }
    catch(PDOException $e) {
      return "Votre mise à jour a échoué, en voici la raison : " . $e->getMessage();
    }
  }

  public function delete($pdo) {

    //Supprimer un enregistrement en base de donnée
    //Faire un try catch qui renvoie un message pour indiquer si la suppression s'est bien déroulée ou non
    try{
      $stmt = $pdo->prepare('DELETE FROM produit WHERE id = :id');
      $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);

      $stmt->execute();

      return "Votre produit a bien été supprimé.";
    }
    catch(PDOException $e) {
      return "Votre suppression a échoué, en voici la raison : " . $e->getMessage();
    }
  }

	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getReference() {
		return $this->reference;
	}

	public function setReference($reference) {
		$this->reference = $reference;
	}

	public function getLibelle() {
		return $this->libelle;
	}

	public function setLibelle($libelle) {
		$this->libelle = $libelle;
	}

	public function getDescription() {
		return $this->description;
	}

	public function setDescription($description) {
		$this->description = $description;
	}

	public function getPrixUnitaire() {
		return $this->prixUnitaire;
	}

	public function setPrixUnitaire($prixUnitaire) {
		$this->prixUnitaire = $prixUnitaire;
	}
	public function getQuantite() {
		return $this->quantite;
	}

	public function setQuantite($quantite) {
		$this->quantite = $quantite;
	}




}