<?php
class Commande
  {

    protected $id;
    protected $reference;
    protected $nom;
    protected $prenom;
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

    public function getNom(){
      return $this->nom;
    }
    public function setNom($nom){
      $this->nom = $nom;
    }

    public function getPrenom(){
      return $this->prenom;
    }
    public function setPrenom($prenom){
      $this->prenom = $prenom;
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
