<?php

  class Statut {

    protected $id;
    protected $libelle;

    public function getId(){
      return $this->id;
    }

    public function setId($id) {
      $this->id = $id;
    }

    public function getLibelle(){
      return $this->libelle;
    }

    public function setLibelle($libelle){
      $this->libelle = $libelle;
    }
  }
