<?php

  class PersonneRepository
  {

    public function getPersonne($pdo, $login, $password, $grade) {



  		// Pas sécurisé contre les injections SQL
  		// Entrer " OR 1=1 # pour vous connectez sans connaître un login et un password d'un utilisateur enregistré.
  		//$resultat = $pdo->query('SELECT id, nom, prenom, login, password FROM user WHERE login = "' . $login . '" AND password = "' . $password . '"');

  		$resultat = $pdo->prepare('SELECT id, nom, prenom, login, password, grade FROM personne WHERE login = :login AND password = :password');

  		$resultat->bindParam(':login', $login, PDO::PARAM_STR);
  		$resultat->bindParam(':password', $password, PDO::PARAM_STR);
  		$resultat->setFetchMode(PDO::FETCH_OBJ);

  		$resultat->execute();

  		$obj = $resultat->fetch();

  		if(empty($obj)) {
  			return null;
  		} else {
  			$personne = new Personne();
  			$personne->setId($obj->id);
  			$personne->setNom($obj->nom);
  			$personne->setPrenom($obj->prenom);
  			$personne->setLogin($obj->login);
  			$personne->setPassword($obj->password);
  			$personne->setGrade($obj->grade);

  			return $personne;
  		}

  	}

  }
