<?php

  class CommandeRepository
  {

    public function getAll($pdo){

      $req = $pdo->query("SELECT p.nom, p.prenom, cmd.id, cmd.ref, cmd.date_expedition, cmd.date_cmd, s.libelle
      FROM personne p INNER JOIN commande cmd ON p.id=cmd.client_id INNER JOIN statut s ON cmd.statut_id=s.id ORDER BY p.nom, p.prenom");

      $req->setFetchMode(PDO::FETCH_OBJ);


      $listCommande = array();

      while ($obj = $req->fetch()){

        $commande = new Commande();
        $commande->setId($obj->id);
        $commande->setReference($obj->reference);
        $commande->setNom($obj->nom);
        $commande->setPrenom($obj->prenom);
        $commande->setDateCommande($obj->date_cmd);
        $commande->setDateExpedition($obj->date_expedition);
        $commande->setStatut($obj->libelle);

        $listCommande[] = $commande;


      }

        return $listCommande;

    }
  }
