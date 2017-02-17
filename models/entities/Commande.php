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

public function save($pdo, $date) {

    try {

      //Exécuter la requête insert d'une personne en base de donnée
      //Préparation de la requête
      $stmt = $pdo->prepare("INSERT INTO commande (statut_id, client_id, date_cmd) VALUES (1, '". $_SESSION['id'] ."', '" . $date ."')");

      //Binder les paramètres à la requête de manière sécurisée

      $stmt->bindParam($_SESSION['id'], $obj->id, PDO::PARAM_INT);


      //On exécute ensuite la requête préparée
var_dump($stmt);

      // $stmt->execute();



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
