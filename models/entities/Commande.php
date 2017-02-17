<?php
class Commande extends Personne
  {

    protected $id;
    protected $reference;
    protected $dateCommande;
    protected $dateExpedition;
    protected $statut;
    protected $client;
    protected $produit;
    protected $commande_produit;


private function save($pdo, $_SESSION) {

    try {
      //Exécuter la requête insert d'une personne en base de donnée
      //Préparation de la requête
      $stmt = $pdo->prepare('INSERT INTO commande (client_id, statut_id) VALUES ( :$_SESSION["id"], :statut)');

      //Binder les paramètres à la requête de manière sécurisée
      $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
      $stmt->bindParam(':dateCmd', $this->date_Cmd, PDO::PARAM_STR);
      $stmt->bindParam(':statut', $this->statut, PDO::PARAM_STR);

      //On exécute ensuite la requête préparée
      $stmt->execute();

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

      return "Votre commande a été enregistré avec succès";
    }
    catch(PDOException $e) {
      return "Votre commande a échoué, en voici la raison : " . $e->getMessage();
    }

  }


    public function getId(){
      return $this->id;
    }
    public function setId($id){
      $this->id = $id;
    }

    public function getReference(){
      return $this->reference;
    }
    public function setReference($reference){
      $this->reference = $reference;
    }

    public function getDateCommande(){
      return $this->dateCommande;
    }
    public function setDateCommande($dateCommande){
      $this->dateCommande = $dateCommande;
    }

    public function getDateExpedition(){
      return $this->dateExpedition;
    }
    public function setDateExpedition($dateExpedition){
      $this->dateExpedition = $dateExpedition;
    }

    public function getStatut(){
      return $this->statut;
    }
    public function setStatut($statut){
      $this->statut = $statut;
    }

    public function getClient(){
      return $this->client;
    }
    public function setClient($client){
      $this->client = $client;
    }

    public function getProduit(){
      return $this->produit;
    }
    public function setProduit($produit){
      $this->produit = $produit;
    }

    public function getCommandeProduit(){
      return $this->commande_produit;
    }
    public function setCommandeProduit($commande_produit){
      $this->commande_produit = $commande_produit;
    }
  }
