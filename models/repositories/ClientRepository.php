<?php

//Les objets repository permettent de récupérer des enregistrements en base de données

  class ClientRepository
  {

    //Récupère les clients en base de données
    public function getAll($pdo){

      //Effectuer la requête en bbd pour récupérer la
      $req = $pdo->query("SELECT p.id, p.civilite, p.nom, p.prenom, p.date_naissance, p.adresse, p.code_postal, p.ville, cli.iban, cli.bic
                          FROM personne p INNER JOIN client cli ON p.id=cli.id ORDER BY nom, prenom");

      $req->setFetchMode(PDO::FETCH_OBJ);

      //Boucler sur tous les enregistrements récupérés grâce à votre requête SELECT
      // 1 -  instancier un objet client
      // 2 -  lui hydrater ses attributs avec les valeurs récupérés en bdd
      // 3 -  pour chaque onjet client instanciés et hydratés, les ajouter dans un tableau
      // 4 - retourner ensuite ce tableau avec l'instruction return;

      $listClients = array();

      while ($obj = $req->fetch()){

        $client = new Client();
        $client->setId($obj->id);
        $client->setCivilite($obj->civilite);
        $client->setPrenom($obj->prenom);
        $client->setNom($obj->nom);
        $client->setDateNaissance($obj->date_naissance);
        $client->setAdresse($obj->adresse);
        $client->setCp($obj->code_postal);
        $client->setVille($obj->ville);
        $client->setIban($obj->iban);
        $client->setBic($obj->bic);

        $listClients[] = $client;


      }

      return $listClients;
    }

      //Récupère un client en fonction de l'id renseigné
  public function getOneById($pdo, $id) {

    //Effectuer la requête en bdd pour récupérer le client correspondant à l'id renseigné
    $resultat = $pdo->query('SELECT p.id, p.civilite, p.nom, p.prenom, p.date_naissance, p.adresse, p.code_postal, p.ville, c.bic, c.iban FROM personne p INNER JOIN client c ON p.id = c.id WHERE p.id = ' . $id);

    $resultat->setFetchMode(PDO::FETCH_OBJ);

    $obj = $resultat->fetch();

    //Ensuite :
    // 1 -  instancier un objet client
    // 2 -  hydrater ses attributs avec les valeurs récupérées en bdd
    // 3 -  retourner ensuite cet objet

    $client = new Client();
    $client->setId($obj->id);
    $client->setCivilite($obj->civilite);
    $client->setNom($obj->nom);
    $client->setPrenom($obj->prenom);
    $client->setDateNaissance($obj->date_naissance);
    $client->setAdresse($obj->adresse);
    $client->setCp($obj->code_postal);
    $client->setVille($obj->ville);
    $client->setBic($obj->bic);
    $client->setIban($obj->iban);

    return $client;
  }

  }
