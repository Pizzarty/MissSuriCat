<?php

  class Client extends Personne
  {
    private $iban;
    private $bic;

    public function save($pdo) {

      try {
        //Exécuter la requête insert en base de donnée
        $stmt = $pdo->prepare('INSERT INTO personne (civilite, nom, prenom, date_naissance, adresse, code_postal, ville)
        VALUES (:civilite, :nom, :prenom, :dateNaissance, :adresse, :cp, :ville)');

        //Permet de blinder les paramètres à la requête de manière sécurisée
        $stmt->bindParam(':civilite', $this->civilite, PDO::PARAM_STR);
        $stmt->bindParam(':nom', $this->nom, PDO::PARAM_STR);
        $stmt->bindParam(':prenom', $this->prenom, PDO::PARAM_STR);
        $stmt->bindParam(':dateNaissance', $this->dateNaissance, PDO::PARAM_STR);
        $stmt->bindParam(':adresse', $this->adresse, PDO::PARAM_STR);
        $stmt->bindParam(':cp', $this->cp, PDO::PARAM_INT);
        $stmt->bindParam(':ville', $this->ville, PDO::PARAM_STR);

        //On exécute ensuite la requête préparée
        $stmt->execute();

        $stmt = $pdo->prepare('INSERT INTO client (bic, iban)
        VALUES (:bic, :iban)');

        //Permet de blinder les paramètres à la requête de manière sécurisée
        $stmt->bindParam(':bic', $this->bic, PDO::PARAM_STR);
        $stmt->bindParam(':iban', $this->iban, PDO::PARAM_STR);

        //On exécute ensuite la requête préparée
        $stmt->execute();

        return "Votre nouveau client a été enregistré avec succès";
      }
      catch(PDOException $e) {
        return "Votre enregistrement a échoué, en voici la raison : " . $e->getMessage();
      }
    }

    public function getIban(){
      return $this->iban;
    }
    public function setIban($iban){
      $this->iban = $iban;
    }

    public function getBic(){
      return $this->bic;
    }
    public function setBic($bic){
      $this->bic = $bic;
    }
  }
