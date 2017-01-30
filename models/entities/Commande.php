<?php
class Commande extends Personne
  {

    protected $id;
    protected $reference;
    protected $dateCommande;
    protected $dateExpedition;
    protected $statut;


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

  }
