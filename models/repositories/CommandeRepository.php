<?php

  class CommandeRepository
  {

    public function getAll($pdo){

      $req = $pdo->query("SELECT p.nom, p.prenom, cmd.id, cmd.ref, cmd.date_expedition, cmd.date_cmd, s.libelle
      FROM personne p INNER JOIN commande cmd ON p.id=cmd.client_id INNER JOIN statut s ON cmd.statut_id=s.id ORDER BY p.nom, p.prenom");

      $req->setFetchMode(PDO::FETCH_OBJ);


      $listClients = array();

      while ($obj = $req->fetch()){

        $client = new Commande();
        $client->setId($obj->id);
        $client->setReference($obj->reference);
        $client->setNom($obj->nom);
        $client->setPrenom($obj->prenom);
        $client->setDateCommande($obj->dateCommande);
        $client->setDateExpedition($obj->dateExpedition);
        $client->setStatut($obj->statut);

        $listClients[] = $client;


      }

        return $listClients;

    }
  }
