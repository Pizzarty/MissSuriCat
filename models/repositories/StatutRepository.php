<?php

//Les objets repository permettent de récupérer des enregistrements en base de données

  class StatutRepository
  {

    //Récupère les clients en base de données
    public function getAll($pdo){

      //Effectuer la requête en bbd pour récupérer la
      $req = $pdo->query("SELECT id, libelle FROM statut");

      $req->setFetchMode(PDO::FETCH_OBJ);

      //Boucler sur tous les enregistrements récupérés grâce à votre requête SELECT
      // 1 -  instancier un objet client
      // 2 -  lui hydrater ses attributs avec les valeurs récupérés en bdd
      // 3 -  pour chaque onjet client instanciés et hydratés, les ajouter dans un tableau
      // 4 - retourner ensuite ce tableau avec l'instruction return;

      $listStatut = array();

      while ($obj = $req->fetch()){

        $statut = new Statut();
        $statut->setId($obj->id);
        $statut->setLibelle($obj->libelle);

        $listStatut[] = $statut;


      }

      return $listStatut;
    }

      //Récupère un client en fonction de l'id renseigné
  public function getOneById($pdo) {

    //Effectuer la requête en bdd pour récupérer le client correspondant à l'id renseigné
    $resultat = $pdo->query('SELECT id, libelle FROM statut WHERE id = 1');

    $resultat->setFetchMode(PDO::FETCH_OBJ);

    $obj = $resultat->fetch();

    //Ensuite :
    // 1 -  instancier un objet client
    // 2 -  hydrater ses attributs avec les valeurs récupérées en bdd
    // 3 -  retourner ensuite cet objet

    $statut = new Statut();
    $statut->setId($obj->id);
    $statut->setLibelle($obj->libelle);
var_dump($statut);

    return $statut;
  }

  }
