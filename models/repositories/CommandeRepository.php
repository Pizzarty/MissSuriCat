<?php

  class CommandeRepository
  {

    public function getAll($pdo){

      $req = $pdo->query("SELECT p.civilite, p.nom, p.prenom, cmd.id, cmd.ref, cmd.date_expedition, cmd.date_cmd, s.libelle, pro.libelle AS libelle2, cp.quantite
      FROM personne p 
      INNER JOIN commande cmd ON p.id=cmd.client_id 
      INNER JOIN statut s ON cmd.statut_id=s.id 
      INNER JOIN commande_produit cp ON cp.com_id=cmd.id
      INNER JOIN produit pro ON pro.id=cp.prd_id
      ORDER BY p.nom, p.prenom 
      ");

      $req->setFetchMode(PDO::FETCH_OBJ);


      $listCommande = array();

      while ($obj = $req->fetch()){

        $client = new Client();
        $client->setCivilite($obj->civilite);
        $client->setNom($obj->nom);
        $client->setPrenom($obj->prenom);

        $statut = new Statut();
        $statut->setLibelle($obj->libelle);

        $produit = new Produit();
        $produit->setLibelle($obj->libelle2);

        $commande_produit = new CommandeProduit();
        $commande_produit->setQuantite($obj->quantite);

        $commande = new Commande();
        $commande->setId($obj->id);
        $commande->setReference($obj->ref);
        $commande->setClient($client);
        $commande->setStatut($statut);
        $commande->setDateCommande($obj->date_cmd);
        $commande->setDateExpedition($obj->date_expedition);
        $commande->setProduit($produit);
        $commande->setCommandeProduit($commande_produit);

        $listCommande[] = $commande;


      }

        return $listCommande;

    }

    public function getOneById($pdo) {

    //Effectuer la requête en bdd pour récupérer le client correspondant à l'id renseigné
    $resultat = $pdo->query('SELECT MAX(id) FROM commande ');


    $resultat->setFetchMode(PDO::FETCH_OBJ);

    $obj = $resultat->fetch();
    
    //Ensuite :
    // 1 -  instancier un objet client
    // 2 -  hydrater ses attributs avec les valeurs récupérées en bdd
    // 3 -  retourner ensuite cet objet

    $commande = new Commande();
    $commande->setId();

  

    return $commande;
  }
}

