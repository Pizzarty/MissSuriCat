<?php

  class Personne
  {

    protected $id;
    protected $civilite;
    protected $nom;
    protected $prenom;
    protected $dateNnaissance;
    protected $adresse;
    protected $cp;
    protected $ville;
    protected $login;
  	protected $password;
  	protected $grade;


    public function getId(){
      return $this->id;
    }
    
    public function setId($id){
      $this->id = $id;
    }

    public function getCivilite(){
      return $this->civilite;
    }

    public function setCivilite($civilite){
      $this->civilite = $civilite;
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

    public function getDateNaissance(){
      return $this->dateNaissance;
    }

    public function setDateNaissance($dateNaissance){
      $this->dateNaissance = $dateNaissance;
    }

    public function getAdresse(){
      return $this->adresse;
    }

    public function setAdresse($adresse){
      $this->adresse = $adresse;
    }

    public function getCp(){
      return $this->cp;
    }

    public function setCp($cp){
      $this->cp = $cp;
    }

    public function getVille(){
      return $this->ville;
    }
    public function setVille($ville){
      $this->ville = $ville;
    }

    public function getLogin() {
  		return $this->login;
  	}

  	public function setLogin($login) {
  		$this->login = $login;
  	}

  	public function getPassword() {
  		return $this->password;
  	}

  	public function setPassword($password) {
  		$this->password = $password;
  	}

  	public function getGrade() {
  		return $this->grade;
  	}

  	public function setGrade($grade) {
  		$this->grade = $grade;
  	}
  }
